<?php
/*you can prepare html of the user profile update page
input name info:
firstname
lastname
password
dob
gender
city (city and country should be listed on the same dropdown ( 
    <select name="country2" id="country2">
        <optgroup label="Korea">
            <option value="seoul">Seoul</option>
premium
interests
hometown **
profilepic
introduction**
nativeLanguage
natProficieny
targetLanguage
tarProficieny*/






require_once("Manager.php");
require_once("UserProfile.php");

class ProfileUpdateManager extends Manager{ //we should decide about using user id or username. which one is safest option?
 
    // THIS 'getCityId(CITY)' FUNCTIONS RETURNS US CITY ID'S ACCORDING TO THE CITY NAMES THAT COMES FROM FORM INPUT VALUES
    protected function getCityId($str){
        $city = $str;
        $db = $this->dbConnect();                  
        $cityquery = $db->prepare('SELECT id from city WHERE city = ?');
        $cityquery->execute([$city]);

        if($cityquery->rowCount() == 1){
            $cid = $cityquery->fetch(PDO::FETCH_ASSOC);
            return $cid;
        }else return 0;
    } 
    protected function getLanguageId($str){
        $lang = $str;
        $db = $this->dbConnect();                  
        $langquery = $db->prepare('SELECT id from language WHERE language = ?');
        $langquery->execute([$lang]);

        if($langquery->rowCount() == 1){
            $langid = $langquery->fetch(PDO::FETCH_ASSOC);
            return $langid;
        }else return 0;
    }
 
   public function update($response){

    if(isset($response)){
        $id = $response['id'];
        $password = password_hash($response['password'], PASSWORD_DEFAULT);
        $city = $this->getCityId($response['city']);
        $interest = implode(",", $response['interest']);
        $hometown = $this->getCityId($response['hometown']);
        $nativeLanguage = $this->getLanguageId($response['nativeLanguage']);
        $tarLanguage = $this->getLanguageId($response['targetLanguage']);

        $db = $this->dbConnect();
        // TODO: INPUTS SHOULD BE CHECKED AND ONLY FIELD INPUTS SHOULD BE UPDATED
        $reqUser = $db->prepare("UPDATE users   SET firstname= :inFirstname
                                                ,lastname= :inLastname
                                                ,password= :inPassword 
                                                ,dob= :inDob
                                                ,gender= :inGender
                                                ,city_id= :inCity
                                                ,premium_id= :inPremium
                                                ,interests= :inInterest
                                                ,hometown= inHometown
                                                ,profilepic= :inProfilepic
                                                ,introduction= :inIntroduction WHERE uid = :inId");
        $reqUser ->execute(array(
                'inFirstname' => $response['firstname'],
                'inLastname' => $response['lastname'],
                'inPassword' => $password,
                'inDob' => $response['dob'],
                'inGender' => $response['gender'],
                'inCity' => $city,
                'inPremium' => $response['premium'],
                'inInterest' => $interest,
                'inHometown' => $hometown,
                'inProfilepic' => $response['profilepic'],
                'inIntroduction' =>$response['introduction'],
                'inId' => $id
            )); //
        //TODO: native and target language fields should be checked and if thy never exist in the db INSERT query should process otherwise update statemets
        $control = new UserProfile();
        $known_language = $control->getUserLanguage($id, 'known_language');
        if(empty($control)){
            $reqNat = $db->prepare(" INSERT INTO known_language(user_id, language_id, proficiency) 
                                    VALUES (:inId, :inLanguage ,:inProficiency)");
            $reqNat->execute(array(
                'inId' => $id,
                'inLanguage' => $nativeLanguage,
                'inProficiency' => $response['natProficieny']
            ));
        }else{
            $reqNat = $db->prepare("UPDATE known_language SET language_id = :inLanguage, proficiency = :inProficiency WHERE user_id = :inId");
            $reqNat->execute(array(
                'inLanguage' => $nativeLanguage,
                'inProficiency' => $response['natProficieny'],
                'inId' => $id
            ));
        }
       
        //TODO: proficiency field should be check in the case of empty
        $target_language = $control->getUserLanguage($id, 'target_language');
        if(empty($control)){
            $reqNat = $db->prepare(" INSERT INTO target_language(user_id, language_id, proficiency) 
                                    VALUES (:inId, :inLanguage ,:inProficiency)");
            $reqNat->execute(array(
                'inId' => $id,
                'inLanguage' => $tarLanguage,
                'inProficiency' => $response['targetLanguage']
            ));
        }else{
            $reqNat = $db->prepare("UPDATE target_language SET language_id = :inLanguage, proficiency = :inProficiency WHERE user_id = :inId");
            $reqNat->execute(array(
                'inLanguage' => $tarLanguage,
                'inProficiency' => $response['targetLanguage'],
                'inId' => $id
            ));
        }



        if($reqUser->rowCount() == 1) echo "<script>alert('Your account has been updated successfully');</script>";
        header('Location: ./index.php?action=startSplash');
        return $id;
    }else{
        echo "<script>alert('Missing information. Profile update process is aborting...')</script>"; 
        header('Location: ./index.php?action=startSplash');
        return $response['id'];
    }

    }
}
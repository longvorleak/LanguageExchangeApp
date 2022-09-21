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

    //INFO: in this part $language[][] array is created 
        //you can reach LANGUAGE info as $language[X][0] // 0 fixed for lang.
        //you can reach PROFICIENCY info as $language[X][1] // 1 fixed for prof.
        // [0] => Array
        // (
        //     [0] => English
        //     [1] => 5
        // )
    //INFO: $array: language and proficiny list
    protected function languageParse($array){
        if(!empty($array)){
            $language = [];
            $array = explode("," ,$array);
            foreach($array as $key){
                array_push($language, explode("&",$key));
                return $language;
            }
        }else
            return 0;
    }
 
   public function update($response){

    if(isset($response)){
        $id = $response['uid'];
        $password = password_hash($response['password'], PASSWORD_DEFAULT);
        $city = $this->getCityId($response['city']);
        $interest = implode(",", $response['interest']);
        $hometown = $this->getCityId($response['hometown']);

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

        
        $nativeLanguage = $this->languageParse($response['nativeLanguage']); //coming from update page inputs
        $tarLanguage = $this->languageParse($response['targetLanguage']); //coming from update page inputs
        $control = new UserProfile();

        for($i=0; $i<count($nativeLanguage); $i++){
            $known_language = $control->getUserLanguage($id, 'known_language'); //coming form db
            if(empty($known_language)){
                $reqNat = $db->prepare(" INSERT INTO known_language(user_id, language_id, proficiency) 
                                        VALUES (:inId, :inLanguage ,:inProficiency)");
                $reqNat->execute(array(
                    'inId' => $id,
                    'inLanguage' =>  $this->getLanguageId($nativeLanguage[$i][0]),
                    'inProficiency' => $nativeLanguage[$i][1]
                ));
            }else{
                $reqNat = $db->prepare("UPDATE known_language SET language_id = :inLanguage, proficiency = :inProficiency WHERE user_id = :inId");
                $reqNat->execute(array(
                    'inLanguage' => $this->getLanguageId($nativeLanguage[$i][0]),
                    'inProficiency' => $nativeLanguage[$i][1],
                    'inId' => $id
                ));
            }
        }
        for($i=0; $i<count($tarLanguage); $i++){
            $target_language = $control->getUserLanguage($id, 'target_language'); //coming from db
            if(empty($target_language)){
                $reqNat = $db->prepare(" INSERT INTO target_language(user_id, language_id, proficiency) 
                                        VALUES (:inId, :inLanguage ,:inProficiency)");
                $reqNat->execute(array(
                    'inId' => $id,
                    'inLanguage' => $this->getLanguageId($tarLanguage[$i][0]),
                    'inProficiency' => $tarLanguage[$i][1]
                ));
            }else{
                $reqNat = $db->prepare("UPDATE target_language SET language_id = :inLanguage, proficiency = :inProficiency WHERE user_id = :inId");
                $reqNat->execute(array(
                    'inLanguage' => $this->getLanguageId($tarLanguage[$i][0]),
                    'inProficiency' => $tarLanguage[$i][1],
                    'inId' => $id
                ));
            }
        }     



        if($reqUser->rowCount() == 1) echo "<script>alert('Your account has been updated successfully');</script>";
        header('Location: ./index.php?action=profileEditView');
        return $id;
    }else{
        echo "<script>alert('Missing information. Profile update process is aborting...')</script>"; 
        header('Location: ./index.php?action=profileEditView');
        return $response['uid'];
    }

    }
}
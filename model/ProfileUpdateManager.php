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

class SignUpManager extends Manager { //we should decide about using user id or username. which one is safest option?
 
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

    if(!function_exists('checkInputs')){
        function checkInputs($updates){
            $inputArray[] = 0;
            if(isset($updates)){
                $inputArray[0] = (isset($updates['firstname']))? $updates['firstname'] : 0;
                $inputArray[1] = (isset($updates['lastname']))? $updates['lastname'] : 0;
                $inputArray[2] = (isset($updates['password']))? password_hash($updates['password'], PASSWORD_DEFAULT) : 0;
                $inputArray[3] = (isset($updates['dob']))? $updates['dob'] : 0;
                $inputArray[4] = (isset($updates['gender']))? $updates['gender'] : 0;
                $inputArray[5] = (isset($updates['city']))? $updates['city'] : 0;
                $inputArray[6] = (isset($updates['premium']))? $updates['premium'] : 0;
                $inputArray[7] = (isset($updates['interest']))? implode(",", $updates['interest']) : 0; // interest field turnd into one string value 
                $inputArray[8] = (isset($updates['hometown']))? $updates['hometown'] : 0; 
                $inputArray[9] = (isset($updates['profilepic']))? $updates['profilepic'] : 0;
                $inputArray[10] = (isset($updates['introduction']))? $updates['introduction'] : 0; //END OF USERS TABLE FROM DB
                $inputArray[11] = (isset($updates['nativeLanguage']))? $updates['nativeLanguage'] : 0;
                // $inputArray[12] = (isset($updates['natProficieny']))? $updates['natProficieny'] : 0; //??? why we need this field
                $inputArray[12] = (isset($updates['targetLanguage']))? $updates['targetLanguage'] : 0;
                $inputArray[13] = (isset($updates['tarProficieny']))? $updates['tarProficieny'] : 0;
        
                return $inputArray;
        
            }else{
                return 0;
            }
        }
    }



    if(isset($response)){
        $id = $response['id'];
        $inputs = checkInputs($response);
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
                                                ,introduction= :inIntroduction WHERE id = :inId");
        $num = $reqUser ->execute(array(
                'inFirstname' => $inputs[0],
                'inLastname' => $inputs[1],
                'inPassword' => $inputs[2],
                'inDob' => $inputs[3],
                'inGender' => $inputs[4],
                'inCity' => $this->getCityId($inputs[5]),
                'inPremium' => $inputs[6],
                'inInterest' => $inputs[7],
                'inHometown' => $this->getCityId($inputs[8]),
                'inProfilepic' => $inputs[9],
                'inIntroduction' =>$inputs[10],
                'inId' => $id
            )); //
        //TODO: native and target language fields should be checked and if thy never exist in the db INSERT query should process otherwise update statemets
        $reqNat = $db->prepare("UPDATE known_language SET language_id = :inLanguage WHERE user_id = :inId");
        $numOfnative = $reqNat->execute(array(
                        'inLanguage' => $this->getLanguageId($inputs[11]),
                        'inId' => $id
            ));
        //TODO: proficiency field should be check in the case of empty
        $reqTar = $db->prepare("UPDATE target_language SET language_id = :inLanguage, proficiency = :intarProficieny WHERE user_id = :inId");
        $numOfnative = $reqNat->execute(array(
                        'inLanguage' => $this->getLanguageId($inputs[12]),
                        'intarProficieny' => $inputs[13],
                        'inId' => $id
            ));



        if($num === 1) echo "<script>alert('Your account has been updated successfully');</script>";
        header('Location: ./index.php?action=startLandingPage');
        return $id;
    }else{
        echo "<script>alert('Missing information. Profile update process is aborting...')</script>"; 
        header('Location: ./index.php?action=startLandingPage');
        return $response['id'];
    }

    }
}
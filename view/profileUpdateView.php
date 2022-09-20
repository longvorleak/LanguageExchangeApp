<!-- you can prepare html of the user profile update page
input name info:
firstname
lastname
gender // value must me set as 0,1 and 2
city (city and country should be listed on the same dropdown ( 
    <select name="country2" id="country2">
        <optgroup label="Korea">
            <option value="seoul">Seoul</option>
            <option value="busan">Busan</option>))
premium // vlue must be as 0 and 1
interests //send as a array type
hometown
profilepic
introduction
nativeLanguage
natProficieny // send as 5 (actually I am not sure about native proficieny??)
targetLanguage
tarProficieny // send as 0-5



-->

<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])){ //for filling the personal infos which already exist in the db
    require_once("Manager.php");
    require_once("UserProfile.php");
    
    $db = $this->dbConnect();
    $profile = $this->getUser($_SESSION['id']);
}

?>
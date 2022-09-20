<?php 
    
require_once("Manager.php");

class UserProfile extends Manager {


    public function getUser($id){
        $db = $this->dbConnect();
        $req = "SELECT id
                    ,firstname
                    ,lastname
                    ,username
                    ,email
                    ,password
                    ,dob
                    ,date_created
                    ,last_login
                    ,gender
                    ,city_id
                    ,premium_id
                    ,interests
                    ,hometown
                    ,profilepic
                    ,introduction 
                FROM users 
                WHERE uid = :inId";
        $res = $db->prepare($req);
        $res->execute(array(
                'inId' => $id
            ));
        
        if($res->rowCount() == 1){
            $user = $res->fetch();
            return $user;
        }else {
            return 0;
        }
    }

    //INFORMATION: IN ID PARAMETER IS USER ID, IN STR PARAMETER YOU SHOUL ASSIGN as followed:
        //FOR KNOWN LANGUAGE LIST: $str = known_language
        //FOR TARGET LANGUAGE LIST: $str = target_language
    public function getUserLanguage($id, $str){
        if(isset($str) && !empty($str)){
            $db = $this->dbConnect();
            switch($str){
                case "known_language":
                    $req ="SELECT u.id, l.language, k.proficiency 
                    FROM known_language k, users u, language l 
                    WHERE u.uid = :inId AND u.id= k.user_id AND k.language_id = l.id;";
                    break;
                case "target_language":
                    $req ="SELECT u.id, l.language, t.proficiency 
                        FROM target_language t, users u, language l 
                        WHERE u.uid = :inId AND u.id= t.user_id AND t.language_id = l.id;"; //ask about semicomma
                    break;
                default:
                    break;                                                                                            
            }
        
            $res = $db->prepare($req);
            $res->execute(array(
                    'inId' => $id
                ));
            
            if($res->rowCount() >= 1){
                $user = $res->fetch();
                return $user;
            }else {
                return 0;
            }
        }else 
            return 0;
    }
}

?>
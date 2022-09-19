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
                WHERE id = :inId";
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
                        FROM known_language k, language l, users u 
                        WHERE l.id IN
                                    (SELECT k.language_id FROM known_language k WHERE k.user_id IN 
                                                                                                (SELECT u.id FROM users WHERE u.id= :inId))";
                    break;
                case "target_language":
                    $req ="SELECT u.id, l.language, t.proficiency 
                        FROM target_language t, language l, users u 
                        WHERE l.id IN
                                    (SELECT t.language_id FROM target_language t WHERE t.user_id IN 
                                                                                                (SELECT u.id FROM users WHERE u.id= :inId))";
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
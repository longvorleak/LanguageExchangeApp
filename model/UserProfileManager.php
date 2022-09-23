<?php 
    
    require_once("Manager.php");

    class UserProfileManager extends Manager {
        
        public function getUser($id){
            $db = $this->dbConnect();
            // $req = "SELECT firstname, lastname, username, dob, email, password FROM users WHERE id = ?";
            // $req = "SELECT username FROM users WHERE id = ?";
            $req = $db->prepare('SELECT firstname, lastname, username, dob, email, password FROM users WHERE id = ?');
            $req->execute(array($id));
            $response = $req->fetch(PDO::FETCH_ASSOC);

            return $response;
            // if($res->rowCount() == 1){
            //     $user = $res->fetch();
            //     return $user;
            // }else {
            //     return 0;
            // }
        }
    }
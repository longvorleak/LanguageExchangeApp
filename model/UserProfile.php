<?php 
    
    require_once("Manager.php");

    class UserProfile extends Manager {
    

        public function getUser($id){
            $db = $this->dbConnect();
            $req = "SELECT firstname, lastname, username, dob, email, password FROM users WHERE id = ?";
            $res = $db->prepare($req);
            $res->execute([$id]);
            
            if($res->rowCount() == 1){
                $user = $res->fetch();
                return $user;
            }else {
                return 0;
            }
        }
    }

?>
<?php

require_once("Manager.php");

class SignUpManager extends Manager {
 
    public function signUp($response){

        $firstname = $response['firstname'];
        $lastname = $response['lastname'];
        $username = $response['username'];
        $email = $response['email'];
        $password = $response['password'];
        $passwordConfirm = $response['passwordConfirm'];

        $db = $this->dbConnect();

        /* 
        ####### DEFINITION ############

        @param $control = contains user input's in the following order.
        1 = login
        2 = email
        3 = password confirm

        */
        if(empty($username) && empty($email) && empty($password) && empty($passwordConfirm)){
            // TODO: move to controlller
            echo "<script>alert('You should write your username, email, password and confirmation properly!');
            // window.history.go(-1);</script>";
        }else{
   
            $uid = $this->uidCreate(); // creating unique id for user

            $req = $db->prepare("SELECT username, uid, email FROM users WHERE username = :inUser OR uid = :inUid OR email = :inEmail"); //email also should include
            $req ->execute(array(
                'inUser' => $username,
                'inUid' => $uid,
                'inEmail' => $email
            ));
            $res = $req->fetch(PDO::FETCH_ASSOC);

            // echo "<pre>";
            // print_r($res);
            // echo "<br>{$res['email']}";
            $isUnique = true;


            if($res AND count($res) !== 0){
                $isUnique = false;
                $uid = $this->uidCreate(); // creating unique id for user
                if ($res['username'] == $username AND $res['email'] == $email) {
                    // TODO: move to controlller
                    echo "<script>alert('This username and email is taken. You should use a unique name!');</script>";
                } else if ($res['email'] == $email) {
                    // TODO: move to controlller
                    echo "<script>alert('This email is taken. You should use a unique email adress!');</script>";

                } else if ($res['username'] == $username) {
                    // TODO: move to controlller
                    echo " <script>alert('This username is taken. You should use a unique name!');</script>";
                } else {
                    // TODO: do while loop if uid is not unique
                    if ($res['uid'] == $uid)
                    $uid = $this->uidCreate(); 
                }
            }
            
            if ($isUnique) {
                // $_SESSION['login'] = $username; 
                
                $control[] = '';
                if(preg_match("#^[a-zA-Z0-9._-]{2,}$#", $username)){
                    array_push($control, 'true');
                }else array_push($control, "Your username must include at least 2 character! ");

                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
                    array_push($control, 'true');
                }else array_push($control, " You should write a proper e-mail adress!");

                if($password === $passwordConfirm && $password !== '' && $passwordConfirm !== ''){
                    array_push($control, 'true');
                }else array_push($control," Your passwords are mismatched!");

                if(array_count_values(array_values($control))['true'] == 3){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $req = $db->prepare("INSERT INTO users (uid, firstname, lastname, username, email, password) 
                                        VALUES(:inUid, :inFirstname, :inLastname, :inUser, :inEmail, :inPassword)");
                    $req ->execute(array(
                        'inUid' => $uid,
                        'inFirstname' => $firstname,
                        'inLastname' => $lastname,
                        'inUser' => $username,
                        'inEmail' => $email,
                        'inPassword' => $password                
                    ));
                    // TODO: move to controlller
                    echo "<script>alert('You are succefully signed up!');</script>";
                } else {
                    $error = '';
                foreach(array_values($control) as $key){
                    if ($key != 'true')
                        $error .= $key . ' ';
                }
                // TODO: move to controller
                echo "<script>alert('$error');window.history.go(-1);</script>";
                }
            }

        }
        return $username;
    }
}

<?php

require_once("Manager.php");

class SignUpManager extends Manager {
 
    public function signUp($response){
        echo "<pre>";
        print_r($response);
        echo "</pre>";

        $firstname = $response['firstname'];
        $lastname = $response['lastname'];
        $username = $response['username'];
        $dob = $response['dob'];
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
        if (empty($username) AND empty($email) AND empty($password) AND empty($passwordConfirm)){
            header('Location: ./index.php?action=signUpFailed&reason=emptyFields');
        } else {
   
            $uid = $this->uidCreate(); // creating unique id for user

            $req = $db->prepare("SELECT username, uid, email FROM users WHERE username = :inUser OR uid = :inUid OR email = :inEmail"); //email also should include
            $req ->execute(array(
                'inUser' => $username,
                'inUid' => $uid,
                'inEmail' => $email
            ));
            $res = $req->fetch(PDO::FETCH_ASSOC);

            $isUnique = true;


            if($res AND count($res) !== 0){
                $isUnique = false;
                $uid = $this->uidCreate(); // creating unique id for user
                if ($res['username'] == $username AND $res['email'] == $email) {
                    return "usernameEmail";
                } else if ($res['email'] == $email) {
                    return "email";
                } else if ($res['username'] == $username) {
                    return "username";
                } else {
                    // TODO: do while loop if uid is not unique
                    if ($res['uid'] == $uid)
                    $uid = $this->uidCreate(); 
                }
            }
            
            if ($isUnique) {
                // $_SESSION['login'] = $username; 
                
                $control = [];
                if(preg_match("#^[a-zA-Z0-9._-]{2,}$#", $username)){
                    array_push($control, 'true');
                } else array_push($control, "Your username must include at least 2 characters! ");

                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
                    array_push($control, 'true');
                }else array_push($control, " You should write a proper e-mail address!");

                if($password === $passwordConfirm && $password !== '' && $passwordConfirm !== ''){
                    array_push($control, 'true');
                }else array_push($control," Your passwords did not match or were empty!");

                if(array_count_values(array_values($control))['true'] == 3){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $req = $db->prepare("INSERT INTO users (uid, firstname, lastname, username, dob, email, password) 
                                        VALUES(:inUid, :inFirstname, :inLastname, :inUser, :inDob, :inEmail, :inPassword)");
                    $req ->execute(array(
                        'inUid' => $uid,
                        'inFirstname' => $firstname,
                        'inLastname' => $lastname,
                        'inUser' => $username,
                        'inDob' => $dob,
                        'inEmail' => $email,
                        'inPassword' => $password                
                    ));

                    echo "<script>alert('You are succefully signed up!');</script>";

                } else { // TODO: What is this for?
                    $error = '';
                    foreach(array_values($control) as $key){
                        if ($key != 'true') $error .= $key . '<br>';
                    }
                    return $error;
                }
            }
        }
        return $username;
    }
}

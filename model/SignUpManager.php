<?php

require_once("Manager.php");

class SignUpManager extends Manager {
 
    public function signUp($user_fetch){
        // $response = $this->userCheck($user_fetch);

        if (!empty($response)) {
            return null;
        } else {
            $username = $user_fetch['username'];
            $dob = $user_fetch['dob'];
            $email = $user_fetch['email'];
            $password = $user_fetch['password'];
            $passwordConfirm = $user_fetch['passwordConfirm'];

            $db = $this->dbConnect();
    
            /* 
            ####### DEFINITION ############
    
            @param $control = contains user input's in the following order.
            1 = login
            2 = email
            3 = password confirm
    
            */
            if (empty($username) AND empty($email) AND empty($dob) AND empty($password) AND empty($passwordConfirm)){
                // header('Location: ./index.php?action=signUpFailed&reason=emptyFields');
                // return "emptyFields";
                return null;
            } else {
       
                do {
                    $uid = $this->uidCreate();
    
                    $req = $db->prepare("SELECT uid FROM users WHERE uid = ?");
                    $req ->execute(array($uid));
        
                    $res = $req->fetch(PDO::FETCH_ASSOC);
                } while (!empty($res));
    
                $isUnique = true;
    
                // if($res AND count($res) !== 0){
                //     $isUnique = false;
                //     $uid = $this->uidCreate(); // creating unique id for user
                //     if ($res['username'] == $username AND $res['email'] == $email) {
                //         return "usernameEmail";
                //     } else if ($res['email'] == $email) {
                //         return "email";
                //     } else if ($res['username'] == $username) {
                //         return "username";
                //     } else {
                //         // TODO: do while loop if uid is not unique
                //         if ($res['uid'] == $uid)
                //         $uid = $this->uidCreate(); 
                //     }
                // }
                
                if ($isUnique) {
                    $_SESSION['uid'] = $uid; 
                    
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
    
                    // Will trigger if BE validation succeeds
                    if(array_count_values(array_values($control))['true'] == 3){
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $req = $db->prepare("INSERT INTO users (uid, username, dob, email, password) 
                                            VALUES(:inUid, :inUser, :inDob, :inEmail, :inPassword)");
                        $req ->execute(array(
                            'inUid' => $uid,
                            'inUser' => $username,
                            'inDob' => $dob,
                            'inEmail' => $email,
                            'inPassword' => $password                
                        ));
    
                        echo "<script>alert('You are succefully signed up!');</script>";
    
                    } else { // TODO: What is this for?
                        return null;
                        $error = '';
                        foreach(array_values($control) as $key){
                            if ($key != 'true') $error .= $key . '<br>';
                        }
                        return $error;
                    }
                }
            }

            $req = $db->prepare('SELECT username, profile_img_path FROM users WHERE email = ?');
            $req->execute(array($email));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();
    
            // return $response['firstname'];
            return $response;
            // return $username;
        }
    }

    public function userSignUp($user_fetch) {

        $control = [];
        preg_match("/^[a-zA-Z0-9]{4,}/", $user_fetch['username']) ? array_push($control, true) : array_push($control, "Your username must include at least 4 characters.");
        preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $user_fetch['email']) ? array_push($control, true) : array_push($control, "You must use a proper email address.");
        time() >= strtotime('+18 years', strtotime($user_fetch['dob'])) ? array_push($control, true) : array_push($control, "You must be over 18 years old to sign up.");
        preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/", $user_fetch['password']) ? array_push($control, true) : array_push($control, "Your password did not meet the minimum requirements.");
        $user_fetch['password'] == $user_fetch['passwordConfirm'] ? array_push($control, true) : array_push($control, "Your passwords did not match.");

        if (count(array_unique($control)) === 1) {
            $response = $this->userCheck($user_fetch, $user_fetch['username'], $user_fetch['email']);
            if (!empty($response)) {
                return "exists";
            } else {
                $db = $this->dbConnect();

                do {
                    $uid = $this->uidCreate();

                    $req = $db->prepare("SELECT uid FROM users WHERE uid = ?");
                    $req->execute(array($uid));

                    $res = $req->fetch(PDO::FETCH_ASSOC);
                } while (!empty($res));

                $password = password_hash($user_fetch['password'], PASSWORD_DEFAULT);

                $req = $db->prepare("INSERT INTO users (uid, username, dob, email, password) 
                                     VALUES(:inUid, :inUser, :inDob, :inEmail, :inPassword)");

                $req->execute(array(
                    'inUid' => $uid,
                    'inUser' => $user_fetch['username'],
                    'inDob' => $user_fetch['dob'],
                    'inEmail' => $user_fetch['email'],
                    'inPassword' => $password
                ));
                return $uid;
            }
        } else {
            $error = '';
            foreach ($control as $value) {
                if ($value != '1') $error .= $value . '<br>';
            }
            return $error;
        }
    }
}

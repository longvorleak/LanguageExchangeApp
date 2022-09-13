<?php

require_once("Manager.php");

class LoginManager extends Manager
{
    public function uidCreate()
    {
        function crypto_rand_secure($min, $max) //https://www.php.net/manual/en/function.openssl-random-pseudo-bytes.php#104322
        {
            $range = $max - $min;
            if ($range < 1) return $min; // not so random...
            $log = ceil(log($range, 2));
            $bytes = (int) ($log / 8) + 1; // length in bytes
            $bits = (int) $log + 1; // length in bits
            $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
            do {
                $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
                $rnd = $rnd & $filter; // discard irrelevant bits
            } while ($rnd > $range);

            return $min + $rnd;
        }

        $token = "";
        $codeAlphabet = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijkmnopqrstuvwxyz";
        $codeAlphabet .= "123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < 10; $i++) {
            $token .= $codeAlphabet[crypto_rand_secure(0, $max - 1)];
        }

        return $token;
    }

    public function userCheck($user_fetch) {
        $uid = $this->uidCreate(); // creating unique id for user

        $db = $this->dbConnect();
        
        $req = $db->prepare('SELECT * FROM users WHERE email = ? OR uid = ?');
        $req->execute(array($user_fetch['email'], $uid));
        $response = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        

        if (!empty($response)) {
            return $response['firstname'];
        } else {
            $req = $db->prepare('INSERT INTO users (uid, firstname, lastname, username, email) VALUES(:inUID, :inFirstName, :inLastName, :inUsername, :inEmail)');
            $req->execute(array(
                'inUID' => $uid,
                'inFirstName' => $user_fetch['given_name'],
                'inLastName' => $user_fetch['family_name'],
                'inUsername' => $user_fetch['email'],
                'inEmail' => $user_fetch['email']
            ));

            $req = $db->prepare('SELECT * FROM users WHERE email = ?');
            $req->execute(array($user_fetch['email']));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

            return $response['firstname'];
        }
    }

    public function newSignUp($user_fetch){

        $firstname = $user_fetch['firstname'];
        $lastname = $user_fetch['lastname'];
        $username = $user_fetch['username'];
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
        if(empty($username) && empty($email) && empty($password) && empty($passwordConfirm)){
            echo "<script>alert('You should write your username, email, password and confirmation properly!');
            window.history.go(-1);</script>";
        }else{
            include "uidCreate.php";
            $uid = $this->uidCreate(); // creating unique id for user

            $req = $db->prepare("SELECT u.username, u.uid FROM users u WHERE u.username = :inUser OR u.uid = :inUid"); //email also should include
            $req ->execute(array(
                'inUser' => $username,
                'inUid' => $uid
            ));
            $res = $req->fetchAll(PDO::FETCH_ASSOC);


            if(count($res)!== 0){
                $uid = $this->uidCreate(); // creating unique id for user
                echo "<script>alert('This username is taken. You should use a unique name!');
                window.history.go(-1);</script>";

            }else{
                
                $_SESSION['login'] = $username; 

                
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
                    // print_r($req);
                    echo "<script>alert('You are succefully signed up!');</script>";
                    // 
                } else {
                    $error = '';
                // $newArr = array_count_values(array_values($control));
                foreach(array_values($control) as $key){
                    if ($key != 'true')
                        $error .= $key . ' ';
                }
                echo "<script>alert('$error');
                window.history.go(-1);</script>";
                }
                header("Location: index.php");
            }

        }
    }
}
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

        if (isset($user_fetch['username'])) {
            $req = $db->prepare('SELECT uid, username, email FROM users WHERE uid = ? OR username = ? email = ?');
            $req->execute(array($uid, htmlspecialchars($user_fetch['username']), htmlspecialchars($user_fetch['email'])));
        } else if (isset($user_fetch['usernameEmail']) AND isset($user_fetch['passwordIn'])) {
            $req = $db->prepare('SELECT username, email, password FROM users WHERE username = ? OR email = ?');
            $req->execute(array(htmlspecialchars($user_fetch['usernameEmail']), htmlspecialchars($user_fetch['usernameEmail'])));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            if (password_verify($user_fetch['passwordIn'], $response['password'])) {
                return $response;
            } else {
                //TODO: move all redirects to controller
                header('Location: ./index.php?action=loginFailed');
            }
        } else {
            // TODO: change from * to selected columns
            $req = $db->prepare('SELECT * FROM users WHERE email = ? OR uid = ?');
            $req->execute(array(htmlspecialchars($user_fetch['email']), $uid));
        }

        $response = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $response;
    }

    public function newUserCheck($user_fetch) {
        $uid = $this->uidCreate(); // creating unique id for user
        $db = $this->dbConnect();

        if (isset($user_fetch['username']) and isset($user_fetch['password'])) {
            // TODO: change from * to selected columns
            $req = $db->prepare('SELECT * FROM users WHERE email = ? OR uid = ? OR username = ?');
            $req->execute(array(htmlspecialchars($user_fetch['email'], $uid, htmlspecialchars($user_fetch['username']))));
        } else if (isset($user_fetch['usernameEmail'])) {
            // TODO: change from * to selected columns
            $req = $db->prepare('SELECT * FROM users WHERE email = ? OR uid = ? OR username = ?');
            $req->execute(array(htmlspecialchars($user_fetch['usernameEmail']), $uid, htmlspecialchars($user_fetch['usernameEmail'])));
        } else {
            // TODO: change from * to selected columns
            $req = $db->prepare('SELECT * FROM users WHERE email = ? OR uid = ?');
            $req->execute(array(htmlspecialchars($user_fetch['email']), $uid));
        }

        $response = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $response;
    }

    public function userSignUp() {

    }

    public function userLogin($user_fetch) {
        $response = $this->userCheck($user_fetch);
        
        if (!empty($response)) {
            return $response['username'];
        } else {
            return null;
        }
    }

    public function googleCheck($user_fetch) {
        $response = $this->userCheck($user_fetch);

        if (!empty($response)) {
            // return $response['firstname'];
            return $response;
        } else {
            $uid = $this->uidCreate(); // creating unique id for user
            $db = $this->dbConnect();

            $req = $db->prepare('INSERT INTO users (uid, firstname, lastname, email) VALUES(:inUID, :inFirstName, :inLastName, :inUsername, :inEmail)');
            $req->execute(array(
                'inUID' => $uid,
                'inFirstName' => $user_fetch['given_name'],
                'inLastName' => $user_fetch['family_name'],
                'inUsername' => $user_fetch['email'],
                'inEmail' => $user_fetch['email']
            ));

            // TODO: change from * to selected columns
            $req = $db->prepare('SELECT * FROM users WHERE email = ?');
            $req->execute(array($user_fetch['email']));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

            return $response['firstname'];
        }
    }

    public function kakaoCheck($user_fetch) {
    
    }
}

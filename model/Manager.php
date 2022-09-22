<?php
class Manager
{
    protected function dbConnect() {
        return new PDO('mysql:host=localhost;dbname=language_exchange_app;charset=utf8', 'root', '');
    }

    protected function uidCreate()
    {
        if(!function_exists('crypto_rand_secure')){
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

    protected function userCheck($user_fetch)
    // protected function userCheck($user_fetch, $str, $str2 = null)
    {

        $uid = $this->uidCreate(); // creating unique id for user
        $db = $this->dbConnect();

        // switch ($str) {
        //     case "username":
        //         break;
        // }

        // FOR SIGN UP
        if (isset($user_fetch['username']) AND isset($user_fetch['email'])) {
            $req = $db->prepare('SELECT uid, username, email FROM users WHERE uid = ? OR username = ? OR email = ?');
            $req->execute(array($uid, $user_fetch['username'], $user_fetch['email']));
        }

        // FOR LOGIN
        if (isset($user_fetch['emailUsername'])) {
            $req = $db->prepare('SELECT uid, firstname, username, email, profile_img_path, password FROM users WHERE username = ? OR email = ?');
            $req->execute(array($user_fetch['emailUsername'], $user_fetch['emailUsername']));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            if (!empty($response) and password_verify($user_fetch['password'], $response['password'])) {
                return $response;
            }
        }

        // FOR GOOGLE
        if (isset($user_fetch['iss'])) {
            $req = $db->prepare('SELECT uid, firstname, username, email, profile_img_path FROM users WHERE username = ? OR email = ?');
            $req->execute(array($user_fetch['email'], $user_fetch['email']));
        }

        // FOR 
        if (isset($user_fetch['usernameCheck']) and isset($user_fetch['emailCheck'])) {
            $req = $db->prepare('SELECT username, email FROM users WHERE username = ? AND email = ?');
            $req->execute(array($user_fetch['usernameCheck'], $user_fetch['emailCheck']));
        }

        if (isset($user_fetch['existingUsername']) and isset($user_fetch['existingEmail']) and isset($user_fetch['newPassword']) and isset($user_fetch['newPasswordConfirm']) and $user_fetch['newPassword'] == $user_fetch['newPasswordConfirm']) {
            $req = $db->prepare('SELECT username, email FROM users WHERE username = ? AND email = ?');
            $req->execute(array($user_fetch['existingUsername'], $user_fetch['existingEmail']));
        }

        $response = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $response;
    }
}

// if (!isset($user_login)) {
//     throw new Exception("401 - Not authorized");
// }
// if (!isset($_SESSION['uid'])) {
//     throw new Exception("401 - Not authorized");
// }
// if (!isset($user_login)) {
//     throw new Exception("401 - Not authorized");
// }
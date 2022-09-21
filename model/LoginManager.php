<?php

require_once("Manager.php");

class LoginManager extends Manager
{
    public function userCheck($user_fetch) {

        $uid = $this->uidCreate(); // creating unique id for user
        $db = $this->dbConnect();

        if (isset($user_fetch['username']) AND isset($user_fetch['email'])) {
            $req = $db->prepare('SELECT uid, firstname, username, email, profile_img_path FROM users WHERE uid = ? OR username = ? email = ?');
            $req->execute(array($uid, $user_fetch['username'], $user_fetch['email']));
        }
        
        if (isset($user_fetch['emailUsername'])) {
            $req = $db->prepare('SELECT uid, firstname, username, email, profile_img_path, password FROM users WHERE username = ? OR email = ?');
            $req->execute(array($user_fetch['emailUsername'], $user_fetch['emailUsername']));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            if (!empty($response) AND password_verify($user_fetch['password'], $response['password'])) {
                return $response;
            }
        }

        if (isset($user_fetch['iss'])) {
            $req = $db->prepare('SELECT uid, firstname, username, email, profile_img_path FROM users WHERE username = ? OR email = ?');
            $req->execute(array($user_fetch['email'], $user_fetch['email']));
        }

        if (isset($user_fetch['usernameCheck']) AND isset($user_fetch['emailCheck'])) {
            $req = $db->prepare('SELECT username, email FROM users WHERE username = ? AND email = ?');
            $req->execute(array($user_fetch['usernameCheck'], $user_fetch['emailCheck']));
        }

        if (isset($user_fetch['existingUsername']) AND isset($user_fetch['existingEmail']) AND isset($user_fetch['newPassword']) AND isset($user_fetch['newPasswordConfirm']) AND $user_fetch['newPassword'] == $user_fetch['newPasswordConfirm']) {
            $req = $db->prepare('SELECT username, email FROM users WHERE username = ? AND email = ?');
            $req->execute(array($user_fetch['existingUsername'], $user_fetch['existingEmail']));
        }


        $response = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $response;
    }

    public function userLogin($user_fetch) {
        $response = $this->userCheck($user_fetch);

        if (!empty($response)) {
            return $response;
        } else {
            return null;
        }
    }

    public function googleCheck($user_fetch) {
        $response = $this->userCheck($user_fetch);

        if (!empty($response)) {
            return $response;
        } else {
            $uid = $this->uidCreate(); // creating unique id for user
            $db = $this->dbConnect();

            $req = $db->prepare('INSERT INTO users (uid, firstname, lastname, username, email, profile_img_path) VALUES(:inUID, :inFirstName, :inLastName, :inUsername, :inEmail, :inPhoto)');
            $req->execute(array(
                'inUID' => $uid,
                'inFirstName' => $user_fetch['given_name'],
                'inLastName' => $user_fetch['family_name'],
                'inUsername' => $user_fetch['email'],
                'inEmail' => $user_fetch['email'],
                'inPhoto' => $user_fetch['picture']
            ));

            $req = $db->prepare('SELECT firstname, profile_img_path FROM users WHERE email = ?');
            $req->execute(array($user_fetch['email']));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

            return $response;
        }
    }

    public function kakaoCheck($user_fetch) {
    
    }

    public function existingUserCheck($user_fetch) {
        $response = $this->userCheck($user_fetch);

        if (!empty($response)) {
            return $response;
        } else {
            return null;
        }
    }

    public function changePasswordCheck($user_fetch) {
        $response = $this->userCheck($user_fetch);

        if (!empty($response)) {
            $db = $this->dbConnect();
            $password = password_hash($user_fetch['newPassword'], PASSWORD_DEFAULT);
            $req = $db->prepare('UPDATE users SET password = ? WHERE username = ? AND email = ?');
            $req->bindParam(1, $password);
            $req->bindParam(2, $response['username']);
            $req->bindParam(3, $response['email']);
            $res = $req->execute();

            return $res;
        } else {
            return null;
        }
    }
}

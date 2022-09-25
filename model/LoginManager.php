<?php

require_once("Manager.php");

class LoginManager extends Manager {

    public function userLogin($user_fetch) {
        $response = $this->userCheck($user_fetch, 'emailUsername');

        if (!empty($response)) {
            return $response;
        } else {
            return null;
        }
    }

    public function googleCheck($user_fetch) {
        $response = $this->userCheck($user_fetch, 'iss');

        if (!empty($response)) {
            return $response;
        } else {
            $db = $this->dbConnect();

            do {
                $uid = $this->uidCreate();

                $req = $db->prepare("SELECT uid FROM users WHERE uid = ?");
                $req->execute(array($uid));

                $res = $req->fetch(PDO::FETCH_ASSOC);
            } while (!empty($res));

            $req = $db->prepare('INSERT INTO users (uid, firstname, lastname, username, email, profile_img_path) VALUES(:inUID, :inFirstName, :inLastName, :inUsername, :inEmail, :inPhoto)');
            $req->execute(array(
                'inUID' => $uid,
                'inFirstName' => $user_fetch['given_name'],
                'inLastName' => $user_fetch['family_name'],
                'inUsername' => $user_fetch['email'],
                'inEmail' => $user_fetch['email'],
                'inPhoto' => $user_fetch['picture']
            ));

            $req = $db->prepare('SELECT uid, firstname, profile_img_path FROM users WHERE email = ?');
            $req->execute(array($user_fetch['email']));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

            return $response;
        }
    }

    public function kakaoCheck($user_fetch) {
    
    }

    public function existingUserCheck($user_fetch) {
        // TODO: CHANGE PARAMETERS TO MATCH NEW userCheck function
        // $response = $this->userCheck($user_fetch);
        // $response = $this->userCheck($user_fetch, 'username', 'email');

        if (!empty($response)) {
            return $response;
        } else {
            return null;
        }
    }

    public function changePasswordCheck($user_fetch) {
        // TODO: CHANGE PARAMETERS TO MATCH NEW userCheck function
        // $response = $this->userCheck($user_fetch);

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

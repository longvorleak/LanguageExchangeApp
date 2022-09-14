<?php

require_once("Manager.php");

class LoginManager extends Manager
{
    
    public function userCheck($user_fetch) {
        $uid = $this->uidCreate(); // creating unique id for user
        $db = $this->dbConnect();
        
        if ($user_fetch['username'] == null) {
            $req = $db->prepare('SELECT * FROM users WHERE email = ? OR uid = ?');
            $req->execute(array($user_fetch['email'], $uid));
        } else {
            $req = $db->prepare('SELECT * FROM users WHERE email = ? OR uid = ? OR username = ?');
            $req->execute(array($user_fetch['email'], $uid, $user_fetch['username']));
        }

        $response = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $response;
    }

    public function googleCheck($user_fetch) {
        $response = $this->userCheck($user_fetch);

        if (!empty($response)) {
            return $response['firstname'];
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

            $req = $db->prepare('SELECT * FROM users WHERE email = ?');
            $req->execute(array($user_fetch['email']));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

            return $response['firstname'];
        }
    }


}
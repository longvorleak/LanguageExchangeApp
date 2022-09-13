<?php

require_once("Manager.php");

class LoginManager extends Manager
{
    public function userCheck($google_fetch)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($google_fetch['email']));
        $response = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        if (!empty($response)) {
            return $response['firstname'];
        } else {
            $req = $db->prepare('INSERT INTO users (firstname, lastname, email) VALUES(:inFirstName, :inLastName, :inEmail)');
            $req->execute(array(
                'inFirstName' => $google_fetch['given_name'],
                'inLastName' => $google_fetch['given_name'],
                'inEmail' => $google_fetch['email']
            ));

            $req = $db->prepare('SELECT * FROM users WHERE email = ?');
            $req->execute(array($google_fetch['email']));
            $response = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

            return $response['firstname'];
        }
    }
}


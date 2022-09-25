<?php

require_once("Manager.php");

class SignUpManager extends Manager {

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

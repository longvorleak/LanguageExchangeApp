<?php
require_once 'config.php';

// Authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user profile info; don't worry about Google_Service_Oauth2
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
        'email' => $google_account_info['email'],
        'first_name' => $google_account_info['givenName'],
        'last_name' => $google_account_info['familyName'],
        'gender' => $google_account_info['gender'],
        'full_name' => $google_account_info['name'],
        'picture' => $google_account_info['picture'],
        'verifiedEmail' => $google_account_info['verifiedEmail'],
        'token' => $google_account_info['id'],
    ];

    // Checking if user already exists in table: google_login
    $sql = "SELECT * FROM google_login WHERE email ='{$userinfo['email']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // If user exists...
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
    } else {
        // User doesn't exist...
        $sql = "INSERT INTO google_login (email, first_name, last_name, gender, full_name, picture, verified_Email, token) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['gender']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', '{$userinfo['verifiedEmail']}', '{$userinfo['token']}')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $token = $userinfo['token'];
        } else {
            echo "User is not created";
            die();
        }
    }

    // Save user in a SESSION
    $_SESSION['user_token'] = $token;
} else {
    if (!isset($_SESSION['user_token'])) {
        header("Location: googeLogin.php");
        die();
    }

    // Checking if user already exists in table: google_login
    $sql = "SELECT * FROM google_login WHERE token ='{$_SESSION['user_token']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // user is exists
        $userinfo = mysqli_fetch_assoc($result);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?= $userinfo['first_name'] ?>!</title>
</head>

<body>
    <img src="<?= $userinfo['picture'] ?>" alt="" width="90px" height="90px">
    <ul>
        <li>Full Name: <?= $userinfo['full_name'] ?></li>
        <li>Email Address: <?= $userinfo['email'] ?></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>

</html>
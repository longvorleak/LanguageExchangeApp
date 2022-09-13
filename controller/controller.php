<?php

require_once("./model/LoginManager.php");

function googleLogin($response) {
    $response = json_decode(base64_decode(str_replace('', '/', str_replace('-', '+', explode('.', $response['credential'])[1]))),true);
    $login_manager = new LoginManager();
    $google_login = $login_manager->userCheck($response);
    require('./view/userDashboardView.php');
}

function kakaoLogin() {

}


function emailLogin($response) {
    $login_manager = new LoginManager();
    $email_login = $login_manager->userCheck($response);
    require('./view/userDashboardView.php');
}

function newSignUp($response) {

    $login_manager = new LoginManager();
    $user_signup = $login_manager->newSignUp($response);
    require('./view/userDashboardView.php');
}
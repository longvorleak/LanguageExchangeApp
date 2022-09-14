<?php

require_once("./model/LoginManager.php");

function startSplash() {
    require('./view/splashView.php');
}

function signUp(){
    $signup_manager = new SignUpManager();
    $signup = $signup_manager->signUp();
}

function regularLogin($response) {
    $login_manager = new LoginManager();
    $regular_login = $login_manager->userCheck($response);
    require('./view/userDashboardView.php');
}

function googleLogin($response) {
    $response = json_decode(base64_decode(str_replace('', '/', str_replace('-', '+', explode('.', $response['credential'])[1]))),true);
    $login_manager = new LoginManager();
    $google_login = $login_manager->googleCheck($response);
    require('./view/userDashboardView.php');
}

function kakaoLogin() {
    // do something
}
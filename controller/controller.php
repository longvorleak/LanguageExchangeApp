<?php

require_once("./model/LoginManager.php");

function startSplash() {
    require('./view/splashView.php');
}

function signUp($response){
    $signup_manager = new SignUpManager();
    $user_login = $signup_manager->signUp($response);
    require('./view/userDashboardView.php');
}

function signUpFailed($response) {
    require('./view/loginSignUpView.php');
}

function regularLogin($response) {
    $login_manager = new LoginManager();
    $user_login = $login_manager->userCheck($response);
    require('./view/userDashboardView.php');
}

function googleLogin($response) {
    $response = json_decode(base64_decode(str_replace('', '/', str_replace('-', '+', explode('.', $response['credential'])[1]))),true);
    $login_manager = new LoginManager();
    $user_login = $login_manager->googleCheck($response);
    require('./view/userDashboardView.php');
}

function kakaoLogin() {
    // do something
}
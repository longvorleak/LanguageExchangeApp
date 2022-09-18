<?php

require_once("./model/LoginManager.php");
require_once("./model/SignUpManager.php");

function startSplash() {
    require('./view/landingPageView.php');
}

function signUp($response){
    $signup_manager = new SignUpManager();
    $user_login = $signup_manager->signUp($response);
    require('./view/home.php');
}

function signUpFailed($response) {
    require('./view/loginSignUpView.php');
}

function regularLogin($response) {
    $login_manager = new LoginManager();
    $user_login = $login_manager->userLogin($response);
    if ($user_login) {
        require('./view/home.php');
    } else {
        header('Location: ./view/loginSignUpView.php?action=loginFailed');
    }
}

function googleLogin($response) {
    $response = json_decode(base64_decode(str_replace('', '/', str_replace('-', '+', explode('.', $response['credential'])[1]))),true);
    $login_manager = new LoginManager();
    $user_login = $login_manager->googleCheck($response);
    require('./view/home.php');
}

function kakaoLogin() {
    // do something
}

function aboutUs() {
    require('./view/aboutUsView.php');
}

function premium() {
    require('./view/premiumView.php');
}

function login() {
    require('./view/loginSignUpView.php');
}

function userSignOut() {
    // session_destroy();
    // session_unset();
    require('./view/landingPageView.php');
}
<?php

require_once("./model/LoginManager.php");
require_once("./model/SignUpManager.php");

function startSplash() {
    require('./view/landingPageView.php');
}

function signUp($response){
    $signup_manager = new SignUpManager();
    $user_login = $signup_manager->signUp($response);
    if($user_login == $response['username']){
    require('./view/home.php');
    } else {
        header("Location: ./index.php?action=signUpFailed&reason=$user_login");
    }
}

function signUpFailed() {
    require('./view/loginSignUpView.php');
}

function regularLogin($response) {
    $login_manager = new LoginManager();
    $user_login = $login_manager->userLogin($response);
    if ($user_login) {
        require('./view/home.php');
    } else {
        header("Location: ./index.php?action=loginFailed");
    }
}

function loginFailed() {
    require('./view/loginSignUpView.php');
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
    require('./view/loginSignUpView.php');//we should add initial values before calling the page
}

function userSignOut() {
    // setcookie('g_csrf_token', null, time() - 10000000);
    // setcookie('g_state', null, time() - 10000000);
    // session_destroy();
    // session_unset();
    setcookie(session_name("g_csrf_token"), '', time() - 3600, '/');
    setcookie(session_name("g_state"), '', time() - 3600, '/');
    require('./view/landingPageView.php');
}
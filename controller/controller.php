<?php

require_once("./model/LoginManager.php");
require_once("./model/SignUpManager.php");
require_once("./model/ProfileUpdateManager.php");
require_once("./model/UploadManager.php");

function startSplash() {
    require('./view/landingPageView.php');
}

function signUp($response){
    $signup_manager = new SignUpManager();
    $user_login = $signup_manager->signUp($response);
    // print_r($user_login);
    if($user_login == $response['username']){
        // setcookie('username', $user_login);
        // session_start();
        $_SESSION['firstname'] = $user_login['firstname'];
        $_SESSION['photo'] = $user_login['profile_img_path'];
        require('./view/home.php');
    } else {
        header("Location: ./index.php?action=signUpFailed&reason=$user_login");
    }
}

function login() {
    require('./view/loginSignUpView.php');
}

function signUpFailed() {
    require('./view/loginSignUpView.php');
}

function regularLogin($response) {
    $login_manager = new LoginManager();
    $user_login = $login_manager->userLogin($response);
    // print_r($user_login);
    if ($user_login) {
        // setcookie('username', $user_login);
        // session_start();
        $_SESSION['firstname'] = $user_login['firstname'];
        $_SESSION['photo'] = $user_login['profile_img_path'];
        require('./view/home.php');
    } else {
        header("Location: ./index.php?action=loginFailed");
    }
}

function loginFailed() {
    require('./view/loginSignUpView.php');
}

function updateFailed(){
    require('./view/profileEditView.php');
}

function googleLogin($response) {
    $response = json_decode(base64_decode(str_replace('', '/', str_replace('-', '+', explode('.', $response['credential'])[1]))),true);
    // echo "<pre>";
    // print_r($response);
    // echo "</pre>";
    $login_manager = new LoginManager();
    $user_login = $login_manager->googleCheck($response);
    // print_r($user_login);
    // setcookie('username', $user_login);
    // session_start();
    $_SESSION['firstname'] = $user_login['firstname'];
    $_SESSION['photo'] = $user_login['profile_img_path'];
    require('./view/home.php');
}

function kakaoLogin() {
    // do something
}

function profileUpdate($response){
    $profileupdate_manager = new ProfileUpdateManager();
    $user_login = $profileupdate_manager->update($response);
    if ($user_login) {
        require('./view/profileEditView.php');
    } else {
        header("Location: ./index.php?action=updateFailed");
    }
}

function aboutUs() {
    require('./view/aboutUsView.php');
}

function premium() {
    require('./view/premiumView.php');
}

function userSignOut() {
    // setcookie('g_csrf_token', null, time() - 10000000);
    // setcookie('g_state', null, time() - 10000000);
    // session_unset();
    // session_destroy();
    // setcookie(session_name("g_csrf_token"), '', time() - 3600, '/');
    // setcookie(session_name("g_state"), '', time() - 3600, '/');
    require('./view/landingPageView.php');
}

// PROFILE PHOTO UPLOAD--------------------------------------------
function profileEditPage() {
    // header("Location: ./view/profileImageFormView.php?action=test");
    require('./view/profileImageFormView.php');
}

function imageUpload($response) {
    $upload_manager = new UploadManager();
    $photo_upload = $upload_manager->profilePhotoUpload($response);
    // echo $photo_upload;
    header("Location: ./index.php?action=imageUploaded");
}

function imageUploaded() {
    require('./view/home.php');
}
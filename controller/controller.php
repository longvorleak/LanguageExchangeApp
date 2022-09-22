<?php

require_once("./model/LoginManager.php");
require_once("./model/SignUpManager.php");
require_once("./model/UploadManager.php");

// --------------------------------------------------------------------
// -----------------------PAGE NAVIGATION------------------------------
// --------------------------------------------------------------------

function startSplash() {
    require('./view/landingPageView.php');
}

function login() {
    require('./view/loginSignUpView.php');
}

function aboutUs() {
    require('./view/aboutUsView.php');
}

function premium() {
    require('./view/premiumView.php');
}

// --------------------------------------------------------------------
// -----------------------USER SIGN UP---------------------------------
// --------------------------------------------------------------------

function signUp($response){
    $signup_manager = new SignUpManager();
    $user_login = $signup_manager->signUp($response);
    if($user_login){
        // $_SESSION['firstname'] = $user_login['firstname'];
        require('./view/home.php');
        // header("Location: ./index.php?action=signUpSuccess");
    } else {
        header("Location: ./index.php?action=signUpFailed");
    }
}

function signUpFailed() {
    require('./view/loginSignUpView.php');
}

// --------------------------------------------------------------------
// -----------------------USER LOGINS----------------------------------
// --------------------------------------------------------------------

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

function loginFailed() {
    require('./view/loginSignUpView.php');
}

function userSignOut() {
    // setcookie('g_csrf_token', null, time() - 10000000);
    // setcookie('g_state', null, time() - 10000000);
    // session_unset();
    // session_destroy();
    // setcookie(session_name("g_csrf_token"), '', time() - 3600, '/');
    // setcookie(session_name("g_state"), '', time() - 3600, '/');
    // require('./view/landingPageView.php');
    session_destroy();
    header("Location: ./index.php");
}

// --------------------------------------------------------------------
// -----------------------PROFILE PHOTO UPLOAD-------------------------
// --------------------------------------------------------------------

function profileEditPage() {
    // header("Location: ./view/profileImageFormView.php?action=test");
    require('./view/profileImageFormView.php');
}

function imageUpload($response) {
    $upload_manager = new UploadManager();
    $photo_upload = $upload_manager->profilePhotoUpload($response);
    echo $photo_upload;
    return $photo_upload;
    // header("Location: ./index.php?action=imageUploaded");
}

function imageUploaded() {
    require('./view/home.php');
}

// --------------------------------------------------------------------
// -----------------------FORGOT PASSWORD------------------------------
// --------------------------------------------------------------------

function forgotPassword() {
    require('./view/forgotPasswordView.php');
}

function usernameEmailCheck($response) {
    $login_manager = new LoginManager();
    $checkStatus = $login_manager->existingUserCheck($response);
    if ($checkStatus) {
        header("Location: ./index.php?action=existingUserCheckPassed&username={$checkStatus['username']}&email={$checkStatus['email']}");
    } else {
        header("Location: ./index.php?action=existingUserCheckFailed");
    }

}

function usernameEmailCheckFailed() {
    require('./view/forgotPasswordView.php');
}

function changePasswordView() {
    require('./view/changePasswordView.php');
}

function changePasswordStatus($response) {
    $login_manager = new LoginManager();
    $password_status = $login_manager->changePasswordCheck($response);
    if ($password_status) {
        header("Location: ./index.php?action=changePasswordSuccess");
    } else {
        header("Location: ./index.php?action=changePasswordFailed");
    }
}

function changePasswordSuccess() {
    require('./view/loginSignUpView.php');
}

function changePasswordFailed() {
    require('./view/changePasswordView.php');
}
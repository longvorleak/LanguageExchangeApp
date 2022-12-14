<?php

require_once("./model/LoginManager.php");
require_once("./model/SignUpManager.php");
require_once("./model/UploadManager.php");
require_once("./model/UserProfileManager.php");

// --------------------------------------------------------------------
// -----------------------PAGE NAVIGATION------------------------------
// --------------------------------------------------------------------

function startLandingPage() {
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

function settingsPageView() {
    require('./view/settingsView.php');
}

function profileEditView() {
    // TODO: get user's profile info from the Model
    // pre-populate the inputs with their info if it exists
    require('./view/profileEditView.php');
}

function profileView() {
    require('./view/profileView.php');
}

// --------------------------------------------------------------------
// -----------------------USER SIGN UP---------------------------------
// --------------------------------------------------------------------

function signUp($response){
    $signup_manager = new SignUpManager();
    $user_login = $signup_manager->userSignUp($response);
    // echoPre($user_login);
    if(!str_contains($user_login, "<br>")){
        $_SESSION['uid'] = $user_login;
        // $user_profile_manager = new UserProfileManager();
        // $user_info = $user_profile_manager->getUser($_SESSION['uid']);
        // echoPre($user_info);
        // header("Location: ./index.php?action=signUpSuccess&user={$user_info['username']}");
        require('./view/home.php');
    } else {
        header("Location: ./index.php?action=signUpFailed&reason=$user_login");
    }
}

function signUpSuccess() {
    require('./view/home.php');
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
    // echoPre($user_login);
    // print_r($user_login);
    if ($user_login) {
        // setcookie('username', $user_login);
        // session_start();
        $_SESSION['uid'] = $user_login['uid'];
        // $_SESSION['username'] = $user_login['username'];
        // $_SESSION['photo'] = $user_login['profile_img_path'];
        require('./view/home.php');
    } else {
        header("Location: ./index.php?action=loginFailed");
    }
}

function googleLogin($response) {
    $response = json_decode(base64_decode(str_replace('', '/', str_replace('-', '+', explode('.', $response['credential'])[1]))),true);
    $login_manager = new LoginManager();
    $user_login = $login_manager->googleCheck($response);
    $_SESSION['uid'] = $user_login['uid'];
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
    // echo $photo_upload;
    // return $photo_upload;
    header("Location: ./index.php?action=imageUploaded");
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


// --------------------------------------------------------------------
// -----------------------UTILITY FUNCTIONS----------------------------
// --------------------------------------------------------------------
function echoPre($user_fetch) {
        if (is_array($user_fetch)) {
            echo "<pre>";
            print_r($user_fetch);
            echo "</pre>";
        } else {
            echo "<pre>";
            echo $user_fetch;
            echo "</pre>";
        }
    }
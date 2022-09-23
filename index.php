<?php
session_start();
define('ROOT', dirname(__FILE__));

$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
define('BASE', $httpProtocol . '://' . $_SERVER['HTTP_HOST'] . '/sites/LanguageExchangeApp');

require("./controller/controller.php");

// TODO: NAME ALL NAVIGATION FUNCTIONS TO VIEW
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

    switch ($action) {
// --------------------------------------------------------------------
// -----------------------PAGE NAVIGATION------------------------------
// --------------------------------------------------------------------
        case "aboutUs":
            aboutUs();
            break;
        case "premium":
            premium();
            break;
        case "signOut":
            // session_destroy();
            // session_unset();
            userSignOut();
            break;
        case "login":
            login();
            break;
        case "profileEdit":
            profileEditPage();
            break;
        case "profileView":
            profileView();
            break;
        case "profileEditView":
            profileEditView();
        case "imageUploaded":
            imageUploaded();
            break;
        case "forgotPassword":
            forgotPassword();
            break;
        case "existingUserCheckFailed":
            usernameEmailCheckFailed();
            break;
        case "changePasswordSuccess":
            changePasswordSuccess();
            break;
        case "changePasswordFailed":
            changePasswordFailed();
            break;
        case "settings":
            settingsPageView();
            break;
// --------------------------------------------------------------------
// -----------------------USER SIGN UP---------------------------------
// --------------------------------------------------------------------
        case "signUp":
            signUp($_REQUEST);
            break;
        case "signUpSuccess":
            signUpSuccess();
            break;
        case "signUpFailed":
            signUpFailed();
            break;
// --------------------------------------------------------------------
// -----------------------USER LOGINS----------------------------------
// --------------------------------------------------------------------
        case "regularLogin":
            regularLogin($_REQUEST);
            break;
        case "loginFailed":
            loginFailed();
            break;
        case "googleLogin":
            // googleLogin($_REQUEST, $_REQUEST['g_csrf_token']);
            googleLogin($_REQUEST);
            break;
        case "kakaoLogin":
            // kakaoLogin($_REQUEST, $_REQUEST['iss']);
            break;
        case "profilePhotoUpload":
            // echo "<pre>";
            // print_r($_FILES['fileToUpload']);
            // print_r($_REQUEST);
            // echo "</pre>";
            imageUpload($_FILES['fileToUpload']);
            break;
        case "usernameEmailCheck":
            usernameEmailCheck($_REQUEST);
            break;
        case "existingUserCheckPassed":
            changePasswordView($_REQUEST);
            break;
        case "changePasswordStatus":
            changePasswordStatus($_REQUEST);
            break;
        default:
            startSplash();
            break;
    }
} catch (Exception $e) { // if we catch an exception
    $error_message = $e->getMessage();
    require("./view/errorView.php");
}
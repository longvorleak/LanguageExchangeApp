<?php
session_start();
define('ROOT', dirname(__FILE__));

$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
define('BASE', $httpProtocol . '://' . $_SERVER['HTTP_HOST'] . '/sites/LanguageExchangeApp');

require("./controller/controller.php");

try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

    switch ($action) {
        case "signUp":
            // echo "<pre>";
            // print_r($_REQUEST);
            // echo "</pre>";
            signUp($_REQUEST);
            break;
        case "regularLogin":
            regularLogin($_REQUEST);
            break;
        case "googleLogin":
            googleLogin($_REQUEST);
            break;
        case "kakaoLogin":
            kakaoLogin($_REQUEST);
            break;
        case "signUpFailed":
            signUpFailed();
            break;
        case "loginFailed":
            loginFailed();
            break;
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
        case "profilePhotoUpload":
            // echo "<pre>";
            // print_r($_FILES['fileToUpload']);
            // echo "</pre>";
            imageUpload($_FILES['fileToUpload']);
            break;
        case "imageUploaded":
            imageUploaded();
            break;
        case "forgotPassword":
            forgotPassword();
            break;
        case "usernameEmailCheck":
            usernameEmailCheck($_REQUEST);
            break;
        case "existingUserCheckPassed":
            changePasswordView($_REQUEST);
            break;
        case "existingUserCheckFailed":
            usernameEmailCheckFailed();
            break;
        case "changePasswordStatus":
            changePasswordStatus($_REQUEST);
            break;
        case "changePasswordSuccess":
            changePasswordSuccess();
            break;
        case "changePasswordFailed":
            changePasswordFailed();
            break;
        default:
            startSplash();
            break;
    }
} catch (Exception $e) { // if we catch an exception
    $error_message = $e->getMessage();
    require("./view/errorView.php");
}
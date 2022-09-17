<?php

define('ROOT', dirname(__FILE__));

$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
define('BASE', $httpProtocol . '://' . $_SERVER['HTTP_HOST'] . '/sites/LanguageExchangeApp');

require("./controller/controller.php");

try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

    switch ($action) {
        case "signUp":
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
            // signUpFailed();
            break;
        case "loginFailed":
        //     loginFailed();
            break;
        case "aboutUs":
            aboutUs();
            break;
        case "premium":
            premium();
            break;
        case "login":
            login();
            break;
        case "signOut":
            userSignOut();
            break;
        default:
            startSplash();
            break;
    }
} catch (Exception $e) { // if we catch an exception
    $error_message = $e->getMessage();
    require("./view/errorView.php");
}
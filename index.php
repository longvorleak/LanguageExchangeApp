<?php

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
            signUpFailed();
            break;
        default:
            startSplash();
            break;
    }
} catch (Exception $e) { // if we catch an exception
    $error_message = $e->getMessage();
    require("./view/errorView.php");
}

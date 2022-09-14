<?php

require("./controller/controller.php");

try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

    switch ($action) {
        case "googleLogin":
            googleLogin($_REQUEST);
            break;
        case "newSignUp":
            newSignUp($_REQUEST);
            break;
        case "emailLogin":
            // do something
            break;
        case "kakaoLogin":
            // do something
            break;
        default:
            startSplash();
            break;
    }
} catch (Exception $e) { // if we catch an exception
    $error_message = $e->getMessage();
    require("./view/errorView.php");
}

<?php

require_once './vendor/autoload.php';

session_start();

// Init configuration
$clientID = '951017262293-gdmf9su3oadstesatbj4ta8ar1gevluf.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/sites/LanguageExchangeApp/loginWelcome.php';

// Create client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Connect to database: language_exchange_app
$hostname = "localhost";
$username = "root";
$password = "";
$database = "language_exchange_app";

$conn = mysqli_connect($hostname, $username, $password, $database);
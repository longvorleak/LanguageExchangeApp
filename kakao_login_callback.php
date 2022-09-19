<?php
    //kakao_login_callback.php
$returnCode = $_GET["code"]; // Get the code to get a token from the server. 
$restAPIKey = "20cc8130c7b43890494d8a7bb1dcf346"; // Enter your REST API KEY 
$callbacURI = urlencode("http://localhost/sites/LanguageExchangeApp/kakao_login_callback""); // Enter your Call Back URL
// API 요청 URL
 $returnUrl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=".$restAPIKey."&redirect_uri=".$callbacURI."&code=".$returnCode;
 
 $isPost = false;
 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $returnUrl);
 curl_setopt($ch, CURLOPT_POST, $isPost);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
 $headers = array();
 $loginResponse = curl_exec ($ch);
 $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 curl_close ($ch);
 
 var_dump($loginResponse); // Kakao API 서버로 부터 받아온 값
$accessToken= json_decode($loginResponse)->access_token; //Access Token만 따로 뺌
echo "<br><br> accessToken : ".$accessToken;

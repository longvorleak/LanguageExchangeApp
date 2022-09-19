<?php
//kakao_login.php
$restAPIKey = "20cc8130c7b43890494d8a7bb1dcf346"; //본인의 REST API KEY를 입력해주세요
$callbacURI = urlencode("http://localhost/sites/LanguageExchangeApp/view/home.php"); //본인의 Call Back URL을 입력해주세요
$kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=$restAPIKey&redirect_uri=$callbacURI&response_type=code";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
</head>

<body>
    <a href="<?= $kakaoLoginUrl ?>">
        카카오톡으로 로그인
    </a>
</body>

</html>
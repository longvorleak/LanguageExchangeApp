<link rel="stylesheet" href=<?= BASE . "/public/css/home.css" ?>>
<!-- <link rel="stylesheet" href=<?="../public/css/home.css" ?>> -->

<script src="https://accounts.google.com/gsi/client" async defer></script>
<!-- <script src="./public/js/test.js" defer></script> -->

<?php $title = "SpeakEasy - Welcome $user_login!" ?>

<?php ob_start();?>
<?php include("side_menuView.php") ?>

<section class="middle-section">

    <div class="middle1">
        <h2>Home</h2>
        <h3>Hello <?= $user_login ?>!</h3>
        <span>
            <a href="#" class="language">language selector</a>
            <ul class="language-popup">
                <li><a href="#">English</a></li>
                <li><a href="#">Korean</a></li>
                <li><a href="#">Spanish</a></li>
                <li><a href="#">Dutch</a></li>
            </ul>
        </span>
    </div>

    <div class="middle2">
        <div class="card">some info</div>
        <div class="card">some info</div>
        <div class="card">some info</div>
    </div>

    <div class="middle3">
        <div>some info</div>
        <div>some info</div>
    </div>

    <!-- blog feed -->
    <div class="middle4">
        blog feed
    </div>

</section>
<?php include("dashboard_right.php")?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>
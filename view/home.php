<link rel="stylesheet" href=<?= BASE . "/public/css/home.css" ?>>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<!-- <?php session_start(); ?> -->
<?php $title = "SpeakEasy - Welcome {$_SESSION['firstname']}!" ?>

<?php ob_start(); ?>
<?php include("side_menuView.php") ?>

<section class="middle-section">

    <div class="middle1">
        <h2>Home</h2>
        <h3>Hello <?= $_SESSION['firstname'] ?>!</h3>
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
<?php include("dashboard_right.php") ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>
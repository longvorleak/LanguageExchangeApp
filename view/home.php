<link rel="stylesheet" href=<?= BASE . "/public/css/home.css" ?>>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<!-- <?php $title = "SpeakEasy - Welcome {$_REQUEST['user']}!" ?> -->
<?php $title = "SpeakEasy - Welcome {$_SESSION['uid']}!" ?>

<?php ob_start(); ?>
<?php include("side_menuView.php") ?>

<section class="middle-section">

    <div class="middle1">
        <h2>Home</h2>
        <!-- <h3>Hello <?= $_REQUEST['user'] ?>!</h3> -->
        <h3>Hello <?= $_SESSION['uid'] ?>!</h3>
        <span>
            <a href="#" class="language" style="color: white;margin-right: 10px;">Language Selector</a>
            <ul class="language-popup">
                <li><a href="#">English</a></li>
                <li><a href="#">Korean</a></li>
                <li><a href="#">Spanish</a></li>
                <li><a href="#">Dutch</a></li>
            </ul>
        </span>
    </div>


</section>
<?php include("dashboard_right.php") ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>
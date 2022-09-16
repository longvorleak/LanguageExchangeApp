<link rel="stylesheet" href=<?= BASE . "/public/css/home.css" ?>>

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
<section class="right-section">
    <div class="right1">
        <h2>schedule</h2>
        <div>
            schedule
        </div>
    </div>
    <div class="right2">
        <p>friends</p>
        <div>
            friends list
        </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>
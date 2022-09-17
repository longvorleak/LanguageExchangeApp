<link rel="stylesheet" href=<?= BASE . "/public/css/home.css" ?>>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<?php $title = "SpeakEasy - Welcome $user_login!" ?>

<?php ob_start(); ?>
<section class="dashboard">
    <h2>Menu</h2>
    <nav role='navigation'>
        <div id="menuToggle">

            <input id="hamburger-checkbox" type="checkbox" />

            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <a href="#">
                    <li><img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" />My Account</li>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-house home-icon"></i>Home</li>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-user-group home-icon"></i>Browse</li>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-graduation-cap home-icon"></i>Learn</li>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-calendar home-icon"></i>Events</li>
                </a>
                <a href="#">
                    <li><i class="fa-solid fa-gear home-icon"></i>Settings</li>
                </a>
                <a href="#">
                    <li>Upgrade</li>
                </a>
                <a href=<?= BASE . "./index.php?action=signOut" ?> class="g_id_signout">
                    <li>Sign out</li>
                </a>
            </ul>
        </div>
    </nav>
</section>
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
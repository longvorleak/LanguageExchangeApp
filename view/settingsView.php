<link rel="stylesheet" href=<?= BASE . "/public/css/settings.css" ?>>
<?php $title = "SpeakEasy - Settings"; ?>

<?php ob_start(); ?>

<body>
    <?php include("side_menuView.php") ?>
    <div id="settings">
        <h1> SETTINGS</h1>
        <ul>
            <li><i class="fa-solid fa-gear home-icon"></i>Account</li>
            <a href=<?= BASE . "/index.php?action=profileEditView" ?>>
                <li><i class="fa-solid fa-user"></i>Profile</li>
            </a>
            <li><i class="fa-solid fa-key"></i>Security</li>
            <li><i class="fa-solid fa-bell"></i>Notifications</li>
            <li><i class="fa-solid fa-image"></i>Appearance</li>
            <li><i class="fa-solid fa-money-bill"></i>Billing</li>
        </ul>
    </div>
</body>

<?php $content = ob_get_clean(); ?>
<?php require("template.php");

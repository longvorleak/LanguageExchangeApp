<link rel="stylesheet" href=<?= BASE . "/public/css/settings.css" ?>>
<?php $title = "SpeakEasy - Settings"; ?>

<?php ob_start(); ?>

<body>
    <?php include("side_menuView.php") ?>
    <?php include("settingsBar.php") ?>
</body>

<?php $content = ob_get_clean(); ?>
<?php require("template.php");

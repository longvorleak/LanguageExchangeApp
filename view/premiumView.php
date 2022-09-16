<link rel="stylesheet" href=<?= BASE . "/public/css/premium.css" ?>>

<?php $title = "SpeakEasy - Premium"; ?>

<?php ob_start(); ?>

<?php include(ROOT . "/view/headerView.php"); ?>

<div>
    <h1>Premium Shit</h1>
</div>

<?php include(ROOT . "/view/footerView.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>
<?php $title = "Welcome $google_login!" ?>

<?php ob_start(); ?>

<div class="container">
    <h1>Welcome <?= $google_login; ?>!</h1>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>
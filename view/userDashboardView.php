<?php $css = "./public/css/style.css"; ?>
<?php $title = "Welcome $user_login!" ?>

<?php ob_start(); ?>

<div class="container">
    <h1>Welcome <?= $user_login; ?>!</h1>
    <a href="index.php">Logout</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>
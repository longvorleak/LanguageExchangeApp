<?php $title = "SpeakEasy - Error!"; ?>

<?php ob_start(); ?>

<div id="error">
    <h2>Error:</h2>
    <h3><?= $error_message ?></h3>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("template.php");

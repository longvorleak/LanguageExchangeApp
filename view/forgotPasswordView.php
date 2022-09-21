<link rel="stylesheet" href=<?= BASE . "/public/css/signUp.css" ?>>

<?php $title = "SpeakEasy - Forgot Password"; ?>

<?php ob_start(); ?>

<div class="form-container sign-in-container" id="sign-in-container">
    <form action=<?= BASE . "/index.php?action=usernameEmailCheck" ?> method="POST" id="signin-form">
        <h2>Check</h2>
        <?php if (isset($_GET['action']) and $_GET['action'] == 'existingUserCheckFailed') {
        ?>
            <p>Invalid. Try again.</p>
        <?php
        } ?>
        <div class="input-field">
            <div class="svg-container start">
                <i class="fa-solid fa-user"></i>
            </div>
            <input type="text" name="usernameCheck" placeholder="Username" />
        </div>
        <div class="input-field">
            <div class="svg-container start">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <input type="text" name="emailCheck" placeholder="Email" />
        </div>
        <input type="submit" class="sign-button" value="Check" />
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("template.php");

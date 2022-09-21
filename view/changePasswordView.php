<link rel="stylesheet" href=<?= BASE . "/public/css/signUp.css" ?>>

<?php $title = "SpeakEasy - Change Password"; ?>

<?php ob_start(); ?>

<div class="form-container sign-in-container" id="sign-in-container">
    <form action=<?= BASE . "/index.php?action=changePasswordStatus" ?> method="POST" id="signin-form">
        <input type="hidden" name="existingUsername" value="<?= $_REQUEST['username'] ?>" />
        <input type="hidden" name="existingEmail" value="<?= $_REQUEST['email'] ?>" />
        <h2>Change Password</h2>
        <div class="input-field" id="su-pwd-parent">
            <div class="svg-container start">
                <i class="fa-solid fa-lock"></i>
            </div>
            <input type="password" name="newPassword" placeholder="New Password" id="su-pwd1" />
            <div class="svg-container check" id="su-pwd-check">
                <i class="fa-solid fa-check" style="color: var(--dark-primary);"></i>
            </div>
            <div class="svg-container eye" id="su-pwd-show">
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>
        </div>

        <div class="input-field">
            <div class="svg-container start">
                <i class="fa-solid fa-lock"></i>
            </div>
            <input type="password" name="newPasswordConfirm" placeholder="Confirm password*" id="su-pwd-confirm" />
            <div class="svg-container eye" id="su-pwd-confirm-show">
                <i class="fa-solid fa-eye" id="togglePasswordRe"></i>
            </div>
        </div>
        <input type="submit" class="sign-button" value="Submit" />
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("template.php");

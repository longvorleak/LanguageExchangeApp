<link rel="stylesheet" href=<?= BASE . "/public/css/signUp.css" ?>>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<?php $title = "SpeakEasy - Login"; ?>

<?php ob_start(); ?>
<!-- <form method="POST" action="../index.php?action=newSignUp"></form> -->

<div class="main" id="main">
    <div class="container">
        <div class="signIn">
            <h1 class="animate-charcter">Sign In</h1>
            <?php
            if (isset($_REQUEST['action']) and $_REQUEST['action'] = 'loginFailed') {
                echo "login page if";
            ?>
                <p>Login Failed. Try again.</p>
            <?php

            }
            
            
            ?>
            <div class="form">
                <div>
                    <div id="g_id_onload" data-client_id="<?= $_SERVER['CLIENT_ID']; ?>" data-login_uri="https://localhost/sites/LanguageExchangeApp/index.php?action=googleLogin" data-auto_prompt="false">
                    </div>
                    <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left">
                    </div>
                </div>
                <form method="POST" action=<?= BASE . "/index.php?action=regularLogin" ?>>
                    <input type="text" name="usernameEmail" id="usernameEmail" placeholder="Email/Username" />
                    <input type="text" name="passwordIn" id="passwordIn" placeholder="Password" />
                    <input type="checkbox" name="rememberCheck" id="rememberCheck" />
                    <label for="rememberCheck">Remember me?</label>
                    <a href="#">Forgot your password?</a>
                    <input type="submit" class="button-17 zoom" value="Sign In" />
                </form>
            </div>
        </div>
        <div class="signUp">
            <h1 class="animate-charcter">Sign Up</h1>
            <div class="form" id="signUp">
                <form method="POST" action=<?= BASE . "/index.php?action=signUp" ?>>
                    <input type="text" name="firstname" id="firstname" placeholder="Firstname" required maxlength="50" />
                    <input type="text" name="lastname" id="lastname" placeholder="Lastname" required maxlength="50" />
                    <input type="text" name="username" id="username" placeholder="Username*" required maxlength="50" />
                    <input type="text" name="email" id="email" placeholder="Email*" required maxlength="255" />
                    <input type="text" name="password" id="password" placeholder="Password*" required maxlength="255" />
                    <span class="error">The password cannot be less then 8 characters</span>
                    <input type="text" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password*" required />
                    <span class="error">Passwords have to match</span>
                    <input type="submit" id="signUp" name="signUp" class="button-17 zoom" value="Sign Up" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <form method="POST" action="../index.php?action=newSignUp"></form> -->

<?php $content = ob_get_clean(); ?>

<?php require("template.php");

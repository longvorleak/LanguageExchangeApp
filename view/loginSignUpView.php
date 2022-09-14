<?php $css = "../public/css/signUp.css"; ?>
<?php $script = "../public/js/script.js"; ?>

<?php $title = "Login"; ?>

<?php ob_start(); ?>

<div>
    <div id="g_id_onload"
        data-client_id="<?= $_SERVER['CLIENT_ID']; ?>"
        data-login_uri="https://localhost/sites/LanguageExchangeApp/index.php?action=googleLogin"
        data-auto_prompt="false">
    </div>
<div class="g_id_signin"
    data-type="standard"
    data-size="large"
    data-theme="outline"
    data-text="sign_in_with"
    data-shape="rectangular"
    data-logo_alignment="left">
    </div>
</div>
<!-- <form method="POST" action="../index.php?action=newSignUp"></form> -->

<div class="main" id="main">
        <div class="container">
            <div class="signIn">
                <h1 class="animate-charcter">Sign In</h1>
                <div class="form">
                    <form method="POST" action="signIn.php">
                        <input type="text" name="usernameIn" id="usernameIn" placeholder="Email/Username" />                   
                        <input type="text" name="passwordIn" id="passwordIn" placeholder="Password" />
                        <input type="checkbox" name="rememberCheck" id="rememberCheck"/>
                        <label for="rememberCheck">Remember me?</label>
                        <a href="#">Forgot your password?</a>
                        <input type="submit" class="button-17 zoom" value="Sign In"/>  
                    </form>
                </div>
            </div>
            <div class="signUp">
                <h1 class="animate-charcter">Sign Up</h1>
                <div class="form" id="signUp">
                    <form method="POST" action="http://localhost/sites/LanguageExchangeApp/index.php?action=signUp"> 
                        <input type="text" name="firstname" id="firstname" placeholder="Firstname"/>
                        <input type="text" name="lastname" id="lastname" placeholder="Lastname"/>
                        <input type="text" name="username" id="username" placeholder="Username*" required/>
                        <input type="text" name="email" id="email" placeholder="Email*" required/>                        
                        <input type="text" name="password" id="password" placeholder="Password*" required/>
                        <span class="error">The password cannot be less then 8 characters</span>
                        <input type="text" name="passwordConfirm" id="passwordConfirm" placeholder="Password confirm*" required />
                        <span class="error">The password confirmation has to be same as the original one</span>                   
                        <input type="submit" id="signUp" name="signUp" class="button-17 zoom" value="Sign Up"/>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/js/script.js"></script>


<?php $content = ob_get_clean(); ?>

<?php require("template.php");
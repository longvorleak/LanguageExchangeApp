<link rel="stylesheet" href=<?= BASE . "/public/css/signUp.css" ?>>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<?php $title = "SpeakEasy - Login"; ?>

<?php ob_start(); ?>
<!-- <form method="POST" action="../index.php?action=newsignUp"></form> -->
<!-- 
<div id="form-container">
    <div class="container">
        <div class="sign-in">
            <h2>Sign In</h2>
            
            <div class="form">
                <form method="POST" action=<?= BASE . "/index.php?action=signUp" ?>>
                    <input type="text" name="usernameEmail"
                    placeholder="Email/Username" />
                    <input type="password" name="passwordIn" placeholder="Password" />
                    <input type="checkbox" 
                    id="remember-check"
                    name="rememberCheck"/>
                    <label for="rememberCheck">Remember me?</label>
                    <a href="#" id="forgot">Forgot your password?</a>
                    <input type="submit" class="form-button" value="Sign In" />
                </form>
                <div class="google-sign-in">
                    <div id="g_id_onload" data-client_id="<?= $_SERVER['CLIENT_ID']; ?>" data-login_uri="https://localhost/sites/LanguageExchangeApp/index.php?action=googleLogin" data-auto_prompt="false">
                    </div>
                    <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left">
                    </div>
                </div>
            </div>
        </div>
        <div class="sign-up">
            <h2>Sign Up</h2>
            <div class="form" id="sign-up">
                <form method="POST" action=<?= BASE . "/index.php?action=signUp" ?>>
                    <input type="text" name="firstname" placeholder="First Name" required maxlength="50" />
                    <input type="text" name="lastname" placeholder="Last Name" required maxlength="50" />
                    <input type="text" name="username" placeholder="Username*" required maxlength="50" />
                    <input type="text" name="email" placeholder="Email*" required maxlength="255" />
                    <input type="password" name="password" placeholder="Password*" required maxlength="255" />
                    <span class="error">The password cannot be less then 8 characters</span>
                    <input type="password" name="passwordConfirm" placeholder="Confirm Password*" required />
                    <span class="error">Passwords have to match</span>
                    <input type="submit" name="signUp" class="form-button" value="Sign Up" />
                </form>
            </div>
        </div>
    </div>
</div>
 -->

<!-- ======================================= -->
<!-- ======================================= -->
<!-- ======================================= -->
<!-- ======================================= -->

<?php
    if (isset($_REQUEST['action']) and $_REQUEST['action'] = 'loginFailed') {
    ?>
        <!-- <p>Login Failed. Try again.</p> -->
<?php
    }
?>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action=<?= BASE . "/index.php?action=signUp" ?> method="POST">
                <h2>Create Account</h2>
                <input type="hidden" name="signup" value="signup">
                <input type="text" name="firstname" placeholder="First name*" required maxlength="50" />
                <input type="text" name="lastname" placeholder="Last name*" required maxlength="50" />
                <input type="text" name="username" placeholder="Username*" required maxlength="50" />
                <input type="password" name="password" placeholder="Password*" required maxlength="255" />
                <input type="password" name="passwordConfirm" placeholder="Confirm password*" required /> <input type="submit" class="sign-button" value="Sign up" />
                <div class="google-sign-up">
                    <div id="g_id_onload" data-client_id="<?= $_SERVER['CLIENT_ID']; ?>" data-login_uri="https://localhost/sites/LanguageExchangeApp/index.php?action=googleLogin" data-auto_prompt="false">
                    </div>
                    <div class="g_id_signup" data-type="standard" data-size="large" data-theme="outline" data-text="sign_up_with" data-shape="pill" data-logo_alignment="left">
                    </div>
                </div>
            </form>
        </div>

        <div class="form-container sign-in-container">  
            <form action=<?= BASE . "/index.php?action=signUp" ?> method="POST">
                <?php if(isset($_GET['account'])){
                    echo "<div>Account created please log in </div>";
                }
                ?>
                <h2>Sign In</h2>
                <input type="hidden" name="signin" value="signin">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <div id="remember">
                    <input type="checkbox" name="auto" id="auto" name="rememberCheck">
                    <span>remember me ?</span>
                </div>
                <a href="#">Forgot your password?</a>
                <input type="submit" class="sign-button" value="Sign In" />
                <div class="google-sign-in">
                    <div id="g_id_onload" data-client_id="<?= $_SERVER['CLIENT_ID']; ?>" data-login_uri="https://localhost/sites/LanguageExchangeApp/index.php?action=googleLogin" data-auto_prompt="false">
                    </div>
                    <div class="g_id_signin" data-type="icon" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="pill" data-logo_alignment="left">
                    </div>
                </div>
            </form>
    </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2>Welcome Back!</h2>
                    <p>Already have an account ? Sign in to start chatting with friends from all over the world</p>
                    <input type="submit" class="sign-button"
                    id="sign-in" value="Sign In" />
                </div>
                <div class="overlay-panel overlay-right">
                    <h2>Hello</h2>
                    <p>Join the fun! Sign up today.</p>
                    <input type="submit" class="sign-button" id="sign-up"
                    value="Sign Up" />
                </div>
            </div>
        </div>
    </div>
<!-- <form method="POST" action="../index.php?action=newsignUp"></form> -->

<?php $content = ob_get_clean(); ?>

<?php require("template.php");?>

<script>
    const signUpButton = document.getElementById('sign-up');
    const signInButton = document.getElementById('sign-in');
    const container = document.getElementById('container');
    if(signInButton && signInButton && container){
        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    }


    function refreshMessages(nbMsg = 10, showMore=false) {
        let xhr = new XMLHttpRequest();
        let url = "loadMsg.php?nbMsg="+nbMsg;
        if (showMore) {
            url = "loadMsg.php?showMore=true";
        }
        xhr.open("GET", url);
        xhr.onload = function () {
            if(xhr.status == 200) {
                let div = document.querySelector("#messageBox");
                div.innerHTML = xhr.responseText;
            }
        }
        xhr.send(null);
    }

    let inputs = document.querySelectorAll("input[name=range]");
    if(inputs.length>0){
        for(let i=0; i<inputs.length; i++) {
            let input = inputs[i];
            input.addEventListener("click", function(e) {
                refreshMessages(e.target.value);
            });
        }
    }
</script>



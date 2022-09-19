<link rel="stylesheet" href=<?= BASE . "/public/css/signUp.css" ?>>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<?php $title = "SpeakEasy - Login"; ?>

<?php ob_start(); ?>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <h2>Create Account</h2>
            <?php if (isset($_GET['action']) AND $_GET['action'] == 'signUpFailed') {
                if (isset($_GET['reason'])) {
                    $message = $_GET['reason'];
                    $reason = $_GET['reason'];
                    switch ($reason) {
                        case "emptyFields":
                            $message = "Please fill out all required fields.";
                            break;
                        case "usernameEmail":
                            $message = "Please choose a different username and email.";
                            break;
                        case "email":
                            $message = "Please choose a different email.";
                            break;
                        case "username":
                            $message = "Please choose a different username.";
                            break;
                        default:
                            break;
                    } ?>
                    <p><?= $message ?></p>
            <?php
                }
            } ?>
            <form action=<?= BASE . "/index.php?action=signUp" ?> method="POST">
                <div class="google-sign-up">
                    <div id="g_id_onload" data-client_id="<?= $_SERVER['CLIENT_ID']; ?>" data-login_uri="https://localhost/sites/LanguageExchangeApp/index.php?action=googleLogin" data-auto_prompt="false">
                    </div>
                    <div class="g_id_signup" data-type="standard" data-size="large" data-theme="outline" data-text="sign_up_with" data-shape="pill" data-logo_alignment="left">
                    </div>
                </div>
                <input type="text" name="username" placeholder="Username*" required maxlength="50" id="username-signup"/>
                <input type="text" name="email" placeholder="Email*" required maxlength="255" />
                <input type="text" name="dob" placeholder="Date of birth*" onfocus="(this.type='date')" required />
                <input type="password" name="password" placeholder="Password*" required maxlength="255" />
                <div id="tooltip">
                    <div class="arrow-left"></div>
                    <p class="tooltiptext">Password must:</p>
                    <ul style="list-style: none";>
                        <li class="tooltiptext">• Have at least 8 characters</li>
                        <li class="tooltiptext">• Contain a number</li>
                        <li class="tooltiptext">• Contain a capital letter</li>
                    </ul>
                </div> 
                <input type="password" name="passwordConfirm" placeholder="Confirm password*" required /> <input type="submit" class="sign-button" value="Sign up" />
            </form>
        </div>

        <div class="form-container sign-in-container">  
            <h2>Sign In</h2>
                <?php if(isset($_GET['account'])){
                    echo "<div>Account created please log in </div>";
                }
                if (isset($_GET['action']) and $_GET['action'] == 'loginFailed') {
                ?>
                <p>Login Failed. Please try again.</p>
            <?php
            } ?>
            <form action=<?= BASE . "/index.php?action=signUp" ?> method="POST">
                <input type="text" name="emailUsername" placeholder="Username/Email" />
                <input type="password" name="password" placeholder="Password" />
                <div id="remember">
                    <input type="checkbox" name="auto" id="auto" name="rememberCheck">
                    <span class="remember">remember me ?</span>
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


<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>

<script>

// animation to switch between sign up and sign in
    const signUpButton = document.getElementById('sign-up');
    const signInButton = document.getElementById('sign-in');
    const container = document.getElementById('container');
    if (signInButton && signInButton && container) {
        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    }

    function refreshMessages(nbMsg = 10, showMore=false) {
        let xhr = new XMLHttpRequest();
        let url = "loadMsg.php?nbMsg=" + nbMsg;
        if (showMore) {
            url = "loadMsg.php?showMore=true";
        }
        xhr.open("GET", url);
        xhr.onload = function() {
            if (xhr.status == 200) {
                let div = document.querySelector("#messageBox");
                div.innerHTML = xhr.responseText;
            }
        }
        xhr.send(null);
    }

    let inputFields = document.querySelectorAll("input[name=range]");
    if(inputFields.length>0){
        for(let i=0; i<inputFields.length; i++) {
            let input = inputFields[i];
            input.addEventListener("click", function(e) {
                refreshMessages(e.target.value);
            });
        }
    }

</script>



<link rel="stylesheet" href=<?= BASE . "/public/css/signUp.css" ?>>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<?php $title = "SpeakEasy - Login"; ?>

<?php ob_start(); ?>

  <div class="container" id="container">
    <div class="form-container sign-up-container" id="sign-up-container">
    <form 
    action=<?= BASE . "/index.php?action=signUp" ?> method="POST" 
    id="sign-up-form">
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
                    <!-- <p><?= $message ?></p> -->
            <?php
                }
            } ?>
            
            <div class="error-msg-su" id="error-user"></div>
            <div class="error-msg-su" id="error-mail"></div>
            <div class="error-msg-su" id="error-dob"></div>
            <div class="error-msg-su" id="error-pwd1"></div>
            <div class="error-msg-su" id="error-pwd2"></div>
            
            <div class="input-field">
                <div class="svg-container start">
                    <i class="fa-solid fa-user"></i>
                </div>
                <input type="text"
                name="username"
                placeholder="Username*"
                id="su-name"
                maxlength="50" />
                <div class="svg-container check" id="su-name-check">
                    <i class="fa-solid fa-check" style="color: var(--dark-primary);"></i>
                </div>
            </div>
        
            <div class="input-field">
                <div class="svg-container start">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <input type="text"
                name="email"
                placeholder="E-mail*"
                id="su-mail" 
                maxlength="255" />
                <div class="svg-container check" id="su-mail-check">
                    <i class="fa-solid fa-check" style="color: var(--dark-primary);"></i>
                </div>
            </div>

            <div class="input-field">
                <div class="svg-container start">
                    <i class="fa-solid fa-cake-candles"></i>
                </div>
                <input type="text"
                name="dob"
                placeholder="Date of birth*"
                d="su-dob" 
                onfocus="(this.type='date')"
                min="1900-01-01"
                max="2222-12-31"  />
                <div class="svg-container check" id="su-dob-check">
                    <i class="fa-solid fa-check" style="color: var(--dark-primary);"></i>
                </div>
            </div>

            <div class="input-field" id="su-pwd-parent">
                <div class="svg-container start">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input type="password" 
                name="password" 
                placeholder="Password" 
                id="su-pwd1" />
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
            <input 
            type="password" 
            name="passwordConfirm" 
            placeholder="Confirm password*" 
            id="su-pwd-confirm" />
            <div class="svg-container eye" id="su-pwd-confirm-show">
                <i class="fa-solid fa-eye" id="togglePasswordRe"></i>
            </div>
            </div>
            <div class="error-msg-su" id="error-pwd2">Password must match</div>

    
            <input type="submit" class="sign-button" value="Sign up" id="sign-up-btn" />
            <a id="mobile-in">Sign In <i class="fa-solid fa-arrow-right" style="color: var(--dark-primary);"></i></a>
        </form>
        </div>
        <div class="form-container sign-in-container" id="sign-in-container">
            <form 
            action=<?= BASE . "/index.php?action=signUp" ?> method="POST"
            id="signin-form">
            <h2>Sign in</h2>
            <?php if(isset($_GET['account'])){
                            echo "<div>Account created please log in </div>";
                        }
                        if (isset($_GET['action']) and $_GET['action'] == 'loginFailed') {
                        ?>
                        <p>Login Failed. Please try again.</p>
                    <?php
                    } ?>
            <div class="google-sign-in">
                <div id="g_id_onload" data-client_id="<?= $_SERVER['CLIENT_ID']; ?>" data-login_uri="https://localhost/sites/LanguageExchangeApp/index.php?action=googleLogin" data-auto_prompt="false">
                </div>
                <div class="g_id_signin" data-type="icon" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="pill" data-logo_alignment="left">
                </div>
            </div>
            <div class="input-field">
            <div class="svg-container start">
                <i class="fa-solid fa-user"></i>
            </div>
            <input type="email" name="emailUsername"  placeholder="Username/E-mail" />
            </div>
            <div class="input-field">
            <div class="svg-container start">
                <i class="fa-solid fa-lock"></i>
            </div>
            <input 
            type="password" name="password" placeholder="Password" />
            </div>
            <div class="error-msg-si">
                <i class="fa-solid fa-circle-xmark"></i>
                This is a error message.
            </div>

            <div id="remember">
                <input 
                type="checkbox" name="auto" 
                id="auto" name="rememberCheck">
                <label 
                class="remember" for="auto">Remember me?</label>
            </div>

            <a href="#">Forgot your password?</a>

            <input 
            type="submit" class="sign-button" value="Sign In" />
            <a id="mobile-up">Sign Up <i class="fa-solid fa-arrow-right" style="color: var(--dark-primary);"></i></a>
        </form>
        </div>
        <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
            <h2>Welcome Back!</h2>
            <p>Already have an account? Sign in to start chatting with friends from all over the world</p>
            <button class="ghost" id="sign-in">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
            <h2>Hello</h2>
            <p>Sign up today and start your journey with us</p>
            <button class="ghost" id="sign-up">Sign Up</button>
            </div>
        </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>

<script>
/* Sliding Animation Web */

const signUpButton = document.getElementById("sign-up");
const signInButton = document.getElementById("sign-in");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

/* Sliding Animation Mobile */

const signUpSlide = document.getElementById("mobile-up");
const signInSlide = document.getElementById("mobile-in");
const signUpContainer = document.getElementById("sign-up-container");
const signInContainer = document.getElementById("sign-in-container");

signUpSlide.addEventListener("click", () => {
  signUpContainer.style.opacity = 1;
  signUpContainer.style.zIndex = 5;
  signInContainer.style.opacity = 0;
  signInContainer.style.zIndex = 2;
});

signInSlide.addEventListener("click", () => {
  signInContainer.style.opacity = 1;
  signInContainer.style.zIndex = 5;
  signUpContainer.style.opacity = 0;
  signUpContainer.style.zIndex = 2;
});

// Toggle to show password 
const togglePassword = document.getElementById("su-pwd-show");
const pwdToggle = document.querySelector(".input-field i#togglePassword");
const su_pwd_inp = document.getElementById("su-pwd1");
togglePassword.addEventListener("click", () => {
  if (pwdToggle.classList.contains("fa-eye")) {
    pwdToggle.classList.remove("fa-eye");
    pwdToggle.classList.add("fa-eye-slash");
  } else {
    pwdToggle.classList.remove("fa-eye-slash");
    pwdToggle.classList.add("fa-eye");
  }
  const type =
    su_pwd_inp.getAttribute("type") === "password" ? "text" : "password";
  su_pwd_inp.setAttribute("type", type);
  togglePassword.innerHTML = "";
  togglePassword.appendChild(pwdToggle);
});

const togglePasswordRe = document.getElementById("su-pwd-confirm-show");
const pwd2Toggle = document.querySelector(".input-field i#togglePasswordRe");
const su_pwd_re_inp = document.getElementById("su-pwd-confirm");
togglePasswordRe.addEventListener("click", () => {
  if (pwd2Toggle.classList.contains("fa-eye")) {
    pwd2Toggle.classList.remove("fa-eye");
    pwd2Toggle.classList.add("fa-eye-slash");
  } else {
    pwd2Toggle.classList.remove("fa-eye-slash");
    pwd2Toggle.classList.add("fa-eye");
  }
  const typere =
    su_pwd_re_inp.getAttribute("type") === "password" ? "text" : "password";
  su_pwd_re_inp.setAttribute("type", typere);
  togglePasswordRe.innerHTML = "";
  togglePasswordRe.appendChild(pwd2Toggle);
});

// ==== Regex ====
var regName = /^[a-zA-Z0-9]{4,}/;
var regMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var regDate = /^\d{4}-\d{2}-\d{2}$/;
var regPwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/;

// === Validate Username ===

let user = document.getElementById('su-name');
let check_user = document.getElementById('su-name-check');
let error_user = document.getElementById('error-user');

function checkUser() {
    if ( regName.test(user.value) ){ 
        check_user.style.display = "inline";
        error_user.style.display = "none";
        return true;
    } else {
        check_user.style.display = "none";
        error_user.innerHTML =
      "<i class='fa fa-times-circle' style='color: var(--accent-color);'></i> Username can't be less than 4 characters";
      error_user.style.display = "block";
        return false;
    }
};

// === Validate E-mail ===

let mail = document.getElementById('su-mail');
let check_mail = document.getElementById('su-mail-check');
let error_mail = document.getElementById('error-mail');

function checkMail() {
    if ( regMail.test(mail.value) ){ 
        check_mail.style.display = "inline";
        error_mail.style.display = "none";
        return true;
    } else {
        check_mail.style.display = "none";
        error_mail.innerHTML =
      "<i class='fa fa-times-circle' style='color: var(--accent-color);'></i> Please enter a valid Email Address";
      error_mail.style.display = "block";
        return false;
    }
};

// === validate DOB ===
// let dob = document.getElementById('su-dob');
// let check_dob = document.getElementById('su-dob-check');
// let error_dob = document.getElementById('error-dob');

//  //Check whether valid date format
//  function checkDate() {
//  if (regDate.test(dob)) {
//             var parts = dateString.split("/");
//             var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
//             var dtCurrent = new Date();
//             error_dob.innerHTML = "Eligibility 18 years ONLY."
//             if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
//                 return false;
//             }
 
//             if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 18) {
 
//                 //CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
//                 if (dtCurrent.getMonth() < dtDOB.getMonth()) {
//                     return false;
//                 }
//                 if (dtCurrent.getMonth() == dtDOB.getMonth()) {
//                     //CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
//                     if (dtCurrent.getDate() < dtDOB.getDate()) {
//                         return false;
//                     }
//                 }
//             }
//             error_dob.innerHTML = "";
//             return true;
//         } else {
//             error_dob.innerHTML = "Enter date in dd/MM/yyyy format ONLY."
//             return false;
//         }
//  }

// === Validate Password ===

let pwd1 = document.getElementById('su-pwd1');
let pwd2 = document.getElementById('su-pwd-confirm');
let error_pwd1 = document.getElementById('error-pwd1');
let error_pwd2 = document.getElementById('error-pwd2');

function checkPwd1() {
    if (regPwd.test(pwd1.value) ) { 
        error_pwd1.style.display = "none";
        return true;
    } else {
        error_pwd1.innerHTML =
      "<i class='fa fa-times-circle' style='color: var(--accent-color);'></i> Password must:<ul><li>Have at least 8 characters</li><li>Contain at least 1 number</li><li >Contain at least 1 upper character</li><li>Contain at least 1 lowercase character</li><li>Contain at least 1 special character</li></ul>";
      error_pwd1.style.display = "block";
        return false;
    }
};

function checkPwd2() {
    if ( pwd1.value == pwd2.value ){ 
        error_pwd2.style.display = "none";
        return true;
    } else {
        error_pwd2.innerHTML =
        "<i class='fa fa-times-circle' style='color: var(--accent-color);'></i> Please match with the above password";
        error_pwd2.style.display = "block";
        return false;
    }
};

// === Event listeners on Key up ===
user.addEventListener('keyup', checkUser);
mail.addEventListener('keyup', checkMail);
// date.addEventListener('keyup', checkDOD);
pwd1.addEventListener('keyup', checkPwd1);
pwd2.addEventListener('keyup', checkPwd2);

// ==== Submit =====

const su_form = document.getElementById('sign-up-form');

su_form.addEventListener("submit", function(e){
    if (
        checkUser(true),
        checkMail(true),
        // checkDOB(true),
        checkPwd1(true),
        checkPwd2(true)
    ) {
        su_form.submit();
    } else {
        e.preventDefault()
    }
  });

</script>
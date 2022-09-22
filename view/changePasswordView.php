<link rel="stylesheet" href=<?= BASE . "/public/css/signUp.css" ?>>

<?php $title = "SpeakEasy - Change Password"; ?>

<?php ob_start(); ?>

<div class="container">
    <div class="form-container">
        <form action=<?= BASE . "/index.php?action=changePasswordStatus" ?> method="POST" id="pwd-change-form">

            <input type="hidden" name="existingUsername" value="<?= $_REQUEST['username'] ?>" />
            <input type="hidden" name="existingEmail" value="<?= $_REQUEST['email'] ?>" />
            <h2>Change Password</h2>

            <div class="error-msg" id="error-pwdreset1"></div>
            <div class="error-msg" id="error-pwdreset2"></div>

            <div class="input-field">
                <div class="svg-container start">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input type="password" 
                    name="newPassword" 
                    placeholder="New password*" 
                    id="change-pwd1" />
                <div class="svg-container check" id="change-pwd1-check">
                    <i class="fa-solid fa-check" style="color: var(--dark-primary);"></i>
                </div>
                <div class="svg-container eye" id="change-pwd1-show">
                    <i class="fa-solid fa-eye" id="toggle"></i>
                </div>
            </div>

            <div class="input-field">
                <div class="svg-container start">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input 
                    type="password"
                    name="newPasswordConfirm" 
                    placeholder="Confirm password*" 
                    id="change-pwd2" />
                <div class="svg-container eye" id="change-pwd2-show">
                    <i class="fa-solid fa-eye" id="toggleRe"></i>
                </div>
            </div>

            <input type="submit" class="sign-button" value="Submit" />
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            
            <!-- <img src="./public/images/pwd.png" alt="password-reset" id="pwd-change-img"> -->
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("template.php"); ?>

<script>

// Toggle to show password 
const toggle = document.getElementById("change-pwd1-show");
const pwdToggle = document.querySelector(".input-field i#toggle");
const change_pwd_inp = document.getElementById("change-pwd1");
toggle.addEventListener("click", () => {
  if (pwdToggle.classList.contains("fa-eye")) {
    pwdToggle.classList.remove("fa-eye");
    pwdToggle.classList.add("fa-eye-slash");
  } else {
    pwdToggle.classList.remove("fa-eye-slash");
    pwdToggle.classList.add("fa-eye");
  }
  const type =
    change_pwd_inp.getAttribute("type") === "password" ? "text" : "password";
  change_pwd_inp.setAttribute("type", type);
  toggle.innerHTML = "";
  toggle.appendChild(pwdToggle);
});

const toggleRe = document.getElementById("change-pwd2-show");
const pwd2Toggle = document.querySelector(".input-field i#toggleRe");
const change_pwdre_inp = document.getElementById("change-pwd2");
toggleRe.addEventListener("click", () => {
  if (pwd2Toggle.classList.contains("fa-eye")) {
    pwd2Toggle.classList.remove("fa-eye");
    pwd2Toggle.classList.add("fa-eye-slash");
  } else {
    pwd2Toggle.classList.remove("fa-eye-slash");
    pwd2Toggle.classList.add("fa-eye");
  }
  const typere =
    change_pwdre_inp.getAttribute("type") === "password" ? "text" : "password";
  change_pwdre_inp.setAttribute("type", typere);
  toggleRe.innerHTML = "";
  toggleRe.appendChild(pwd2Toggle);
});

// === Validate Password ===
var regPwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/;

let pwd1 = document.getElementById('change-pwd1');
let pwd2 = document.getElementById('change-pwd2');
let error_pwd1 = document.getElementById('error-pwdreset1');
let error_pwd2 = document.getElementById('error-pwdreset2');

function checkPwd1() {
    if (regPwd.test(pwd1.value) ) { 
        error_pwd1.style.display = "none";
        return true;
    } else {
        error_pwd1.innerHTML =
      "<i class='fa fa-times-circle' style='color: var(--accent-color);'></i> Password must:<ul><li>Have at least 8 characters</li><li>Contain at least 1 number</li><li >Contain at least 1 uppercase</li><li>Contain at least 1 lowercase </li><li>Contain at least 1 special character</li></ul>";
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
pwd1.addEventListener('keyup', checkPwd1);
pwd2.addEventListener('keyup', checkPwd2);

// ==== Submit =====

const pwd_change = document.getElementById('pwd-change-form');

pwd_change.addEventListener("submit", function(e){
    if (
        checkPwd1(true),
        checkPwd2(true)
    ) {
        // su_form.submit();
    } else {
        e.preventDefault()
    }
  });

// </script>

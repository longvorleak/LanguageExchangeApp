<link rel="stylesheet" href="../public/css/passwordReset.css">
<script src="https://kit.fontawesome.com/ed779ab57c.js" crossorigin="anonymous"></script>


  <div class="container" id="container">
    <div class="form-container sign-up-container" id="sign-up-container">
        <img src="../public/images/pwd.png" alt="password">
       
    </div>
        <div class="form-container sign-in-container" id="sign-in-container">
            <form 
            action="#"
            method="POST"
            id="signin-form">
            <h2>Forgot your password?</h2>
            <div class="input-field">
            <div class="svg-container start">
                <i class="fa-solid fa-user"></i>
            </div>
            <input type="text" name=""  placeholder="Username" />
            </div>
            <div class="input-field">
            <div class="svg-container start">
                <i class="fa-solid fa-lock"></i>
            </div>
            <input 
            type="text" name="" placeholder="E-mail" />
            </div>
        
            <input 
            type="submit" class="sign-button" value="Sign In" />
            <a id="mobile-up">Sign Up <i class="fa-solid fa-arrow-right" style="color: var(--dark-primary);"></i></a>

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
        </form>
        </div>
    </div>
<script>


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
user.addEventListener('keyup', checkUser);
mail.addEventListener('keyup', checkMail);
pwd1.addEventListener('keyup', checkPwd1);
pwd2.addEventListener('keyup', checkPwd2);

// ==== Submit =====

const su_form = document.getElementById('sign-up-form');

su_form.addEventListener("submit", function(e){
    console.log(e.target);
    // e.preventDefault();
    const params = new URLSearchParams(window.location.search)

    for (const param of params) {
        console.log(param)
    }
    if (
        checkUser(true),
        checkMail(true),
        checkPwd1(true),
        checkPwd2(true)
    ) {
        // su_form.submit();
    } else {
        e.preventDefault()
    }
  });

</script>
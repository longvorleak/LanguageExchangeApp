let password = document.getElementById('password');
password.addEventListener("keyup", checkPassword);
let passConfirm = document.querySelector('#passwordConfirm');
passConfirm.addEventListener('keyup',checkPassConfirm);

const checkPassword = () => {
    let myRegex = /^[a-z0-9_\-!+*.]{8,}$/i;
    if(myRegex.test(password.value)){
            password.className = 'green';
            password.nextElementSibling.style.display = 'none';
            return true;
            // passConfirm.removeEventListener('keyup',checkPassConfirm);
        }else{
            password.className = 'red';
            password.nextElementSibling.style.display = 'inline';
        }
}

const checkPassConfirm = () => {
    let value1 = password.value;
    let value2 = passConfirm.value;
    if (value1 === value2 && value1 != '' && value2 != '') {
        passConfirm.className = 'green';
        passConfirm.nextElementSibling.style.display = 'none';
        return true;
        // passConfirm.removeEventListener('keyup',checkPassConfirm);
    }else{
        passConfirm.className = 'red';
        passConfirm.nextElementSibling.style.display = 'inline';
    }
}




let myForm = document.getElementById('signUp');
myForm.addEventListener('submit', function(e){
    checkPassword();
    checkPassConfirm();
    let result =
    checkPassword() &&
    checkPassConfirm();
    if(result){
        document.querySelector('.signUp').style.backgroundColor = 'pink';
        // document.getElementById('usernameIn').value = $_SESSION['login'];
        }else {
            e.preventDefault();
        }
});

// let logout = document.getElementById('sign-out');
// console.log(logout);

// logout.addEventListener("click", () => {
//     google.accounts.id.revoke('user@google.com', done => {
//         console.log('consent revoked');
//       });
// })

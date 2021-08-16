var btn = document.getElementById("btn");
var login = document.querySelector('.loginBtn');
var register = document.querySelector('.registerBtn');
var loginContent = document.getElementById('login');
var registerContent = document.getElementById('register');

registerContent.classList.add('hide');

function loginBtn() {
    login.addEventListener('click', () => {
        registerContent.classList.add('hide');
        loginContent.classList.remove('hide');
    })
    btn.style.left = "110px";
}

function registerBtn() {
    register.addEventListener('click', () => {
        loginContent.classList.add('hide');
        registerContent.classList.remove('hide');
    })
    btn.style.left = "0px";
}

loginBtn();
registerBtn();
 

/*display:flex
just.c space Beetwen */
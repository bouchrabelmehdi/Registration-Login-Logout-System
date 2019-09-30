var password = document.getElementById('password');
var eye = document.getElementById('eye');
eye.addEventListener('click',togglePass);
function togglePass(){
eye.classList.toggle('active');
(password.type == 'password') ? password.type = 'text' :
password.type = 'password';
}

var password2 = document.getElementById('password2');
var eye2 = document.getElementById('eye2');
eye2.addEventListener('click',togglePass2);
function togglePass2(){
eye2.classList.toggle('active');
(password2.type == 'password') ? password2.type = 'text' :
password2.type = 'password';
}
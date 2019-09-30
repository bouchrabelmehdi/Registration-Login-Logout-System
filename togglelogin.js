var password = document.getElementById('pass');
var eye3 = document.getElementById('eye3');
eye3.addEventListener('click',togglePass);
function togglePass(){
eye3.classList.toggle('active');
(password.type == 'password') ? password.type = 'text' :
password.type = 'password';
}
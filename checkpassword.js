function checkpassword(){
	if(document.getElementById('password').value !== document.getElementById('password2').value){
        document.getElementById('incorrectpass').innerHTML = "*Not matching";
	}
	else if(document.getElementById('password').value == document.getElementById('password2').value){
        document.getElementById('incorrectpass').innerHTML = "";
	}
}
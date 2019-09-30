function checkregistrationfields(){
			
	if (document.getElementById('name').value == ""){
	alert('Name required');
	return false;
	}
			
	var name = document.getElementById('name');
	var checkname = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
	if (!checkname.test(name.value)){
	alert('Enter a valid name');
	return false;
	}
			
	if (document.getElementById('email').value == ""){
	alert('Email required');
	return false;
	}
			
	var email = document.getElementById('email');
	var checkemail = /^([^.@\s]+)(\.[^.@\s]+)*@([^.@\s]+\.)+([^.@\s]+)$/;
	if (!checkemail.test(email.value)){
	alert('Enter a valid email address');
	return false;
	}
			
	if (document.getElementById('username').value == ""){
	alert('Username required');
	return false;
	}

	var username = document.getElementById('username');
	var checkusername = /^[^ ]+$/;
	if (!checkusername.test(username.value)){
	alert('Spaces are not allowed');
	return false;
	}
			
	if (document.getElementById('password').value == ""){
	alert('Password required');
	return false;
	}

	var password1 = document.getElementById('password');
	var checkpassword = /^(?!.*\s).{8,}$/;
	if (!checkpassword.test(password1.value)){
	alert('At least 8 characters. No spaces');
	return false;
	}
			
	if (document.getElementById('password2').value == ""){
	alert('Confirm password');
	return false;
	}

	var password2 = document.getElementById('password2');
	var checkpassword2 = /^(?!.*\s).{8,}$/;
	if (!checkpassword2.test(password2.value)){
	alert('At least 8 characters. No spaces');
	return false;
	}
}
		
var conf = "OK";

if(document.getElementById){
	window.alert = function(txt){
		createCustomAlert(txt);
	}
}

function createCustomAlert(txt){
	doc = document;

	if(doc.getElementById("body")) return;

	mObj = doc.getElementsByTagName("body")[0].appendChild(doc.createElement("div"));
	mObj.id = "body";
	
	alertObj = mObj.appendChild(doc.createElement("div"));
	alertObj.id = "safarialert";

	msg = alertObj.appendChild(doc.createElement("p"));
	msg.innerHTML = txt;

	btn = alertObj.appendChild(doc.createElement("a"));
	btn.id = "safariclose";
	btn.appendChild(doc.createTextNode(conf));
	btn.href = "#";
	btn.focus();
	btn.onclick = function(){ 
	removeCustomAlert();return false;
	}
}

function removeCustomAlert(){
	document.getElementsByTagName("body")[0].removeChild(document.getElementById("body"));
}
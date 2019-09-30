function checkloginfields(){
	
	if (document.getElementById('user').value == ""){
	alert('Username required');
	return false;
	}

	if (document.getElementById('pass').value == ""){
	alert('Password required');
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
function validarCorreo(){
	
	var email1 = document.getElementById("emailTextBox"); 
	var email2 = document.getElementById("emailTextBoxConfirm");
	var emailInfo = document.getElementById("emailInfo");	
	
	if(email1.value == email2.value){
		emailInfo.innerHTML = " <span> ✔ Los Correos electronicos coinciden :).</span>";
		return true;
	} 
	else{
		emailInfo.innerHTML = "<span style=\"color: #C00;\"> Los Correos Electronicos no coinciden. </span>";
		return false;
	}
}

function validarPwd(){

	var pwd1 = document.getElementById("pwdTextBox");
	var pwd2 = document.getElementById("pwdTextBoxConfirm");
	var pwdInfo = document.getElementById("passInfo");

	if(pwd1.value == pwd2.value){
		pwdInfo.innerHTML = "<span> ✔ las claves coinciden :).</span>";
		return true;
	} 
	else{
		pwdInfo.innerHTML = "<span style=\"color: #C00;\"> Las claves no coinciden :(. <span>";
		return false;
	}

}

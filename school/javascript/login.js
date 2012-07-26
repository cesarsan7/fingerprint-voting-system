function login_validation(){
	with(document.log_form){
		valid=true;
		if(uname.value == "" && pwd.value == ""){
			valid=false;
			alert("Enter Username and Password");
			uname.focus();
		}else if(uname.value == "" && pwd.value != ""){
			valid=false;
			alert("Enter Username");
			uname.focus();
		}else if(uname.value != "" && pwd.value == ""){
			valid=false;
			alert("Enter Password");
			pwd.focus();
		}
		return valid;
	}
}
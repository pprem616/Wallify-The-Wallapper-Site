function validate()
{
	var num = /^[7-9]\d{9}$/;
	var email= /^([a-z A-Z 0-9\.-]+)@([a-z A-Z 0-9 -]+).([a-z]{2,10})$/;
	var phnum = document.getElementById("phnum");
	var uname = document.getElementById("uname");
	var pass=document.getElementById("upass");
	var cpass=document.getElementById("cpass");
	var emailid=document.getElementById("emailid");
	var check=document.getElementById("check");
	var uerror=document.getElementById("uerror");
	var perror=document.getElementById("perror");
	var cperror=document.getElementById("cperror");
	var pherror=document.getElementById("pherror");
	var eerror=document.getElementById("eerror");
	uname.addEventListener("blur",nameVerify, true);
	pass.addEventListener("blur",passVerify, true);
	cpass.addEventListener("blur",cpassVerify,true);
	phnum.addEventListener("blur",phVerify,true);
	emailid.addEventListener("blur",emailVerify,true);
	if(uname.value.trim() == "")
	{
		uerror.textContent ="Invalid Username";
		uname.focus();
		return false;
	}
	else if(!(num.test(phnum.value)) || phnum.value == "")
	{
		pherror.textContent = "Invalid Phone number"
		pherror.focus();
		return false;
	}
	else if(!(email.test(emailid.value)) || emailid.value == "")
	{
		eerror.textContent = "Invalid E-mail ID"
		eerror.focus();
		return false;
	}
	else if(pass.value == "")
	{
		perror.textContent ="Password can not be empty";
		perror.focus();
		return false;
	}
	else if(pass.value.length <8)
	{
		perror.textContent ="Length of Password must be > 8";
		perror.focus();
		return false;
	}
	else if(pass.value.length > 15)
	{
		perror.textContent ="Length of Password must be < 15";
		perror.focus();
		return false;
	}
	else if(pass.value != cpass.value)
	{
		cperror.textContent ="Password does not match";
		cperror.focus();
		return false;
	}
	else
	{
		return true;
	}

	function nameVerify()
	{
		if(uname.value !="")
		{
			uerror.innerHTML="";
			return true;
		}
	}
	function passVerify()
	{
		if(pass.value !="")
		{
			perror.innerHTML="";
			return true;
		}
	}
	function cpassVerify()
	{
		if(cpass.value == upass.value)
		{
			cperror.innerHTML="";
			return true;
		}
	}
	function phVerify()
	{
		if(num.test(phnum.value))
		{
			pherror.innerHTML="";
			return true;
		}
	}
	function emailVerify()
	{
		if(email.test(emailid.value))
		{
			eerror.innerHTML="";
			return true;
		}
	}

}


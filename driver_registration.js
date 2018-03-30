$("document").ready(function(){
	
	$("#mobile").blur(function(){
		var val = mobile.value
		if (/^\d{10}$/.test(val)) {
		// value is ok, use it
			if(val >= 7201001000 && val <= 9999999999){
			//do nothing
			}else{
			
			document.getElementById("mobilemsg_area").innerHTML = "Invalid mobile number.";
			
			}
		} else {
			document.getElementById("mobilemsg_area").innerHTML = "Mobile number should be 10 digits.";
			return false
		}
	});
	
	$("#email").blur(function(){
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(email.value) == false) 
        {
            document.getElementById("emailmsg_area").innerHTML = "Invalid email address.";
            return false;
        }

        return true;
	});
	
	$("#pwd2").blur(function(){

		if(pwd.value != pwd2.value){
				document.getElementById("password2msg_area").innerHTML = "Passwords don't match!";
		}else{
				document.getElementById("password2msg_area").innerHTML = "Yay! Passwords match. You are good to go.";
		}	
	});
	
	$("#username").blur(function(){
		var username_input = username.value;
		if (username_input == "") {
        document.getElementById("usernamemsg_area").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
			
				if(this.responseText == "true"){
					document.getElementById("usernamemsg_area").innerHTML = "Username not available. Please try a new name.";
				}else{
					document.getElementById("usernamemsg_area").innerHTML = "Username available. Enjoy.";
				}
			
            }
        };
        xmlhttp.open("GET","username_availability.php?query="+username_input,true);
        xmlhttp.send();
    }
	});
	
	$("#dlnum").blur(function(){
		var dlnum_input = dlnum.value;
		if (dlnum_input == "") {
        document.getElementById("dlmsg_area").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
			
				if(this.responseText == "true"){
					document.getElementById("dlnummsg_area").innerHTML = "Driving License exists in database.";
				}else{
					document.getElementById("dlnummsg_area").innerHTML = "Yay!DL not found in database";
				}
			
            }
        };
        xmlhttp.open("GET","license_verify.php?dlquery="+dlnum_input,true);
        xmlhttp.send();
    }
	});
	
	var myInput = document.getElementById("pwd");

	// When the user clicks on the password field, show the message box
	myInput.onfocus = function() {
		myInput.style.borderColor = "red";
	}

	// When the user clicks outside of the password field, hide the message box
	myInput.onblur = function() {
		myInput.style.border = "1px solid #ccc";
	}

	// When the user starts to type something inside the password field
	myInput.onkeyup = function() {
		// Validate pattern
		var lowerCaseLetters = /[a-z]/g;
		var upperCaseLetters = /[A-Z]/g;
		var specialChar = /[$@$!%*?&#^]/g;
		if(myInput.value.match(lowerCaseLetters) &&
		myInput.value.match(upperCaseLetters) &&
		myInput.value.match(specialChar) &&
		myInput.value.length >= 8) {
			myInput.style.border = "1px solid #ccc";
		} else {
			myInput.style.borderColor = "red";
		}
	}

});
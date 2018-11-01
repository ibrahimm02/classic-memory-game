<?php
    //The PHP functions to be used is included
    include('common.php');
    //Outputs the Header and Navigation function
    outputHeader("Classic Memory - Registration");
    outputNavigation("Registration");
?>

<!-- Contents of the page -->
<div class="row2">
<div id="regform">
    <form name="form" id="usrDetails" method="POST" action="index.php" onsubmit = "return false">
	    <img id="logo" src="images/signinform.png"/> <h2>Register</h2><hr><br>
	<div id="error"></div>	   
        
		<input type="text" name="Name" value="" id="userNameInput" placeholder="Pick a Username"  class="input_name" ><br><br>
		  
		
	    <input type="text" name="Email" value="" id="emailInput" placeholder="Enter Email Id" class="input_email"><br><br>
		  
        
		<input type="password" name="Password" value="" id="passwordInput" placeholder="Enter your New Password" class="input_password"><br><br>
    
        
		<input type="password" name="enterPassword" value="" id="confirmPasswordInput" placeholder="Confirm Password" class="input_Re_password"><br><br>
		  		  
		
		<input type="date" name="DOB" value="" id="dateOfBirthInput" class="input_birthday" min="1990-12-31" max="2012-12-31"><br><br>
        
      
        <input type="tel" name="phoneNumber" value="" id="phoneNumberInput" placeholder="Enter Phone Number" class="input_password"><br><br>
		  
		<input type="submit" onClick="Submit()" id="submit" value="Submit">
    </form>
    
</div>
</div>

<script>
   function storeUser(){
        // Build object that we are going to store
        var usrObject = {};
        usrObject.userName = document.getElementById("userNameInput").value;
        usrObject.email = document.getElementById("emailInput").value;
        usrObject.password = document.getElementById("passwordInput").value;
        usrObject.confirmPassword = document.getElementById("confirmPasswordInput").value;
        usrObject.dateOfBirth = document.getElementById("dateOfBirthInput").value;
        usrObject.phoneNumber = document.getElementById("phoneNumberInput").value;
        usrObject.score = 0;
        //Store user
        localStorage[usrObject.email] = JSON.stringify(usrObject);
       
    }

function Submit(){ // Validated the form
    var usernameRegex = /^\w{3,8}$/; //Regular Expressions for username
    var emailRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //Regular Expressions for Email
    var passwordRegex = /^(?=.*\d).{4,8}$/; //Regular Expressions for Password
    var phoneNumberRegex = /^(07\d{8,12}|447\d{7,11})$/; //Regular Expressions for Phone number
    var uname = document.form.Name.value,
        uemail = document.form.Email.value,
        upassword = document.form.Password.value,
        urepassword = document.form.enterPassword.value,
        udob = document.form.DOB.value,
        uphone = document.form.phoneNumber.value;
        
     if( uname == "" ) // if field left blank
     {
     document.form.Name.focus() ;
     document.getElementById("error").innerHTML = "Username Required";
     return false;
     }else if(!usernameRegex.test(uname)){ // if username does not match regular expression
        document.form.Name.focus();
        document.getElementById("error").innerHTML = "Username should be 3 to 8 characters long";
        return false;
     }
    
     if (uemail == "" ) // if field left blank
     {
        document.form.Email.focus();
        document.getElementById("error").innerHTML = "Email Required";
        return false;
     }else if(!emailRegex.test(uemail)){ // if email does not match regular expression
        document.form.Email.focus();
        document.getElementById("error").innerHTML = "Please Enter a valid Email";
        return false;
     }
     
     if(upassword == "") // if field left blank
     {
         document.form.Password.focus();
         document.getElementById("error").innerHTML = "Password Required";
         return false;
     }else if(!passwordRegex.test(upassword)){ // if password does not match regular expression
        document.form.Password.focus();
        document.getElementById("error").innerHTML = "Password should contain 4 to 8 characters with at least one numeric digit";
        return false;
     }

     if (urepassword == "" ) // if field left blank
     {
        document.form.enterPassword.focus();
        document.getElementById("error").innerHTML = "Re-enter the password";
        return false;
     }
     
     if(urepassword !=  upassword){ // if passwords do not match
         document.form.enterPassword.focus();
         document.getElementById("error").innerHTML= "Passwords do not match, re-enter again";
         return false;
        }
    
     if(udob == "") // if field left blank
     {
         document.form.DOB.focus();
         document.getElementById("error").innerHTML = "Enter your Date of Birth";
         return false;
     }

     if(uphone == "") // if field left blank
     {
         document.form.phoneNumber.focus();
         document.getElementById("error").innerHTML = "Phone Number Required";
         return false;
     }else if(!phoneNumberRegex.test(uphone)){ // if phone number does not match regular expression
        document.form.phoneNumber.focus();
        document.getElementById("error").innerHTML = "Enter a valid Phone number starting with 07 or 447";
        return false;
     }
     
     // if no field is left blank
     if(uname != '' && uemail != '' && upassword != '' && urepassword != '' && udob != '' && uphone != ''){
            storeUser(); // then store user 
            // registration successful
			document.getElementById("error").innerHTML = "Registration Successfully";
			
			alert("Registration Successfully. You will be redirected to Login page in 5 sec.");
            setTimeout('redirect()', 5000); // Re-direct to the login page in 5 secs
            }      
}

    function redirect() { // re-direct to login page
               window.location="login.php";
            }      
           
</script>

<?php
//Outputs the footer function
outputFooter();
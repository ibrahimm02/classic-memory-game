<?php
    //The PHP functions to be used is included
    include('common.php');
    //Outputs the Header and Navigation function
    outputHeader("Classic Memory - Login");
    outputNavigation("Login");
?>

<!-- Contents of the page -->
<div class="row2">
<div id="regform">
	<div id="loginMessage">
		<form id="usrDetails" onsubmit = "return false">
	      <img id="logo" src="images/signinform.png"/>
		  <h2>Login</h2><hr><br>
		  
		  <label>Email :</label><br>
		  <input type="email" id="emailInput" placeholder="Enter Email" /><br><br>
		  
		  <label>Password :</label><br>
		  <input type="password" id="passwordInput" placeholder="Enter Password" /><br><br>
    
          <input type="submit" onclick="login()" id="submit" value="Submit"><br><br>
            
            
          </form>
    </div>
		<div id="error"></div>	
</div>
</div>
    
<script>
    // Check if playerr is logged in
        function checkLogin(){
			if(localStorage.loggedInUsrEmail !== undefined){
			// Extract details of logged in user
                var usrObj = JSON.parse(localStorage[localStorage.loggedInUsrEmail]);
				// Say hello to the logged in player
				document.getElementById("loginMessage").innerHTML = usrObj.userName + " logged in.";
			}
        }
        
		
        function login(){
		//Get email address
			var email = document.getElementById("emailInput").value;
			// If player does have an account
			if(localStorage[email] === undefined){
			 // Inform user that they do not have an account
				document.getElementById("error").innerHTML = "Email not recognized. Do you have an account?" ;
				return;
			}
			else{ // If player has an account
				var usrObj = JSON.parse(localStorage[email]); // Convert to Object
				var password = document.getElementById("passwordInput").value;
				if(password === usrObj.password){  //Login Successful
					document.getElementById("loginMessage").innerHTML = "You are logged in as " + usrObj.userName + ". You will be redirected to the Game in 5 seconds";
					setTimeout('redirect()', 5000); // Re-direct to the game page in 5 secs
					document.getElementById("error").innerHTML = ""; // Clear any login failures
					localStorage.loggedInUsrEmail = usrObj.email;
				}
				else{	
					document.getElementById("error").innerHTML = "Email and Password do not match. Please try again"; // if no match
				}
            }    
        } 

		function redirect() {  // re-direct to game page
               window.location="index.php";
                  }   
</script>

<?php
//Outputs the footer function
outputFooter();
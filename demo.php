<?php 
	include('content/Include/ClientSessions.php');
	include('content/Include/functions.php');
	?>
 
    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<!-- CSS ================================================== -->
	<!-- <link rel="stylesheet" href="https://res.cloudinary.com/rudrashringaar/raw/upload/v1603194416/Include/style_vqpmfj.css"> -->



<div class="regcont" id="rform">
		<div class="contain">
			<div class="wrapper">
				<ul class="steps">
					<li class="is-active">Step 1</li>
					<li>Step 2</li>
					<li>Step 3</li>
					<div class="cross" onclick="ftoggle()">X</div>
				</ul>
				<form class="form-wrapper" name="reg" action="signup-code.php" method="POST">
					<fieldset class="section is-active">
						<h3>Your Details</h3>
						<input type="text" name="fullname" id="fullname" placeholder="Full Name">
						<input type="text" placeholder="DOB: MM/DD/YYYY" onfocus="(this.type='date')" name="dob" id="dob">
						<input type="text" name="email" id="email" placeholder="Email">
						<input type="tel" placeholder="Phone No." name="phno" id="phno">
						<div class="button"><i class="fa fa-arrow-right fa-2x"></i></div>
					</fieldset>
					<fieldset class="section">
					<h3>Add Address</h3>
						<input type="text" name="line1" id="line1" placeholder="First Line">
						<input type="text" name="line2" id="line2" placeholder="Second Line">
						<input type="text" name="pincode" id="pincode" placeholder="Postal Code">
						<input type="text" name="country" id="country" placeholder="Country">
						<div class="button"><i class="fa fa-arrow-right fa-2x"></i></div>
						<div class="buttonn"><i class="fa fa-arrow-left fa-2x"></i></div>
					</fieldset>
					<fieldset class="section">
						<h3>Login Details</h3>
						<input type="text" name="username" id="username" placeholder="Create Username" required>
						<input type="password" name="password" id="psw" placeholder="Create Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
						<div id="message">
							<h4>Password must contain the following:</h4>
							<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							<p id="number" class="invalid">A <b>number</b></p>
							<p id="length" class="invalid">Minimum <b>8 characters</b></p>
						</div>
						<input type="submit" class="btn" name="save" style="max-width:300px;" />
						<div class="buttonn"><i class="fa fa-arrow-left fa-2x"></i></div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>



    <!-- form validation -->

    <script>
         var myInput = document.getElementById("psw");
         var letter = document.getElementById("letter");
         var capital = document.getElementById("capital");
         var number = document.getElementById("number");
         var length = document.getElementById("length");
         
         // When the user clicks on the password field, show the message box
         myInput.onfocus = function() {
           document.getElementById("message").style.display = "block";
         }
         
         // When the user starts to type something inside the password field
         myInput.onkeyup = function() {
           // Validate lowercase letters
           var lowerCaseLetters = /[a-z]/g;
           if(myInput.value.match(lowerCaseLetters)) {  
             letter.classList.remove("invalid");
             letter.classList.add("valid");
           } else {
             letter.classList.remove("valid");
             letter.classList.add("invalid");
           }
           
           // Validate capital letters
           var upperCaseLetters = /[A-Z]/g;
           if(myInput.value.match(upperCaseLetters)) {  
             capital.classList.remove("invalid");
             capital.classList.add("valid");
           } else {
             capital.classList.remove("valid");
             capital.classList.add("invalid");
           }
         
           // Validate numbers
           var numbers = /[0-9]/g;
           if(myInput.value.match(numbers)) {  
             number.classList.remove("invalid");
             number.classList.add("valid");
           } else {
             number.classList.remove("valid");
             number.classList.add("invalid");
           }
           
           // Validate length
           if(myInput.value.length >= 8) {
             length.classList.remove("invalid");
             length.classList.add("valid");
           } else {
             length.classList.remove("valid");
             length.classList.add("invalid");
           }
         }
      </script>
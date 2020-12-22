<!DOCTYPE html>
<html lang="en">
   <head>
      <?php 
         include('content/Include/ClientSessions.php');
		 include('content/Include/functions.php');
		//  session_start();
		if (isset($_SESSION['fname'])){
			if($_SESSION['category']=='individual'){
				header('Location: account.php');
				exit();
		  }
		  if($_SESSION['category']=='business'){
			header('Location: business.php');
			exit();
	  }
	}
         ?>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <link rel = "icon" href ="https://res.cloudinary.com/rudrashringaar/image/upload/v1600963349/Include/logo_zy3e2u.png" type = "image/x-icon">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
      <!-- CSS ================================================== -->
      <link rel="stylesheet" href="https://res.cloudinary.com/rudrashringaar/raw/upload/v1603194416/Include/style_vqpmfj.css">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
   </head>
   <body class="all-grad">
      <!--------login------->
      <div class="login-page">
         <div class="container" style="padding-left:0px;padding-right:0px;">
            <div class="col-2">
               <div class="form-cont">
                  <div>
                     <span>Login</span>
                     <hr id="ind">
                  </div>
                  <form action="signup-code.php" id="loginform" method="POST">
                     <center>
                        <lottie-player src="https://assets9.lottiefiles.com/datafiles/XRVoUu3IX4sGWtiC3MPpFnJvZNq7lVWDCa8LSqgS/profile.json"  background="transparent"  speed="5"  style="width: 150px; height: 150px;"  loop  autoplay></lottie-player>
                     </center>
                     <input type="text" placeholder="Username" name="phone_email" required>
                     <input type="password" placeholder="password" name="password" required>
                     <button type="submit" class="btn" name="login">Login</button>
                     <p style="font-size:12px;">Forget password? E-mail us.
                     <p>
                     <hr>
                     <center><a href="signup.php" style="color:#22aee0;font-weight:normal;font-size:13px;width:100%">New User? Signup</a></center>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-------------------js --------------->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      <script>
         
         
         //Reg Form
         
         function validatef1(){
         	var a = document.forms["reg"]["fullname"].value;
         	var b = document.forms["reg"]["dob"].value;
         	var c = document.forms["reg"]["email"].value;
         	var d = document.forms["reg"]["phno"].value;
         	if ((a == "")||(b == "")||(c == "")||(d == "") ) {
         		Swal.fire({
         		icon: 'error',
         		title: 'Oops...',
         		text: 'All Fields Must Be Fill Out.',
         	});
         	return 0;
         	}else{
         		return 1;
         	}
         };
         function validatef2(){
         	var e = document.forms["reg"]["line1"].value;
         	var f = document.forms["reg"]["line2"].value;
         	var g = document.forms["reg"]["pincode"].value;
         	var h = document.forms["reg"]["country"].value;
         	if ((e == "")||(f == "")||(g == "")||(h == "") ) {
         		Swal.fire({
         		icon: 'error',
         		title: 'Oops...',
         		text: 'All Fields Must Be Fill Out.',
         	});
         	return 0;
         	}else{
         		return 1;
         	}
         };
         
         $(document).ready(function(){
         	$(".form-wrapper .button").click(function(){
         		var button = $(this);
         		var currentSection = button.parents(".section");
         		var currentSectionIndex = currentSection.index();
         		if(currentSectionIndex == 0){
         			var check = validatef1();
         		}
         		else{
         			var check = validatef2();
         		}
         		if(check == 1){
         			var headerSection = $('.steps li').eq(currentSectionIndex);
         			currentSection.removeClass("is-active").next().addClass("is-active");
         			headerSection.removeClass("is-active").next().addClass("is-active");
         		}
         	});
         });
         $(document).ready(function(){
         	$(".form-wrapper .buttonn").click(function(){
         		var button = $(this);
         		var currentSection = button.parents(".section");
         		var currentSectionIndex = currentSection.index();
         		var headerSection = $('.steps li').eq(currentSectionIndex);
         		currentSection.removeClass("is-active").prev().addClass("is-active");
         		headerSection.removeClass("is-active").prev().addClass("is-active");
         	});
         });
      </script>
      
      <?php
         if ( isset($_GET['invalid'])) {
         			echo "<script>Swal.fire({
         				icon: 'error',
         				title: 'Oops...',
         				text: 'Username/Password Is Invalid.',
         				footer: 'New User? Try To Signup'
         			});</script>"; 
         		}
         if(isset($_GET['RError']))
            {
         		echo "<script>Swal.fire({
         			icon: 'error',
         			title: 'Oops...',
         			text: 'User name or Email id already exists.',
         		});</script>";
            }else if(isset($_GET['fail'])){
         		echo "<script>Swal.fire('Something Went Wrong.Please Try After Sometime.')</script>"; 
         	}else{
         
         	}
         ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script>
         $(window).on('load', function() { // makes sure the whole site is loaded 
         	$('#status').fadeOut(); // will first fade out the loading animation 
         	$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
         	$('body').delay(350).css({'overflow':'visible'});
         	})
         	
      </script>
   </body>
</html>
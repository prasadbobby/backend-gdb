<!DOCTYPE html> 
<html lang="en">
<head>
<?php require_once('content/Include/ClientSessions.php') ?>
<?php require_once('content/Include/functions.php') ?>
<?php ConfirmLogin(); 
$uid=$_SESSION['user_idd'];
$uname=$_SESSION['fname'];
$query = "SELECT * FROM users_info WHERE user_id = '$uid'";
$exec = Query($query) or die(mysqli_error($con));
if( $exec ){
	$post = mysqli_fetch_assoc($exec); 
	$c_name = $post['company_name'];
	$no_emp = $post['no_employees'];
	$country = $post['country'];
	$state = $post['state'];
	$city = $post['city'];
	
}
$checkp = 0;
$changedp = 0;
$changedi = 0;
$changeda = 0;
?>
<?php
include('./content/Include/Database.php');
$sql="select id,name from country";
$stmt=$conn->prepare($sql);
$stmt->execute();
$arrCountry=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Account | <?php echo $name;?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!-- CSS ================================================== -->
	<link rel="stylesheet" href="https://res.cloudinary.com/rudrashringaar/raw/upload/v1603194416/Include/style_vqpmfj.css">
	<?php 
		if ( isset($_POST['pupdate'])) {
			$cpass = mysqli_real_escape_string($con,$_POST['cpass']);
			$npass = mysqli_real_escape_string($con,$_POST['npass']);
			$rpass = mysqli_real_escape_string($con,$_POST['rpass']);
			$uid = $_SESSION['user_idd'];
			$uname=$_SESSION['user_name'];
			if(($npass) != ($rpass)){
				$checkp = 1;
			} else{
				$query = "SELECT * FROM users WHERE id = '$uid' AND username = '$uname'";
				$exec = Query($query);
				$post = mysqli_fetch_assoc($exec);
				$pass = $post['password'];
				if(($pass) == ($cpass)){
					$sql = "UPDATE users SET password ='$npass' WHERE id = '$uid'";
					$exec = Query($sql);
					$changedp = 1;
				}else{
					$changedp = -1;
				}
			}
		}
		if ( isset( $_POST['profileupdate'])){
			$uid = $_SESSION['user_idd'];
			$fname = mysqli_real_escape_string($con, $_POST['fname']);
			$contact = mysqli_real_escape_string($con, $_POST['contact']);
			$sql = "UPDATE users SET name ='$fname', contact = '$contact' WHERE id = '$uid'";
			$exec = Query($sql);
			$changedi = 1;
		}
		if ( isset( $_POST['addressupdate'])){
			$uid = $_SESSION['user_idd'];
			$line1 = mysqli_real_escape_string($con, $_POST['line1']);
			$line2 = mysqli_real_escape_string($con, $_POST['line2']);
			$pincode = mysqli_real_escape_string($con, $_POST['pincode']);
			$country = mysqli_real_escape_string($con, $_POST['country']);
			$sql = "UPDATE users SET  line1 = '$line1', line2 ='$line2', pincode = '$pincode', country = '$country' WHERE id = '$uid'";
			$exec = Query($sql);
			$changeda = 1;
		}
	?>
	<style>
		input {
					text-align: center;
					}
		input[type="text"] {
					font-size:14px;
					}
	</style>
</head>
<body class="all-grad" id="account"> 
	<!--------Account------->
	<div class="log"><a href="./ClientLogout.php" class="logout">Logout&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-12 ">
				<div class="card">
				<div class="profile tabshow">
				<center><lottie-player src="https://assets7.lottiefiles.com/packages/lf20_dnztOc.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;"  loop  autoplay></lottie-player>
				<h4><u>My Profile</u></h4>
				<hr>
        <form action="account.php" method="POST" enctype="multipart/form-data">
        	<h5>Name of the company</h5>
	        <input type="text" class="input" placeholder="<?php echo $_SESSION['user_name'];?>">
	        <h5>No of employees</h5>
	        <input type="text" class="input" required  name="no_emp" value="<?php echo $name;?>">
	        <h5>Country</h5>
				<select class="form-control" id="countr">
					<?php if($country == ''){
						?>
							<option value="-1">Select Country</option>
						<?php
					}else{
						$c_val = "SELECT * FROM country WHERE id = '$country'";
						$c_ex = Query($c_val) or die(mysqli_error($con));
						$pos = mysqli_fetch_assoc($c_ex);
						// $s_val = "SELECT * FROM country WHERE id = '$state' AND country_id='$c_ex[name]'";
						// $s_ex = Query($s_val) or die(mysqli_error($con));
						// $city_val = "SELECT * FROM country WHERE id = '$city'";
						// $city_ex = Query($city_val) or die(mysqli_error($con));
						?>	
							<option value="-1" selected><?php echo $pos['name']?></option>
						<?php
					}
					foreach($arrCountry as $countr){
						?>
						<option value="<?php echo $countr['id']?>"><?php echo $countr['name']?></option>
						<?php
					}
					?>
				</select>
				<label for="state">State</label>
						<select class="form-control" id="state">
							<option>Select State</option>
						</select>
						<label for="city">City</label>
						<select class="form-control" id="city">
							<option>Select City</option>
						</select>
	        <!-- <input type="text" class="input" required value="<?php echo $contact?>" name="contact"> -->
	        <h5>State</h5>
					<input type="text" class="input" placeholder="<?php echo $email?>">
                    <h5>City</h5>
	        <input type="text" class="input" required value="<?php echo $contact?>" name="contact">
					<br>
	        <button class="btn" style="margin-top: 15px;width:150px;" name="profileupdate">Update</button></center>
        </form>
      </div>
				</div>
			</div>
			
			
			
		</div>
	</div>
	
	<!-------------------js --------------->
	<?php
		if(isset($_GET['success'])){
			echo "<script>Swal.fire(
				'&#128525; HURRAY &#128525;',
				'You Have Successfully Registered. Start Shopping Now.',
				'success'
			);</script>"; 
		}
		if($checkp == 1){
			echo "<script>Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'New Password and Re-Type Password are not same.',
			});</script>";
		}
		if($changedp == 1){
			echo "<script>Swal.fire(
				'&#128525; HURRAY &#128525;',
				'Your Password has been changed successfully.',
				'success'
			);</script>";
		}
		if($changedp == -1){
			echo "<script>Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Current password is not correct.',
			});</script>";
		}
		if($changedi == 1){
			echo "<script>Swal.fire(
				'&#128525; HURRAY &#128525;',
				'Your Info has been updated successfully.',
				'success'
			);</script>";
		}
		if($changeda == 1){
			echo "<script>Swal.fire(
				'&#128525; HURRAY &#128525;',
				'Your Address has been updated successfully.',
				'success'
			);</script>";
		}
	?>
	<script>
		//toggel menu
		function menutoggle() {
			document.getElementById("MenuItems").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
			if (!event.target.matches('.menu-icon')) {
				var dropdowns = document.getElementsByClassName("MenuItems");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
				}
			}
    }
  </script>
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
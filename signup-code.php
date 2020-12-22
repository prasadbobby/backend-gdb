<?php
require_once('content/Include/functions.php');
include('content/Include/ClientSessions.php');
if(isset($_POST['save']))
{
$fname = mysqli_real_escape_string($con,$_POST['firstname']);
$lname = mysqli_real_escape_string($con,$_POST['lastname']);
$phone_email = mysqli_real_escape_string($con,$_POST['phone_email']);
$password = mysqli_real_escape_string($con,$_POST['password']); 
$category = mysqli_real_escape_string($con,$_POST['category']);
// $contact= mysqli_real_escape_string($con,$_POST['phno']);
// $line1 = mysqli_real_escape_string($con,$_POST['line1']);
// $line2 = mysqli_real_escape_string($con,$_POST['line2']);
// $pincode = mysqli_real_escape_string($con,$_POST['pincode']);
// $country = mysqli_real_escape_string($con,$_POST['country']);
$sql = "SELECT * FROM users_test where phone_email='$phone_email'";
$exec = Query($sql);
if (mysqli_num_rows($exec)>0)
{
      header("Location: login.php?RError");
}
else{
      date_default_timezone_set("Asia/Calcutta");
      $time = time();
      $dateTime = strftime('%Y-%m-%d %H:%M:%S ',$time);
      $sql = "INSERT INTO users_test (date_time, firstname, lastname, phone_email,password,category) VALUES('$dateTime', '$fname', '$lname','$phone_email','$password','$category')";
      $exec = Query($sql);
       if ($exec) {
            $foundAccount = ClientLoginAttempt($phone_email, $password);
            if ($foundAccount) {
                 
                  $_SESSION['fname'] = $foundAccount['firstname'];
                  $_SESSION['category'] = $foundAccount['category'];
                  $newid =$foundAccount['id'];
                  $sqll = "INSERT INTO users_info (user_id) VALUES('$newid')";
                  $execc = Query($sqll);
            }
            mysqli_close($con);
            if($category=='individual'){
                  $_SESSION['user_id'] = $foundAccount['id'];
                  Redirect_To("account.php?success");
            }
           else{
            $_SESSION['user_idd'] = $foundAccount['id'];
                 Redirect_To("business.php");
           }
      }else {
            Redirect_To("login.php?fail");
      }
}
}
if(isset($_POST['login'])){
      $phone_email = mysqli_real_escape_string($con,$_POST['phone_email']);
      $password = mysqli_real_escape_string($con,$_POST['password']);
      $foundAccount = ClientLoginAttempt($phone_email, $password);
      if ($foundAccount) {
            
            $_SESSION['fname'] = $foundAccount['firstname'];
            $_SESSION['category'] = $foundAccount['category'];
            mysqli_close($con);
            if($foundAccount['category']=='individual'){
                  $_SESSION['user_id'] = $foundAccount['id'];
                  Redirect_To("account.php?success");
            }
           else{
             $_SESSION['user_idd'] = $foundAccount['id'];
                 Redirect_To("business.php");
           }
            
      }
      else{
            Redirect_To('login.php?invalid');
      }
}
?>

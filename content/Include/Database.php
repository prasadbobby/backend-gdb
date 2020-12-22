<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'updation_profile';
$con;

try{
	$con = mysqli_connect($server, $username, $password, $db_name) or die(mysqli_connec_errno());
	
}catch(Exception $e){
	echo $e->getMessage();
}

try{
	$conn=new PDO("mysql:host=$server;dbname=$db_name","$username","$password");
}catch(PDOExection $e){
	echo $e->getMessage();
}
?>
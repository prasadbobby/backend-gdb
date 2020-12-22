<?php
session_start();
function Message () {
	if ( isset($_SESSION['errorMessage'])) {
		$ouput = "
			<div class='alert alert-danger'>" .
			htmlentities($_SESSION["errorMessage"]) .
			"</div>
		";
		$_SESSION['errorMessage'] = null;
		return $ouput;
	}
} 

function SuccessMessage () {
	if ( isset($_SESSION['successMessage'])) {
		$ouput = "
			<div class='alert alert-success'>" .
			htmlentities($_SESSION["successMessage"]) .
			"</div>
		";
		$_SESSION['successMessage'] = null;
		return $ouput;
	}
}


function ClientConfirmLogin () {
	$login = false;
	if ( isset($_SESSION['user_id'])) {
		$login = true;
	}

	if ($login === false) {
		$_SESSION['errorMessage'] = 'Login Required';
		Redirect_To('login.php?i');
	}
}
function ConfirmLogin () {
	$login = false;
	if ( isset($_SESSION['user_idd'])) {
		$login = true;
	}

	if ($login === false) {
		$_SESSION['errorMessage'] = 'Login Required';
		Redirect_To('login.php?b');
	}
}
?>
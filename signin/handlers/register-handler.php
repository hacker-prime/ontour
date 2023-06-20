<?php 

// include("../includes/config.php");


function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormStringEmail($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = strtolower($inputText);
	return $inputText;
}


if(isset($_POST['registerButton'])) {
	//Register button was pressed
	$firstName = sanitizeFormString($_POST['firstName']);$lastName = sanitizeFormString($_POST['lastName']);$email = sanitizeFormStringEmail($_POST['email']);$email2 = sanitizeFormStringEmail($_POST['email2']);$password = sanitizeFormPassword($_POST['password']);$password2 = sanitizeFormPassword($_POST['password2']);$gender = sanitizeFormPassword($_POST['gender']);$date_of_birth = $_POST['birthday'];$role = sanitizeFormPassword($_POST['role']);

	// echo $firstName;
 	$wasSuccessful = $account->register($firstName,$lastName,$email,$email2,$password,$password2,$gender,$date_of_birth,$role);

	if($wasSuccessful == true) {
		//What use to be saved in the session was $username but was changed to $email due to the integration of the Google Social Login
		// $_SESSION['userLoggedIn'] = $email;

		// Use the role to determine which session should be created
		if($role == "Contractor"){
			$_SESSION['driveruserLoggedIn'] = $email;
		}

		if($role == "Customer"){
			$_SESSION['userLoggedIn'] = $email;
		}

		if($role == "Partner"){ 
			$_SESSION['partnerLoggedIn'] = $email;
		}
		

		// - Generate OTP 

		$otp = rand(100000,999999);

		$result = mysqli_query($con,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
		
		$current_id = mysqli_insert_id($con);

		// - Generate OTP 

		// - Send OTP

		require("mail-function.php");

		$mail_status = sendOTP($email,$otp,$firstName,$lastName,$role);

		// $new_registration = newRegistration($email,$firstName,$role,$lastName);

		// - Send OTP		


		// header("Location: responsive-sidebar-menu/index.php");
		header("Location:includes/handlers/pre-otp-login.php");
	} else{
		header("Location: responsive-sidebar-menu/error.php");
	}

}

// This was originally at the top of register.php but I moved it so to make register.php look more cleaner in the php script/tag at the top of the page
function getInputValue($name) {
	if(isset($_POST[$name])) {
		echo $_POST[$name];
	}
}


?>
<?php

if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$email = $_POST['email-sign-in'];
	$password = $_POST['password-sign-in'];
	// $role = $_POST['role-login'];
	// June 18,2023 $role has to be set to Customer because the if statements in Account.php checks if $role is equla to Customer afterwhich it sets $roletable to the users table. Previously I had set $role to users which was throwing an error
	$role = 'Customer'; // This has been set to users so to avoid having to take up too much time to change the code below, it would require having to remove all variable and code related to those variables ($role & $roletable) and also to consider the logic inside of Account.php that makes use of those variables. 

	$result = $account->login($email, $password,$role);

	if($result == true) {

		/** June 18, 2023 - I'll bypass the OTP and use regular login (takes less time).
		 *
		 * 
		 *  
		**/

		header("Location: admin.php");


		// //Instead of passing in a username of Shayn from the login form, I've now changed it to email so what's inside $username is now shaynhacker.com rather than Shayn
		// // $_SESSION['userLoggedIn'] = $email;
		// $_SESSION['userRole'] = $role;

		
		// // Use the role to determine which session should be created
		// if($role == "Contractor"){
		// 	$_SESSION['driveruserLoggedIn'] = $email;
		// }

		// if($role == "Customer"){
		// 	$_SESSION['userLoggedIn'] = $email;
		// }

		// if($role == "Partner"){ 
		// 	$_SESSION['partnerLoggedIn'] = $email;
		// }

		// if($role == "Admin"){ 
		// 	$_SESSION['phoenix_prime_administrator_3.14'] = $email;
			
		// }


		// // header("Location: responsive-sidebar-menu/index.php");

		// 	// OTP

		// 		// - Generate OTP 

		// 		$otp = rand(100000,999999);

		// 		$result = mysqli_query($con,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
				
		// 		$current_id = mysqli_insert_id($con);

		// 		// - Generate OTP 

		// 		// - Send OTP

		// 			//Select username from database so that will be used in mail-function-login.php instead of email

		// 			// Use the role to determine which table one should take data from
		// 			if($role == "Contractor"){
		// 				$roletable = "contractors";
		// 			}

		// 			if($role == "Customer"){
		// 				$roletable = "users";
		// 			}

		// 			if($role == "Partner"){ 
		// 				$roletable = "partners";     
		// 			}

		// 			if($role == "Admin"){ 
		// 				$roletable = "administrators";     
		// 			}
	


		// 			// https://phpdelusions.net/mysqli_examples/prepared_select
    	// 			// https://stackoverflow.com/questions/13656667/php-using-a-variable-to-hold-a-table-name-and-using-that-variable-in-queries
		// 			$sql = "SELECT * FROM `" . $roletable . "` WHERE email=?"; // SQL with parameters
		// 			$stmt = $con->prepare($sql); 
		// 			$stmt->bind_param("s", $email);
		// 			$stmt->execute();
		// 			$result = $stmt->get_result(); // get the mysqli result
		// 			$user = $result->fetch_assoc(); // fetch data  
		// 			$firstname = $user['firstName'];
		// 			$lastname = $user['lastName'];


		// 			// $emailresult = mysqli_query($con," SELECT email FROM users WHERE email='" . $username . "' ");

		// 			// $row = $emailresult->fetch_row();

		// 			// $email = $row[0];
					
		// 			// NOTE - October 8,2022 - Something fishy is going on!
		// 			// require_once("mail-function-login.php");

		// 			// $mail_status = sendOTP($email,$otp,$firstname,$role,$host);

		// 			// $new_login_signup = newLoginSignIn($role,$firstname,$lastname,$email);	
		// 		// - Send OTP		

		// 	// OTP

		// 			if($role == "Contractor"){
		// 				$roletable_signin_login = "contractors_signin_login";
		// 			}

		// 			if($role == "Customer"){
		// 				$roletable_signin_login = "users_signin_login";
		// 			}

		// 			if($role == "Partner"){ 
		// 				$roletable_signin_login = "partners_signin_login";     
		// 			}

		// 			if($role == "Admin"){ 
		// 				$roletable_signin_login = "admin_signin_login";     
		// 			}
					
					
		// 			// https://stackoverflow.com/questions/13656667/php-using-a-variable-to-hold-a-table-name-and-using-that-variable-in-queries
		// 			$query = "INSERT INTO `" . $roletable_signin_login . "` (email,datetime) VALUES (?,?)";
		// 			$stmt = $con->prepare($query);	
		// 			// $stmt = $this->con->prepare($query); Fatal error: Uncaught Error: Using $this when not in object context 
		// 			$stmt->bind_param("ss", $email,$signuptime);	

							
		// 			$timezone = new DateTimeZone('Jamaica');
		// 			$datetime = new DateTime();
		// 			$datetime->setTimezone($timezone);
		// 			$signuptime = $datetime->format('Y-m-d H:i:s');

		// 			$result = $stmt->execute();

		// 			// return $result;
	


		// 			if($role == "Admin"){ 
		// 				header("Location:../includes/handlers/pre-otp-login.php");
		// 			} else{
		// 				header("Location:includes/handlers/pre-otp-login.php");
		// 			}
	
	
	}
}

?>
<?php

// Refer to phoenixprime.io - account php file -testing.txt for perspective or insight
	
class Account {

		private $con;
		private $errorArray;
        
		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}

		public function login($un, $pw,$role) {

			if(!empty($role)){

				// Use the role to determine which table one should take data from
				if($role == "Contractor"){
					$roletable = "contractors";
				}

				if($role == "Customer"){
					$roletable = "users";
				}

				if($role == "Partner"){ 
					$roletable = "partners";     
				}

				if($role == "Admin"){ 
					$roletable = "administrators";     
				}

			
				$unvariable = '';
				// https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php?rq=1
				// https://yourblogcoach.com/how-to-secure-password-using-bcrypt-in-php/
				$user_sql = "SELECT password FROM `" . $roletable . "` WHERE email = ?";
				$stmt = $this->con->prepare($user_sql );
				// Bind variables to the prepared statement as parameters
				$stmt->bind_param('s', $unvariable);
				/* Set the parameters values */
				$unvariable = $un;
				$stmt->execute();
				// https://stackoverflow.com/questions/8321096/call-to-undefined-method-mysqli-stmtget-result
				//https://stackoverflow.com/questions/39804471/how-to-use-bind-result-function-with-select-query
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) {
				// $stmt->bind_result($password);
				// while ($stmt->fetch()) {

					//result is in row
					$db_password = $row["password"];
					// $db_password = $password;

				}

				if($stmt == true){

					//Compare the password attempt with the password we have stored.
					if(password_verify($pw, $db_password)){
						//your code here on success
						return true;
					} else {
						array_push($this->errorArray, Constants::$loginFailed);
						return false;
					}

				} 
			}else{
				array_push($this->errorArray, Constants::$loginEmpty);
				return;
			}	
		}

		public function register($fn, $ln, $em, $em2, $pw, $pw2,$gen,$dob,$role) {
			$this->validateFirstName($fn);
			$this->validateLastName($ln);

			if(empty($this->errorArray) == true) {
				//Insert into db
				return $this->insertUserDetails($fn,$ln,$em,$pw,$gen,$dob,$role);
			}
			else {
				return false;
			}

		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($fn,$ln,$em,$pw,$gen,$dob,$role) {

			  // Use the role to determine which table should receive data
			if($role == "Contractor"){
				$roletable = "contractors";
			}

			if($role == "Customer"){
				$roletable = "users";
			}

			if($role == "Partner"){ 
				$roletable = "partners";     
			}

			$firstnamevariable = $fn;
			$secondnamevariable = $ln;
			$emailvariable = $em;

			// https://yourblogcoach.com/how-to-secure-password-using-bcrypt-in-php/
			// https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php?rq=1
		 
			$encryptedPw = password_hash($pw, PASSWORD_BCRYPT);
			$encryptedPwvariable = $encryptedPw;	

			$gendervariable = $gen;

			$dobvariable = $dob;



			$timezone = new DateTimeZone('Jamaica');
			$datetime = new DateTime();
			$datetime->setTimezone($timezone);
			$signuptime = $datetime->format('Y-m-d H:i:s');

			// https://stackoverflow.com/questions/13656667/php-using-a-variable-to-hold-a-table-name-and-using-that-variable-in-queries
			$query = "INSERT INTO `" . $roletable . "` (firstName,lastName,email,password,gender,DOB,signUpDate) VALUES (?,?,?,?,?,?,?)";
			$stmt = $this->con->prepare($query);
			$stmt->bind_param("sssssss", $firstnamevariable,$secondnamevariable,$emailvariable,$encryptedPwvariable,$gendervariable,$dobvariable,$signuptime);			
	

			$result = $stmt->execute();

			return $result;

			

			
			
		}

		private function validateFirstName($fn) {
			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastName($ln) {
			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$emvariable = $em;

			$checkEmailQuery = "SELECT email FROM staff WHERE email = ?";
			$stmt = $this->con->prepare($checkEmailQuery);
			// Bind variables to the prepared statement as parameters
			$stmt->bind_param("s", $emvariable); 
			/* Set the parameters values and execute the statement*/
			$stmt->execute();
			// https://stackoverflow.com/questions/22414068/result-num-rows-always-returns-0
			$stmt->store_result();
			if( $stmt->num_rows > 0) {
				$stmt->close();
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}

		}
		
		private function validatePasswords($pw, $pw2) {

			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNoMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

		}


	}
?>

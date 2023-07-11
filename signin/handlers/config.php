<?php
	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Jamaica");

	$con = mysqli_connect("localhost", "u688999092_clients", "c8LHbje?*", "u688999092_clients");
	// $con = mysqli_connect("localhost", "u688999092_prime", "Immortal_eternal_infinite_8", "u688999092_phoenix");
	// $con = mysqli_connect("localhost","my_user","my_password","my_db");
	// u688999092_clients
	// c8LHbje?*
	// u688999092_clients


	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>

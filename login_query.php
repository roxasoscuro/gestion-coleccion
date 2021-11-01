<?php
	//starting the session
	session_start();
	include("variables_globales.php");
	global $trueuser;
	global $truepassword;
	//including the database connection
	if(ISSET($_POST['login'])){
		// Setting variables
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$count = 0;
 	if (strcmp($username, $trueuser) == 0 && strcmp($password, $truepassword) == 0) {
    $count = 27;
}

		if($count > 0){
			header('location:home.php');
		}else{
			$_SESSION['error'] = "Invalid username or password";
			header('location:index.php');
		}
	}
?>
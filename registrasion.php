<?php
	require_once'conn.php';
	if(ISSET($_POST['registrasion'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
 
 
		$query="INSERT INTO `user` (name, username, password) VALUES('jajano', '$username', '$password')";
 
		$conn->exec($query);
 
		
		echo "<center><h4 class='text-success'>Successfully registered!</h4></center>";
	}
?>
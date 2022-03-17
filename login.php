<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query1=$conn->query("SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
		$row1=$query1->fetchArray();
		
		$query=$conn->query("SELECT COUNT(*) as count FROM `user` WHERE `username`='$username' AND `password`='$password'");
		$row=$query->fetchArray();
		$count=$row['count'];
		if($count > 0){
			$_SESSION['user_id']=$row1['user_id'];
			$_SESSION['user_name']=$username;
			header('location: home.php');
		}else{
			echo "<div class='alert alert-danger'>Invalid username or password</div>";
		}
	}
?>
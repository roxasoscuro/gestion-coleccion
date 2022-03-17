<?php
	require_once'conn.php';
	if(ISSET($_POST['aniadirfigura'])){
		$name=$_POST['nombreFig'];
		$username=$_SESSION['user_name'];



		$directorio_usuario="coleccion/" .$username ."/";

		  $name =$username."_".$_FILES['file']['name'];
		  if (!file_exists($directorio_usuario)) {
		    mkdir($directorio_usuario, 0777, true);
		  }
		  
		  $target_dir = $directorio_usuario;

		  $target_file = $target_dir . basename($_FILES["file"]["name"]);

		 $file_size = $_FILES['file']['size'];
		  $file_type = $_FILES['file']['type'];

	    if ($file_size > 1000000){   
	        echo "<center><h4 class='text-danger'>archivo puto grande </h4></center>"; 
	       // echo $file_type; 
	    }else if  ($file_type != "image/jpg" && $file_type != "image/png") {
	    	 echo "<center><h4 class='text-danger'></h4></center>"; 
	    }else{

		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		  // Valid file extensions
		     // Upload file
		     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
					echo "<center><h4 class='text-success'>Figura añadida!</h4></center>";
		     }



	    }
	}
?>
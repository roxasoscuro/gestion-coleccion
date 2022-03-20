<?php
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="halfmoon/css/halfmoon-variables.css"/>
	</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars dark-mode">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<h3 class="text-primary">HOME</h3>
		</div>
	</nav>
		<div class="col-lg-5"></div>
		<div class="card">
		  <h2 class="" >
		     WELCOME  <?php echo $_SESSION['user_name'] ?>
		  </h2>
		  <h1><a href="ADDFIGURE.php">AÑADIR</a></h1>
		  <h1><a href="VIEWFIGURES.php">VER COLECCION</a></h1>
		  <div class="text-left"> <!-- text-right = text-align: right -->
		    <a href="logout.php" class="btn">logout</a>
		  </div>
		</div>
 
</body>	
</html>
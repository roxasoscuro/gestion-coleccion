<!DOCTYPE html>
<?php
include("variables_globales.php");
global $trueuser;
 ?>


<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="boostrap/slate/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="boostrap/custom.css"/>
	</head>
<body class="bootstrap-dark">

	<div class="col-md-1"></div>
	<div class="col-md-10 well">
		<h1 class="text-primary text-togordo">Pagina principal</h1>
		<a href="index.php">tira pa'tras</a>
		<hr style="border-top:1px dotted #ccc;"/>
		
			<h1 class="text-center text-togordo">cosa</h1>
			<div class="col-md-4">
				<form method="POST" action="login_query.php">	
					<button class="btn btn-primary btn-block btn-xlarge" name="reservas">Reservas</button>
				</form>	
			</div>
			<div class="col-md-4">
				<form method="POST" action="login_query.php">	
					<button class="btn btn-primary btn-block btn-xlarge" name="coleccion">Coleccion</button>
				</form>
			</div>
			<div class="col-md-4">	
				<form method="POST" action="login_query.php">	
					<button class="btn btn-primary btn-block btn-xlarge" name="ventas">Ventas</button>
				</form>	
			</div>

	</div>
</body>
</html>





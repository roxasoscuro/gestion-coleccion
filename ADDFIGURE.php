<?php
	session_start();
	require ('simple_html_dom.php');
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="halfmoon/css/halfmoon-variables.css"/>
	</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars dark-mode" >
  <div class="page-wrapper with-navbar">
    <div class="sticky-alerts"></div>
    <nav class="navbar">
    <h1><a href="HOME.php">VOLVER</a></h1>
    </nav>

<!-- Content wrapper start -->
    <div class="content-wrapper">
 	<div class="row row-eq-spacing-lg">
 		 
          <div class="col-lg-5">

            <div class="card h-lg-160 overflow-y-lg-auto"> 
              <h2 class="card-title-form-index">IMPORTAR FIGURA DE MFC</h2>
               <form action="" method="POST" class="form-inline w-550 mw-full">
				  <div class="form-group">
				    <label class="required w-110" for="username">LINK MFC Figura</label> 
				    <input type="text" class="form-control"name="mfc_figura" required="required">
				  </div>
				  <button name="import_figura_mfc" class="btn btn-primary btn-block">Importar Figura</button>
				</form>
					<?php include "scrapperMFCFigura.php";?>
          	 </div>
		
					<div class="card h-lg-auto overflow-y-lg-auto"> 
              <h2 class="card-title-form-index">IMPORTAR CUENTA DE MFC</h2>
              <h2 class="card-title-form-index">TARDA UN MONTON BECAUSE MFC ES BASURA</h2>
              <h2 class="card-title-form-index">DE MOMENTO SOLO IMPORTA FIGURAS EN PROPIEDAD</h2>
               <form action="" method="POST" class="form-inline w-550 mw-full">
				  <div class="form-group">
				    <label class="required w-120" for="username">NOMBRE USUARIO MFC</label> 
				    <input type="text" class="form-control"name="mfc_cuenta" required="required">
				  </div>
				  <button name="import_cuenta_mfc" class="btn btn-primary btn-block">Importar Cuenta</button>
				</form>
					<?php include "scrapperMFCCuenta.php";?>
            </div>

           </div> 

         <div class="col-lg-5">
            <div class="card h-lg-auto overflow-y-lg-auto">
              <h2 class="card-title-form-index">register</h2>
           		<form action="" method="POST" enctype='multipart/form-data'>
					<div class="form-group">
						<label>nombre</label>
						<input type="text" name="nombreFig" class="form-control" required="required"/>
					</div>
					<div class="form-group">
						<label>compañia</label>
						<input type="text" name="makerFig" class="form-control" required="required"/>
					</div>
					<div class="form-group">
						<label>Precio</label>
						<input type="text" name="priceFig" class="form-control" required="required"/>
					</div>
					<div class="form-group">
						<label>Fecha Compra</label>
						<input type="text" name="dateFig" class="form-control" required="required"/>
					</div>
					<div class="form-group">
						<label>imagen</label>
						<input type='file' name='file' />
					</div>
				
				<button name="aniadirfigura" class="btn btn-block btn-success">no funciona</button>
			</form>
				<?php //include'aniadirfigura.php'?>
			</div>
		</div>



    </div>
    <!-- Content wrapper end -->
 <div class="text-left"> <!-- text-right = text-align: right -->
		    <a href="logout.php" class="btn">logout</a>
		  </div>
  </div>
  <!-- Page wrapper end -->

		
	</div>




  <script src="halfmoon/js/halfmoon.min.js"></script>
</body>	
</html>
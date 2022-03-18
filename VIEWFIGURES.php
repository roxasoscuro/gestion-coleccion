<?php
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
	$id_usuario = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="es">


	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="halfmoon/css/halfmoon-variables.css"/>
		<link rel="stylesheet" type="text/css" href="table.css"/>
	</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars dark-mode" >
  <div class="page-wrapper with-navbar">
    <div class="sticky-alerts"></div>
    <nav class="navbar">
    <h1><a href="home.php">VOLVER</a></h1>
    </nav>

<!-- Content wrapper start -->
    <div class="content-wrapper">

            <div class="card h-lg-auto overflow-y-lg-auto"> 
              <h2 class="card-title-form-index">listado figuras</h2>
               <table class="dcf-table dcf-table-responsive dcf-table-striped dcf-w-100%">
				  <thead>
				    <tr>
					  <th>vender en telegram</th>
				      <th>nombre</th>
				      <th>marca</th>
				      <th>imagen chiquita</th>
				    </tr>
				  </thead>
				  <tbody>

<?php

$conn=new SQLite3('poimycoleccion/ejcmtmv.db') or die("Unable to open database!");
$query=$conn->query("SELECT * FROM figuras where id_usuario='".$id_usuario."'");
//$results = $conn->exec($query);
while($row=$query->fetchArray()){
	echo ' <tr>';
	echo '<th scope="row" class="btn-hacia-abajo">   <a href="generar_venta_telegram.php?figId='.$row["id_figura_mfc"].'" class="btn">vender en telegram &#8628</a></th>';
	echo '<th scope="row" class="btn-hacia-lado">   <a href="generar_venta_telegram.php?figId='.$row["id_figura_mfc"].'" class="btn">vender en telegram &#8594</a></th>';
	 echo '<td data-label="nombre" class="dcf-table-td">' . $row['nombre_figura'] . '</td>';
        echo '<td data-label="marca" class="dcf-table-td">' . $row['marca'] . '</td>';
        $result = $conn->querySingle("select thumbnail from imagenes_figuras where id_figura='".$row['id_figura_mfc']."'");
        echo '<td data-label="imagen chiquita" class="dcf-imagen"><img src="' . $result . '"/></td>';
    echo ' </tr>';

    }
?>
				  </tbody>
				</table>
					
          	 </div>
	



    <!-- Content wrapper end -->
 <div class="text-left"> <!-- text-right = text-align: right -->
		    <a href="logout.php" class="btn">logout</a>
		  </div>
  </div>
  <!-- Page wrapper end -->

		
	</div>




</body>	
</html>
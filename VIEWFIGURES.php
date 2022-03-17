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
	</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars dark-mode" >
  <div class="page-wrapper with-navbar">
    <div class="sticky-alerts"></div>
    <nav class="navbar">
    <h1><a href="HOME.php">VOLVER</a></h1>
    </nav>

<!-- Content wrapper start -->
    <div class="content-wrapper">

            <div class="card h-lg-auto overflow-y-lg-auto"> 
              <h2 class="card-title-form-index">listado figuras</h2>
               <table class="table table-no-outer-padding">
				  <thead>
				    <tr>
				      <th>nombre</th>
				      <th class="">marca</th>
				      <th class="text-right">imagen chiquita</th>
				    </tr>
				  </thead>
				  <tbody>

<?php

$conn=new SQLite3('poimycoleccion/ejcmtmv.db') or die("Unable to open database!");
$query=$conn->query("SELECT * FROM figuras where id_usuario='".$id_usuario."'");
//$results = $conn->exec($query);
while($row=$query->fetchArray()){
	echo ' <tr>';
	 echo '<td>' . $row['nombre_figura'] . '</td>';
        echo '<td>' . $row['marca'] . '</td>';
        $result = $conn->querySingle("select thumbnail from imagenes_figuras where id_figura='".$row['id_figura_mfc']."'");
        echo '<td><img src="' . $result . '"/></td>';
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




  <script src="halfmoon/js/halfmoon.min.js"></script>
</body>	
</html>
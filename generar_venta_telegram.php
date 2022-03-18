
<?php
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
	$id_usuario = $_SESSION['user_id'];
	$id_figura = $_GET['figId']; 


$conn=new SQLite3('poimycoleccion/ejcmtmv.db') or die("Unable to open database!");
$query=$conn->querySingle("SELECT nombre_figura FROM figuras where id_usuario='".$id_usuario."' and id_figura_mfc='".$id_figura."'");
 $result = $conn->querySingle("select thumbnail from imagenes_figuras where id_figura='".$id_figura."'");
?>





<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="halfmoon/css/halfmoon-variables.css"/>
	</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars dark-mode" >
<script>
function myCopyFunction() {
  var myText = document.createElement("textarea")
  myText.value = document.getElementById("txtventa").innerHTML;
  myText.value = myText.value.replace(/&lt;/g,"<");
  myText.value = myText.value.replace(/&gt;/g,">");
  document.body.appendChild(myText)
  myText.focus();
  myText.select();
  document.execCommand('copy');
  document.body.removeChild(myText);
  var notificacion = document.getElementById("notificacion");
  var notoficaciont="copiado al portapales";
  notificacion.append(notoficaciont);
}
</script>
	 <!-- Page wrapper start -->
  <div class="page-wrapper">

    <!-- Content wrapper start -->
    <div class="content-wrapper">
    	    <nav class="navbar">
    	    	<h1><a href="home.php">VOLVER</a></h1>
    </nav>

 		
          <div class="col-lg-12">

			<div class="card  h-lg-auto overflow-y-lg-auto"> 
			<h2 class="card-title-form-index">generar venta telegram</h2>
			 <p>generar texto para facilitar la vida a los admins del canal de ventas de hobby figuras</p>
			<form action="" method="POST">
			  <!-- First row -->
			  <div class="form-row row-eq-spacing-sm">
			    <div class="col-sm">
			    	<input type="hidden" class="form-control" id="figId" name="figId" value="<?php echo $id_figura?>"> 
			      <label for="nombre_fig" class="required">Nombre de la figura</label>
			      <input type="text" class="form-control" name="nombreFig"id="nombreFig" value="<?php echo $query?>"" required="required">
			    </div>
			  </div>

			  <!-- Second row container -->
			 <div class="form-row row-eq-spacing-sm">
			    <div class="col-sm">
			      <label for="descripcion" class="required">Descripcion</label>
			      <textarea class="form-control" placeholder="Descripcion" placeholder="descripcion" id="descripcion" name="descripcion" required="required"></textarea>
			    </div>
			    <div class="col-sm">
			      <label for="estado">Estado de la figura</label>
			       <textarea class="form-control" placeholder="estado" placeholder="estado" id="estado" name="estado" required="required"></textarea>
			    </div>
			  </div>

			  <!-- Third row container -->
			   <div class="form-row row-eq-spacing-sm">
			    <div class="col-sm">
			      <label for="ubicacion" class="required">Ubicacion</label>
			       <input type="text" class="form-control" placeholder="ubicacion" id="ubicacion" name="ubicacion" required="required">
			    </div>
			     <div class="col-sm">
			      <label for="precio" class="required">Precio</label>
			       <input type="text" class="form-control" placeholder="precio" id="precio" name="precio" required="required">
			    </div>
			    <div class="col-sm">
			      <label for="usuario">Usuario de Telegram</label>
			        <input type="text" class="form-control" placeholder="usuario de telegram" id="usuario" name="usuario" required="required">
			    </div>
			  </div>

			  <div class=""> 
			     <button name="generar_venta" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> generar texto</button></center>
			  </div>
			</form>
			<?php include 'formulario_venta_telegram.php'?>


		<div id="notificacion"></div>
		</div>


  </div>
  <!-- Page wrapper end -->


</body>	
</html>
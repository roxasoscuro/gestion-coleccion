<?php

	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
	if(ISSET($_POST['generar_venta'])){
		//$figId = $_POST['figId'];
		$nombreFig = $_POST['nombreFig'];
		$descripcion = $_POST['descripcion'];
		$estado = $_POST['estado'];
		$precio= $_POST['precio'];
		$ubicacion = $_POST['ubicacion'];
		$usuario = $_POST['usuario'];

		$telTitulo = sprintf("**Título:** %s\n",$nombreFig);
		$telDescripcion = sprintf("**Descripción:** %s\n",$descripcion);;
		$telEstado = sprintf("**Estado:** %s\n",$estado);
		$telPrecio = sprintf("**Precio:** %s\n",$precio);
		$telUbicacion = sprintf("**Ubicación:** %s\n",$ubicacion);

		if(strpos($usuario, '@')){
			$telUsuario = sprintf("**Usuario:** %s\n",$usuario);
		}else{
			$usuariotemp = '@'.$usuario;
			$telUsuario = sprintf("**Usuario:** %s\n",$usuariotemp);
		}
		$telTOTAL = $telTitulo.$telDescripcion.$telEstado.$telPrecio.$telUbicacion;
		//$telTOTAL ="q";
		echo "</br>";
	echo '<textarea id="txtventa" class="form-control " readonly="readonly">'.$telTOTAL.'</textarea>';

	echo'</br><button class="btn btn-lg btn-primary btn-block" id="copyButton" onclick="myCopyFunction()" >copiar al portapapeles</button>';


	}
?>
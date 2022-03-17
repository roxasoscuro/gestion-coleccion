<?php
	//Recuperamos el nombre de la figura, su thumbnail y su imagen principal en buena calidad
	
	error_reporting(E_ERROR);
	$id_usuario = $_SESSION['user_id'];

	if(ISSET($_POST['import_figura_mfc'])){
	$link_figura =$_POST['mfc_figura'];

 $html = file_get_html($link_figura);
 $nombre = $html->find('.headline',0)->plaintext;
  preg_match('/\(([\s\S]+)\)/', $nombre, $output_array);
 $marca = $output_array[1];
 preg_match('/(\d+)/', $link_figura, $output_array);
$idFigura =  $output_array[0];

 $img_total = "https://static.myfigurecollection.net/pics/figure/large/".$idFigura.".jpg";
 $img_thumb = "https://static.myfigurecollection.net/pics/figure/".$idFigura.".jpg";

$headers = @get_headers($img_total);
  
if($headers && strpos( $headers[0], '200')) {$img_total = "https://static.myfigurecollection.net/pics/figure/large/".$idFigura.".jpg";}
else {$img_total = "https://static.myfigurecollection.net/pics/figure/big/".$idFigura.".jpg";}

$conn=new SQLite3('poimycoleccion/ejcmtmv.db') or die("Unable to open database!");
$query="REPLACE INTO `figuras` (id_usuario, nombre_figura, marca) VALUES('$id_usuario', '$nombre', '$marca')";
$conn->exec($query);
$query="REPLACE INTO `imagenes_figuras` (nombre_figura, thumbnail, large) VALUES('$nombre', '$img_thumb', '$img_total')";
$conn->exec($query);

echo "<center><h4 class='text-success'>Successfully added!</h4></center>";
    // clean up memory
    $html->clear();
    unset($html);

}
?>
<?php
//session_start();


	//error_reporting(E_ERROR);
	$id_usuario = $_SESSION['user_id'];
	if(ISSET($_POST['import_cuenta_mfc'])){
		//$username=$_POST['username'];
		$nombre_cuenta =$_POST['mfc_cuenta'];


$campouser = $nombre_cuenta;
set_time_limit(30000);
//TODO

//
// OBTENER POR REGEX LA URL DEL PRODUCTO PARA SACAR LOS DATOS A PARTIR DEL OTRO .PHP E INSERTAR EN BD
//


//FIGURAS
for ($pag = 1; $pag <= 20; $pag++) {	
	$figsOw = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=2&current=keywords&rootId=0&categoryId=-1&output=2&sort=category&order=asc');
	$arrFigOw = $figsOw->find('.item-icon');
	

	 foreach($arrFigOw as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 
		preg_match('/href=["](\S+)["]/', $link_figura, $output_array);
		$link_figura = $output_array[1];

		 $htmlFig = file_get_html($link_figura);
		 //$htmlFig = "file_get_html($link_figura);;";
		 $nombre = $htmlFig->find('.headline',0)->plaintext;
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
		$query2=$conn->querySingle("SELECT COUNT(*) as count FROM `figuras` WHERE `id_usuario`='$id_usuario' AND `nombre_figura`='$nombre'");
		//$row=$query->fetchArray();
		//$count=$row['count'];
		if($query2 == 0){
			$query="REPLACE INTO `figuras` (id_usuario, nombre_figura, marca) VALUES('$id_usuario', '$nombre', '$marca')";
			$conn->exec($query);
			$query="REPLACE INTO `imagenes_figuras` (nombre_figura, thumbnail, large) VALUES('$nombre', '$img_thumb', '$img_total')";
			$conn->exec($query);
		}
		    // clean up memory
		    $htmlFig->clear();
		    unset($htmlFig);
		

	 }

    $figsOw->clear();
    unset($figsOw);

   
 }
  echo "<center><h4 class='text-success'>Successfully ADDED!</h4></center>";
}
/*
	$figsOr = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=1&current=keywords&rootId=0&categoryId=-1&output=2&sort=category&order=asc');

 	$figsWis = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=0&current=keywords&rootId=0&categoryId=-1&output=2&sort=category&order=asc');

	$goodsOw = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=2&current=keywords&rootId=1&categoryId=-1&output=2&sort=category&order=asc');
	
	$goodsOr = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=1&current=keywords&rootId=1&categoryId=-1&output=2&sort=category&order=asc');

 	$goodsWis = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=0&current=keywords&rootId=1&categoryId=-1&output=2&sort=category&order=asc');

	$mediaOw = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=2&current=keywords&rootId=2&categoryId=-1&output=2&sort=category&order=asc');

	$mediaOr = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=1&current=keywords&rootId=2&categoryId=-1&output=2&sort=category&order=asc');

	$mediaWis = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=0&current=keywords&rootId=2&categoryId=-1&output=2&sort=category&order=asc');

	$arrFigOw = $figsOw->find('.item-icon');
	$arrFigOr = $figsOr->find('.item-icon');
	$arrFigWis = $figsWis->find('.item-icon');
	$arrGoodsOw = $goodsOw->find('.item-icon');
	$arrGoodsOr = $goodsOr->find('.item-icon');
	$arrGoodsWis = $goodsWis->find('.item-icon');
	$arrMediaOw = $mediaOw->find('.item-icon');
	$arrMediaOr = $mediaOr->find('.item-icon');
	$arrMediaWis = $mediaWis->find('.item-icon');

	 foreach($arrFigOw as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	echo 'figuras pedidas<br>';
	echo '<br>';
    $figsOw->clear();
    unset($figsOw);

	foreach($arrFigOr as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	echo 'figuras deseadas<br>';
	echo '<br>';
    $figsOr->clear();
    unset($figsOr);


	foreach($arrFigWis as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	echo 'Goods propios<br>';
	echo '<br>';
	$figsWis->clear();
    unset($figsWis);

	foreach($arrGoodsOw as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	echo 'Goods pedidos<br>';
	echo '<br>';
	$goodsOw->clear();
    unset($goodsOw);



	foreach($arrGoodsOr as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	echo 'Goods deseados<br>';
	echo '<br>';
	$goodsOr->clear();
    unset($goodsOr);



	foreach($arrGoodsWis as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	echo 'Media propios<br>';
	echo '<br>';
	$goodsWis->clear();
    unset($goodsWis);


	foreach($arrMediaOw as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	echo 'Media pedidos<br>';
	echo '<br>';
	$mediaOw->clear();
    unset($mediaOw);


	foreach($arrMediaOr as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	echo 'Media deseados<br>';
	echo '<br>';
	$mediaOr->clear();
    unset($mediaOr);


	foreach($arrMediaWis as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	$mediaWis->clear();
    unset($arrMediaWis);



}
/*
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo 'otro <br>';
for ($pag = 1; $pag <= 20; $pag++) {
	 $html = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=1&current=keywords&rootId=0&categoryId=-1&output=2&sort=category&order=asc');
	$arrFig = $html->find('.item-icon');
	 foreach($arrFig as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	    // clean up memory
    $html->clear();
    unset($html);
}
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo 'otro <br>';
for ($pag = 1; $pag <= 20; $pag++) {
	 $html = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=0&current=keywords&rootId=0&categoryId=-1&output=2&sort=category&order=asc');
	$arrFig = $html->find('.item-icon');
	 foreach($arrFig as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	    // clean up memory
    $html->clear();
    unset($html);
}
  





--------------------------------------------------------
  //GOODS
for ($pag = 1; $pag <= 20; $pag++) {	
	 $html = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=2&current=keywords&rootId=1&categoryId=-1&output=2&sort=category&order=asc');
	$arrFig = $html->find('.item-icon');
	 foreach($arrFig as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	    // clean up memory
    $html->clear();
    unset($html);
}
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo 'otro <br>';
  --------------------
for ($pag = 1; $pag <= 20; $pag++) {
	 $html = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=1&current=keywords&rootId=1&categoryId=-1&output=2&sort=category&order=asc');
	$arrFig = $html->find('.item-icon');
	 foreach($arrFig as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	    // clean up memory
    $html->clear();
    unset($html);
}
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo 'otro <br>';
  -----------------------
for ($pag = 1; $pag <= 20; $pag++) {
	 $html = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=0&current=keywords&rootId=1&categoryId=-1&output=2&sort=category&order=asc');
	$arrFig = $html->find('.item-icon');
	 foreach($arrFig as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	    // clean up memory
    $html->clear();
    unset($html);
}



//MEDIA
for ($pag = 1; $pag <= 20; $pag++) {	
	 $html = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=2&current=keywords&rootId=2&categoryId=-1&output=2&sort=category&order=asc');
	$arrFig = $html->find('.item-icon');
	 foreach($arrFig as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	    // clean up memory
    $html->clear();
    unset($html);
}
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo 'otro <br>';
for ($pag = 1; $pag <= 20; $pag++) {
	 $html = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=1&current=keywords&rootId=2&categoryId=-1&output=2&sort=category&order=asc');
	$arrFig = $html->find('.item-icon');
	 foreach($arrFig as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	    // clean up memory
    $html->clear();
    unset($html);
}
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo '<br>';
  echo 'otro <br>';
for ($pag = 1; $pag <= 20; $pag++) {
	 $html = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=0&current=keywords&rootId=2&categoryId=-1&output=2&sort=category&order=asc');
	$arrFig = $html->find('.item-icon');
	 foreach($arrFig as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 echo $link_figura;
	 }
	echo '<br>';
	    // clean up memory
    $html->clear();
    unset($html);
}


*/

















?>

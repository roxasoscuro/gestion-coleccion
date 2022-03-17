<?php
require ('simple_html_dom.php');
	error_reporting(E_ERROR);
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<h5><?php echo $_SESSION['user_id'] ?> <?php echo $_SESSION['user_name'] ?></h5>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PRUEBA IMPRTAR MFC</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		


	<div class="col-md-5">
			<div class="alert alert-info">IMPORTAR DE MFC TODO</div>
			<form action="" method="POST">
				<div class="form-group">
					<label>LINK PERFIL MFC</label>
					<input type="text" name="link_mfc" class="form-control" required="required"/>
				</div>				
				<center><button name="importmfc" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Importar</button></center>
				<?php  //scraping_MFC('https://myfigurecollection.net/item/656326');
				?>
			</form>
			<br />
			<?php //include 'importmfc.php'?>
		</div>
		
<?php
$campouser = "carmen";
set_time_limit(300);

//TODO

//
// OBTENER POR REGEX LA URL DEL PRODUCTO PARA SACAR LOS DATOS A PARTIR DEL OTRO .PHP E INSERTAR EN BD
//


preg_match('/href=["](\S+)["]/', $img_total, $output_array);



//FIGURAS
for ($pag = 1; $pag <= 20; $pag++) {	
	$figsOw = file_get_html('https://myfigurecollection.net/users.v4.php?mode=view&username='.$campouser.'&tab=collection&page='.$pag.'&status=2&current=keywords&rootId=0&categoryId=-1&output=2&sort=category&order=asc');
	$arrFigOw = $figsOw->find('.item-icon');
	

	 foreach($arrFigOw as $figure) {
		$link_figura = $figure->find('a', 0);
		$link_figura = str_replace("/item/", "https://myfigurecollection.net/item/", $link_figura);
		 

		preg_match('/href=["](\S+)["]/', $link_figura, $output_array);

		echo $output_array[1];




	 }
	echo '<br>';
	echo 'figuras pedidas<br>';
	echo '<br>';
    $figsOw->clear();
    unset($figsOw);

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
*/


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




</div>



		<a href="logout.php">logout</a>
	</div>

</body>	
</html>
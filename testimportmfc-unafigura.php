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
			<div class="alert alert-info">IMPORTAR DE MFC</div>
			<form action="" method="POST">
				<div class="form-group">
					<label>LINK MFC</label>
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
 $html = file_get_html('https://myfigurecollection.net/item/656326');
 $nombre = $html->find('.headline',0);
echo  $nombre;
echo  "";

 $img_total = $html->find('.main',0);
 $img_thumb = $html->find('.thumbnail',0);
echo $img_thumb;
preg_match('/(<img[\s\S]+[">])/', $img_total, $output_array);
//echo $output_array[0];
 $img = str_replace("/big/", "/large/", $output_array[0]);

  echo $img;





  
    // clean up memory
    $html->clear();
    unset($html);


?>

</div>



		<a href="logout.php">logout</a>
	</div>

</body>	
</html>
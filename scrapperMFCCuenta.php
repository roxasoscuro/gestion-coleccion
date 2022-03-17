<?php
//session_start();


	//error_reporting(E_ERROR);
	$id_usuario = $_SESSION['user_id'];
	//$id_usuario = 12;
	if(ISSET($_POST['import_cuenta_mfc'])){
		$username=$_POST['username'];
		$nombre_cuenta =$_POST['mfc_cuenta'];
		//$nombre_cuenta ="DyZer";

$time_start = microtime(true); 

$campouser = $nombre_cuenta;
set_time_limit(30000);

$url = "https://myfigurecollection.net/users.v4.php?mode=view&username=".$campouser."&tab=collection&status=2&current=keywords&rootId=0&categoryId=-1&output=0&sort=category&order=asc&page=1";
  
// Use get_headers() function
$headers = @get_headers($url);
  
// Use condition to check the existence of URL
if($headers && strpos( $headers[0], '200')) {
    $status = "URL Exist";

	$array_id_lista_figs = array();
	$array_nombre_lista_figs = array();
	 $ch = curl_init($url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        $info = curl_exec($ch); 
	        curl_close($ch); 
			  unset($ch);

		if(preg_match('/(\d+) items/', $info, $output_array))
		{
			$numTotalPaginas = $output_array[1]/50;
			$numTotalPaginas = round($numTotalPaginas);
			$numTotalPaginas++;
	 	}else  { $numTotalPaginas = 15;  }
	 	unset($info);

	 	for ($pagina=1; $pagina <= $numTotalPaginas ; $pagina++) { 
		$url = "https://myfigurecollection.net/users.v4.php?mode=view&username=".$campouser."&tab=collection&status=2&current=keywords&rootId=0&categoryId=-1&output=0&sort=category&order=asc&page=".$pagina;
	  	
		$ch = curl_init($url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        $pagMFC = curl_exec($ch); 
	        curl_close($ch); 
			unset($ch);
			$division_html = explode("</li>", $pagMFC);
			unset($pagMFC);
			foreach ($division_html as $linea_li) {
				if(preg_match('<img class="stamp-icon" src="https:\/\/static\.myfigurecollection\.net\/pics\/figure\/([\d]+)\.jpg.*alt="([\S\ ]+[\)])">', $linea_li, $output_array))
				{
					$array_id_lista_figs[] = $output_array[1];
					$array_nombre_lista_figs[] = $output_array[2];				
				}
			}	
	 	}
	 	$time_end1 = microtime(true);
	 	$execution_time1 = ($time_end1 - $time_start);
	 	echo $execution_time1;
	 	echo "tiempo1</br>";


$conn=new SQLite3('poimycoleccion/ejcmtmv.db') or die("Unable to open database!");
	 $dbl = new PDO('sqlite:poimycoleccion/ejcmtmv.db');
	 $dbl->beginTransaction();



for ($i=0; $i <count($array_id_lista_figs) ; $i++) { 

		preg_match('/\(([\s\S]+)\)/', $array_nombre_lista_figs[$i], $output_array);
		 $marca = $output_array[1];
	 $img_total = "https://static.myfigurecollection.net/pics/figure/large/".$array_id_lista_figs[$i].".jpg";
	 $img_thumb = "https://static.myfigurecollection.net/pics/figure/".$array_id_lista_figs[$i].".jpg";
	
		$query2=$conn->querySingle("SELECT COUNT(*) as count FROM `figuras` WHERE `id_usuario`='$id_usuario' AND `nombre_figura`='$array_nombre_lista_figs[$i]'");
		if($query2 == 0){
			
			
			$query="INSERT INTO `figuras` (id_usuario, id_figura_mfc, nombre_figura, marca) VALUES('$id_usuario', '$array_id_lista_figs[$i]', '$array_nombre_lista_figs[$i]', '$marca')";
			$dbl->query($query);
			//$conn->exec($query);
			$query="INSERT INTO `imagenes_figuras` (id_figura, thumbnail, large) VALUES('$array_id_lista_figs[$i]', '$img_thumb', '$img_total')";
			//$conn->exec($query);
			$dbl->query($query);


			
		}

}$dbl->commit();


}
else {
    $status = "URL Doesn't Exist";
     echo "<center><h4 class='text-success'>".$status."</h4></center>";
}
   
$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);
echo $execution_time;
  echo "<center><h4 class='text-success'>Successfully ADDED!</h4></center>";
}













?>

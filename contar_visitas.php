<?php
	/*

*/

	$ip = $_SERVER['REMOTE_ADDR'];
	$fecha_visita = date('Ymd');
	#Verificar si existe esta visita en este dia
	
		$sql = "select * from visita where ip='$ip' and fecha_visita='$fecha_visita'";
		$respuesta = $conexion->query($sql);


	if($respuesta->num_rows<1){ 	

			$user_data = file_get_contents("http://api.hostip.info/get_html.php?ip=$ip");
			$sql = "insert into visita(ip,user_data,fecha_visita)values('$ip','$user_data','$fecha_visita')";
			$guardar =  $conexion->query($sql) or die("no se  pudo guardar");
	}








?>
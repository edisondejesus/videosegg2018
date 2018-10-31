<?php



while(true){
	include'conexion.php';
	

	$inicio = rand(1,600);
	$c = rand(450,600);

			echo "inicio $inicio final $c";

		for($i=$inicio;$i<=$c;$i++){
		
						 $time = time();
						$fecha_actual = date('Y-m-d H:i:s',$time);



					$query = "update post set fecha_publicacion='$fecha_actual' where id_post='$i'";
					$conexion->query($query);




		}



			sleep(21600);


				file_put_contents("actualizacion_video.txt", $fecha_actual);
}

?>
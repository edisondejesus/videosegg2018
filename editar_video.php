<?php

include'conexion.php';
	
	$id_user = $_POST['id_user'];
	
	if( isset($_POST['id_user'])){

	$sql = "select * from post where id_user='$id_user' order by fecha_publicacion desc";

	$result = $conexion->query($sql);


	foreach ($result as $key) {
		
			$data[] =  $key;
	}



	echo json_encode($data);
	/*respondiendo datos de la consulta en formato json para
	ser consumido por javascript usando ajax*/

	}


		if(isset($_POST['eliminar_video'])){

			$id = $_POST['eliminar_video'];
			$sql = "delete from post where id_post='$id'";
			$run  = $conexion->query($sql);
			if($run){
				echo "eliminado con exito";
			}

			$conexion->close();

		}

?>
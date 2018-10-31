<?php
	
	include'conexion.php';

	$id = $_POST['id'];
	$comentario = $_POST['comentario'];
	$sql =  "UPDATE comentario  set  texto='$comentario'  where id_comentario='$id'";
	$result =  $conexion->query($sql);
	if($result){

		echo "success";
	}else{
		echo "error no se pudo elimianr el comentario";
	}


?>
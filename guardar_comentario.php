<?php

	include'conexion.php';

$id_post = $_POST['id_post'];
$id_user = $_POST['id_user'];
$comentario  = $_POST['comentario'];

$fecha = date('Ymdhis');
$sql = "insert into  comentario(id_post,id_user,texto,fecha_publicacion)VALUES('$id_post','$id_user','$comentario','$fecha')";

$execute = $conexion->query($sql);

if($execute){

	//echo "guardado exitosamente";
}else{
	echo"error al guardar video";
}










?>
<?php
	include'conexion.php';
	$categoria = $_POST['categoria'];

	$sql = "select * from post where categoria like'%$categoria%'";
	$data = $conexion->query($sql);

	echo $data->num_rows;










?>
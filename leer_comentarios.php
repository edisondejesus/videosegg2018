<?php
	include'conexion.php';

$id_post =$_POST['id_post'];

$sql ="select * from comentario as c inner join user as u on  c.id_user=u.id_user  where c.id_post='$id_post' order by fecha_publicacion desc ";

$ejecutar =  $conexion->query($sql);

foreach ($ejecutar as $key) {
	
		$data[] = $key;

}

echo json_encode($data);




?>
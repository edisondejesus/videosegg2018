<?php

	include'conexion.php';

$action = $_POST['action'];

if($action=="filtro"){
$search = $_POST['search'];

$sql = "select * from post  where titulo like '%$search%' || categoria like '%$search%'  order by fecha_publicacion desc";

$result = $conexion->query($sql);
$count=0;
foreach ($result as $key) {
	$count++;
		$data[] = $key;

			if($count==12){
			break;
		}
}


echo json_encode($data);
}else if($action=="search_all"){


	$sql = "select * from post  order by fecha_publicacion desc ";
	$result = $conexion->query($sql);
	$count=0;
	foreach ($result as $key) {
		$count++;
		$data[] = $key;
		if($count==12){
			break;
		}

	}

		
echo json_encode($data);




}else if($action=="view_pages"){

$page = $_POST['page'];

	$count=0;
	$sql = "select * from  post where page='$page' order by fecha_publicacion desc";
	$result = $conexion->query($sql);

	foreach ($result as $key) {
		$count++;	
		$data[] = $key;
		if($count==12){
			break;
		}
	}


	echo json_encode($data);
	


}





?>
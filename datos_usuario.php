<?php


include'conexion.php';

$accion = $_POST['action'];


if($accion=="cargar_perfil"){

$id_user =$_POST['id_user'];


$sql = "SELECT *FROM user where id_user='$id_user'";

$ejecutar = $conexion->query($sql);

foreach ($ejecutar as $key) {
	
	$data[] = $key; 

}

      echo 	json_encode($data);
 
 $conexion->close();

}else if($accion=="actualizar_perfil"){

	$id_user = $_SESSION['user_id'];

	$usuario  = $_POST['usuario'];
	$password = $_POST['pw'];
	$email = $_POST['email'];

		$foto_name = $_FILES['foto']['name'];
		$foto_tmp  = $_FILES['foto']['tmp_name'];
		$foto_type =$_FILES['foto']['type'];
		$foto_perfil = "imagenes/".basename($foto_name);

	$fuente= explode("/", $foto_type);
	$fuente = $fuente[1];

	if($fuente=="jpeg" || $fuente=="png"){

				move_uploaded_file($foto_tmp,$foto_perfil);

	if($foto_name!=""){
		$updata = "UPDATE user set usuario='$usuario',clave='$password',email='$email',foto_url='$foto_perfil' where id_user='$id_user'";
	}else{
		$updata = "UPDATE user set usuario='$usuario',clave='$password',email='$email' where id_user='$id_user'";

	}
	$exect  = $conexion->query($updata);

	if($exect){
		echo "success";
	}else{

		echo "no success";
	}
 	$conexion->close();
}else{

	echo "Sorry this type of format is not supported try with mp4 png or jpg";
}



 




}




?>
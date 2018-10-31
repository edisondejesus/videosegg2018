<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Porn Egg inicio de session</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/alertify.js"></script>
	<script src="js/alertify.min.js"></script>
	<script src="js/funcion.js"></script>
	<link rel="icon" href="assets/favicon.ico">
	<meta charset="utf-8">
</head>
<body>
<div class="container-fluid">
	<div class="row" style="height:120px; background:#0D0D0D;">
			<div class="col-md-3"  >
				<a href="index.php"><img src="assets/logo.png"  style="height:40px;width: 250px; margin-top:5.5%;"></a>	
			</div>	
			<div class="col-md-4">
				                                     
				<script id="mp_spot_1768281" type="text/javascript">
				    mp_ads_spot_id=1768281;
				    mp_ads_width=950;
				    mp_ads_height=112;
				</script>
				<script src="https://static.trafficjunky.com/js/marketplace.min.js"></script>

			</div>
	</div>	
	
	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-5"><br>
		<br><br><br>
		<h1>Start session</h1>
		<form method="post" action="" enctype="multipart/form-data">
			<input type="text" name="usuario" class="form-control" placeholder="usuario"><br>
			<input type="password" name="clave" class="form-control" placeholder="contraseña"><br>
			<button class="btn btn-primary" name="action" value="logiar">Login</button>

		
		</form>
      </div>
      	<div class="col-md-3"><br><br><br>
							<script id="mp_spot_1768271" type="text/javascript">
				    mp_ads_spot_id=1768271;
				    mp_ads_width=300;
				    mp_ads_height=250;
				</script>
				<script src="https://static.trafficjunky.com/js/marketplace.min.js"></script>

				<script id="mp_spot_1768271" type="text/javascript">
				    mp_ads_spot_id=1768271;
				    mp_ads_width=300;
				    mp_ads_height=250;
				</script>
				<script src="https://static.trafficjunky.com/js/marketplace.min.js"></script>

		</div>

	</div>
	

<?php
	include'conexion.php';
session_start();
if(isset($_SESSION['nombre'])){

	header("location:dashboard.php");
}
	
	if(isset($_POST['action'])=="logiar"){

	
		$email = $_POST['usuario'];
		$clave = $_POST['clave'];

		$consulta ="SELECT * FROM  user where usuario='$email' and clave='$clave'";
		$result = $conexion->query($consulta);
		$count = 0;

		//revision para logiar
		foreach ($result as $key) {
		
		 	$count++;
		 	$nombre = $key['nombre'];
		 	$apellido = $key['apellido'];
		 	$edad = $key['edad'];
		 	$email = $key['email'];
		 	$sexo = $key['sexo'];
		 	$user_id = $key['id_user'];
		 	$usuario = $key['usuario'];
		 	$foto_url =$key['foto_url'];


		}

		if($count>0){
			session_start();
			$_SESSION['nombre'] = $nombre;
			$_SESSION['apellido'] = $apellido;
			$_SESSION['edad'] = $edad;
			$_SESSION['email'] = $edad;
			$_SESSION['sexo'] = $sexo;
 			$_SESSION['user_id'] = $user_id;
 			$_SESSION['usuario']= $usuario;
 			$_SESSION['foto_url'] = $foto_url;

			header("location:dashboard.php");
		}else{
			echo "Usuario y contraseñas incorrectos";
		}


	}
		







?>




</div>
</body>
</html>
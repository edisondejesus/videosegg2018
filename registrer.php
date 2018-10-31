<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrate Ahora</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/alertify.js"></script>
	<script src="js/alertify.min.js"></script>
	<script src="js/funcion.js"></script>
	<script src="js/search.js"></script>
</head>
<body>
	<div class="container-fluid">
	<div class="row">
				<div class="col-md-12" style="height:100px; background:#0D0D0D;" >
					<a href="/index.php"><img src="assets/logo.png"  style=""></a>
				</div>	
	</div>

		<div class="row">
			<div class="col-md-3">
				
		
						
			</div>
			<div class="col-md-5"><br>
			<form method="post" action="">
				<input type="text" name="usuario" placeholder="Usuario" class="form-control"><br>
				<input type="password" name="clave" placeholder="Contraseña" class="form-control"><br>
				<input type="password" name="clave2" placeholder="Repita su contraseña" class="form-control"><br>
				<input type="text" name="email" placeholder="Correo electronico" class="form-control"><br>
				<strong>Select your sex</strong><br>
				<strong>Masculino</strong>
				<input type="radio" name="sexo" checked="true" value="Masculino">
				<strong>Femenino</strong>
				<input type="radio" name="sexo" value="Femenina">
					<strong>Gay</strong>
				<input type="radio" name="sexo" value="Gay"><br><br>
				<button class="btn btn-success" name="registrar">Regitrar</button>
			</form>
			</div>
			<div class="col-md-3"><br>
									<script id="mp_spot_1768271" type="text/javascript">
				    mp_ads_spot_id=1768271;
				    mp_ads_width=300;
				    mp_ads_height=250;
				</script>
				<script src="http://static.trafficjunky.com/js/marketplace.min.js"></script>			
												                                    
					
							<script id="mp_spot_1768271" type="text/javascript">
				    mp_ads_spot_id=1768271;
				    mp_ads_width=300;
				    mp_ads_height=250;
				</script>
				<script src="http://static.trafficjunky.com/js/marketplace.min.js"></script>

				

					
			</div>	
		</div>
<?php
	include'conexion.php';

if(isset($_POST['registrar'])){

	$usuario =$_POST['usuario'];
	$email = $_POST['email'];
	$clave = $_POST['clave'];
	$clave2 = $_POST['clave2'];
	$sexo = $_POST['sexo'];
	$fecha = date('Ymdhis');

	if($sexo=="Masculino"){
	$foto_default="assets/hombre.png"; 
	}else if($sexo=="Femenina"){
		$foto_default="assets/mujer.png";
	}else{

		$foto_default="assets/duroporelculo.png";
	}
	#verif 
	$sql  = "select * from user where usuario='$usuario'";
	$result = $conexion->query($sql);
	$nombre = "disable";
	$apellido ="disable";

	if($clave==$clave2 and $clave!="" and $clave2!="" and $result->num_rows==0){


	$sql = "insert into user(usuario,clave,email,sexo,foto_url,fecha_creacion,nombre,apellido)VALUES(?,?,?,?,?,?,?,?)";
	
	 $ready = $conexion->prepare($sql);
	 $ready->bind_param('ssssssss',$usuario,$clave,$email,$sexo,$foto_default,$fecha,$nombre,$apellido);
	 $ready->execute();

	if($ready){
		session_start();
		session_destroy();

		echo "registrado con exito <a href='login.php'>Inicie Session por aqui!</a>";

	}


	}else{

		echo "<i>Las contraseñas no coinciden</i>";
	}
	if($result->num_rows>0){

		echo "Este usuario ya esta en uso";
	}

}




?>


	</div>
</body>
</html>
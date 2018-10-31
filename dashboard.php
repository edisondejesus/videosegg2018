<!DOCTYPE html>
<html>
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112944763-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112944763-1');
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
	session_start();
if( !isset($_SESSION['user_id']) ){

		header("location:login.php");


}else{

	echo "<input type='hidden' id='id_user'  value='$_SESSION[user_id]'/>";

}




?>

	<title>Registrar porng</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/alertify.js"></script>
	<script src="js/alertify.min.js"></script>
	<link rel="icon" href="assets/favicon.ico">
	<script src="js/dashboard.js"></script>

</head>
<body >
<div class="container-fluid">
	<div class="row">
			<div class="col-md-12" style="height:100px; background:#0D0D0D;" >
				<a href="https://videosegg.com"><img src="assets/logo.png"  style="height:40px;width: 250px; margin-top:2.5%;"></a>
			</div>
	</div>	
	

	<div class="row">
		<div class="col-md-3"><br>
			<div class="panel panel-default">
					<div class="panel-heading">
						<?php
							include'conexion.php';
							$id = $_SESSION[user_id];

							$sql_foto = "select foto_url from user where id_user='$id'";
							$resp = $conexion->query($sql_foto);
							foreach ($resp as $key) {
							
									echo  "<img src='$key[foto_url]' class='img-responsive img-circle'  style='margin:auto; height:80px; width:80px;'>";
							}

						?>
					</div>	
				<div class="panel-body">
						<div class="nav navbar">
				<ul class="nav navbar">
					<li><a href="cerrar_session.php"><img src="assets/key.png" style="height:25px; width:25px;">Closed Session</a></li>
					<li><a id="video"><img src="assets/porn.jpg" style="height:25px; width:25px;"><strong>Edit video</strong></a></li>
					<li id="Upload_video_s"><a><img src="assets/upload.svg" style="height:25px; width:25px;> href="#">Upload Video</a></li>
					<li><a><img src="assets/wait.png" style="height:25px; width:25px;"> Videos pending</a></li>
					<li><a href="index.php"><img src="assets/home.png"  style="height:25px; width:25px;"> Home</a></li>
					<li id="editar_perfil"><a><img src="assets/man-user.png" style="height:25px; width:25px;> href="#">Editar perfil</a></li>
					<li id="favoritos"><a><img src="assets/star.png" style="height:25px; width:25px;> href="#">Favorit</a></li>
				</ul>
			</div>


				</div>
			</div>
		</div>
		<div class="col-md-5" id="dataMain"><br>
			<form method="post" action="" enctype="multipart/form-data">
				<input type="text" maxlength="40" name="titulo" placeholder="titulo del video" class="form-control"><br>
				<strong>Select Category</strong><br><br>
				<div class="panel panel-default">
						<input type="checkbox"  value="Rubias" name="categoria[]"><strong>Rubias</strong>
						<input type="checkbox"  value="Castañas" name="categoria[]"><strong>Castañas</strong>
						<input type="checkbox"  value="Latina" name="categoria[]"><strong>Latinas</strong>
						<input type="checkbox"  value="Porno start" name="categoria[]"><strong>Porn Star</strong>	<input type="checkbox"  value="Amateur" name="categoria[]"><strong>Amateur</strong>
						<input type="checkbox"  value="Sexo Anal" name="categoria[]"><strong>Anal</strong><br>
						<input type="checkbox"  value="Africana" name="categoria[]"><strong>Africanas</strong>
						<input type="checkbox"  value="Hentai" name="categoria[]"><strong>Hentai</strong>
						<input type="checkbox"  value="Gay" name="categoria[]"><strong>Gay</strong>
						<input type="checkbox"  value="Sado" name="categoria[]"><strong>Sado</strong>
						<input type="checkbox"  value="Arabes" name="categoria[]"><strong>Arabes</strong>
						<input type="checkbox"  value="Alemanas" name="categoria[]"><strong>Alemanas</strong>
						<input type="checkbox"  value="Jovenes" name="categoria[]"><strong>Jovenes</strong><br>
						<input type="checkbox"  value="Orgias" name="categoria[]"><strong>Orgias</strong>
				<input type="checkbox"  value="Trios" name="categoria[]"><strong>Trios</strong>
				<input type="checkbox"  value="Milf" name="categoria[]"><strong>Milf</strong>
				<input type="checkbox"  value="Lesbianas" name="categoria[]"><strong>Lesbianas</strong>
				<input type="checkbox"  value="Uniformes" name="categoria[]"><strong>Uniformes</strong>
				<input type="checkbox"  value="POV" name="categoria[]"><strong>POV</strong>
				<input type="checkbox"  value="Mamadas" name="categoria[]"><strong>Mamadas</strong><br>
				<input type="checkbox"  value="Masages" name="categoria[]"><strong>Masages</strong>
				<input type="checkbox"  value="Mature" name="categoria[]"><strong>Mature</strong>
				<input type="checkbox"  value="Doble penetracion" name="categoria[]"><strong>Doble Penetracion</strong>
				<input type="checkbox"  value="Tetonas" name="categoria[]"><strong>Tetonas</strong>
				<input type="checkbox"  value="Gordas" name="categoria[]"><strong>Gordas</strong>
				<input type="checkbox"  value="Publico" name="categoria[]"><strong>Publico</strong><br>

				<input type="checkbox"  value="Negra" name="categoria[]"><strong>Negras</strong>
				<input type="checkbox"  value="Hardcore" name="categoria[]"><strong>Hardcore</strong>
				<input type="checkbox"  value="Pelirrojas" name="categoria[]"><strong>Pelirrojas</strong>
				<input type="checkbox"  value="Interracial" name="categoria[]"><strong>Interracial</strong>
				<input type="checkbox"  value="Shemale" name="categoria[]"><strong>Shemale</strong>
				<input type="checkbox"  value="Creampie" name="categoria[]"><strong>Creampie</strong><br>
				<input type="checkbox"  value="Asiaticas" name="categoria[]"><strong>Asiaticas</strong>
				<input type="checkbox"  value="Cartoon" name="categoria[]"><strong>Cartoon</strong>
				<input type="checkbox"  value="Facial" name="categoria[]"><strong>Facial</strong>
				<input type="checkbox"  value="Parodias" name="categoria[]"><strong>Parodias</strong>
				<input type="checkbox"  value="Culos" name="categoria[]"><strong>Culos</strong><br>
				<input type="checkbox"  value="Latex" name="categoria[]"><strong>Latex</strong>
				<input type="checkbox"  value="Penes grandes" name="categoria[]"><strong>Penes Grandes</strong>
				<input type="checkbox"  value="Aceite" name="categoria[]"><strong>Oiled</strong>
				<input type="checkbox"  value="PornHD" name="categoria[]"><strong>PornHD</strong>
				<input type="checkbox"  value="Fetiche" name="categoria[]"><strong>Fetiche</strong>
				<input type="checkbox"  value="Bukkake" name="categoria[]"><strong>Bukkake</strong>
				<input type="checkbox"  value="Casting" name="categoria[]"><strong>Casting</strong>
				<input type="checkbox"  value="Compilation" name="categoria[]"><strong>Compilation</strong>
				<input type="checkbox"  value="Gangbang" name="categoria[]"><strong>Gangbang</strong>
				<input type="checkbox"  value="Orgasm" name="categoria[]"><strong>Orgasm</strong>
				<input type="checkbox"  value="BBW" name="categoria[]"><strong>BBW</strong>
				<input type="checkbox"  value="Camara Web" name="categoria[]"><strong>Camara Web</strong><br>
				<input type="checkbox"  value="Masturbacion" name="categoria[]"><strong>Masturbacion</strong>
				<input type="checkbox"  value="Brasileñas" name="categoria[]"><strong>Brasileñas</strong>
				<input type="checkbox"  value="Colombianas" name="categoria[]"><strong>Colombianas</strong>
				<input type="checkbox"  value="Squirt" name="categoria[]"><strong>Squirt</strong>
				<input type="checkbox"  value="Jovecintas/Viejos" name="categoria[]"><strong>Jovencitas/Viejos</strong><br>
				<input type="checkbox"  value="Toys" name="categoria[]"><strong>Toys</strong>
				<input type="checkbox"  value="Outdoor" name="categoria[]"><strong>Outdoor</strong>
				<input type="checkbox"  value="Cumshot" name="categoria[]"><strong>Cumshot</strong>
				<input type="checkbox"  value="Pajas" name="categoria[]"><strong>Pajas</strong>
				<input type="checkbox"  value="Vintage" name="categoria[]"><strong>Vintage</strong>



				</div>
			
				<div class="panel panel-default">
					

	
		
				</div>
	
		
				

				<img src="assets/upload.svg" class="img-responsive" id="upload_v" style="margin:auto" width="80">
				<p style="text-align: center; font-size: 18px;">Select video to upload</p>

				<input type="file" name="videos" class="form-control" id="upload_o" style="display: none;"><br>
				<textarea name="descripcion" class="form-control" placeholder="descripcion del contenido"></textarea><br>

				<button class="btn btn-primary" id="publicar_video">Public</button>
			</form>
		</div>
		<br>
		<div class="col-md-3" id="mis_videos">
			<div class="panel panel-default">
				<div class="panel-heading">Planes</div>	
				<div class="panel-body">
							<button class="btn btn-primary">Upgrade Regular 2$ Now</button>
							<button class="btn btn-success" style="margin-top: 3%;">Upgrade Primium 5$ Now</button>
							<button class="btn btn-success" style="margin-top: 3%; background:#FF3399; border:none;">Upgrade Primium Ultra 10$ Now</button>
				</div>


			</div>
			


		</div>


	</div>



		
	</div>






</div>
<?php

	

	if( isset($_POST['titulo'])!="" )
	{
			require('guardar_video.php');

	}

	if(isset($_FILES['foto'])){

		require('datos_usuario.php');



	}



?>



</style>
</body>
</html>
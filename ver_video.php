<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112944763-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112944763-1');
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="author" content="videosegg">





<?php   
session_start();  
include'conexion.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data_imagen = "";
   	//Capturar categoria


     $sql = "select * from post where id_post='$id'";
   	$datos = $conexion->query($sql);
   	$title = "";
   	$description = "";
   	$categoria= "";
   	$titulo = "";

   		foreach ($datos as $key) {
   			   			

   			   $data_imagen = $key['ruta_imagen'];
   			   $title = $key['titulo'];
   			   $description = $key['description'];
   			   $categoria = $key['categoria'];
   			   $titulo = $key['titulo'];
   		
   		}





	}




?>


 <script type="text/javascript">
 		var  id_v =  "<?php  echo $id?>";
 		var categoria_v = "<?php echo  $categoria ?>";


  function checkPosition() {
        if(window.matchMedia("(max-width:765px)").matches){

            window.location=`https://videosegg.com/mobil/single.php?id=${id_v}`;
        }


    }




 checkPosition(); 


 </script>

	<title><?php echo $title; ?> - VideosEgg.com</title>
	<meta property="og:title" content="How to change the address bar color in Chrome, Firefox, Opera, Safari" />
	  <meta name="keywords" content="<?php  echo $categoria." ".$titulo; ?>">
<meta property="og:description" content="<?php  echo $description;  ?>" />
<meta name="description" content="<?php echo $description; ?>">
    <meta property="og:title" content="<?php echo $title; ?>">

<meta name="theme-color" content="#191919">
<meta property="og:image" content="https://videosegg.com/<?php echo $data_imagen; ?>">

    <meta name="keywords" content="<?php echo $_GET['categoria'] ?>">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/alertify.js"></script>
	<script src="js/alertify.min.js"></script>
	<script src="js/funcion.js"></script>
	<script src="js/ver_video.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/ventana_bienvenida.js"></script>
	<script src="js/bootstrap.min.js"></script>
	 <link rel="icon" href="assets/favicon.ico">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


 <script type="text/javascript">
 	var video;
 	$('document').ready(function(){
 			
 			$('body').scrollTop(500);
 		function  reproducir(){

 			$('#video_ready').append("<div style='position:absolute; height:100px; width:80px;color:white;top:41%; left:44%;' id='reproducir'><div>");
 			$('#reproducir').css("background","black");
 			$('#reproducir').css("width","90px");
 			$('#reproducir').css("height","90px");

 			$('#reproducir').click(function(){

 				 video = document.getElementsByTagName("video")[2];
 				video.play();
 				$('#reproducir').remove();

 			});


 		}



 			$('#video_listo').click(function(){

 				 video = document.getElementsByTagName("video")[2];
 				video.pause();

 			});

 	});
 </script>
</head>
<body >
<div class="container-fluid" id="container">

<div class="row" style="background:#0D0D0D">


	<div class="col-md-5">
				 
				<script type="text/javascript">
		var ad_idzone = "2920040",
		   ad_width = "728",
		   ad_height = "90";
		</script>
		<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
		<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920040" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920040&output=img&type=728x90" width="728" height="90"></a></noscript>
					


	</div>
					                                
            
	</div>

</div>		


<div class="row">
	<div class="col-md-9"><br>
		<?php
		session_start();
		include'contar_visitas.php';
			$foto_poster ="";
			$id = $_GET['id'];
			if(isset($_SESSION['nombre'])){

					echo "<input id='id_user' value='$_SESSION[user_id]' type='hidden'>";
			}


				echo "<input id='id_post' value='$id' type='hidden' />";
			$sql = "select * from post as p  inner join user  as us  on p.id_user=us.id_user where id_post='$id'";
			$data = $conexion->query($sql);

			foreach ($data as $key) {

				$foto_poster =$key['ruta_imagen'];
		
				echo "<div style='background:black;' class='panel panel-default' id='video_ready'>

					<div class='panel-heading'>
						<img src='assets/star.png' id='add_favorit' style='height:24px; width:24px; float:right;'>
							<strong>$key[titulo]<strong>
							 <strong style='float:right'>User $key[usuario]</strong>
							</div>
						
							<video class='img-responsive'  id='video_listo' controls width='982' src='$key[ruta_video]' poster='$key[ruta_imagen]'></video>
						<div style='text-align: center;'>
						
					                                            
					<script type='text/javascript'>
					var ad_idzone = '2920040',
						 ad_width = '728',
						 ad_height = '90';
					</script>
					<script type='text/javascript' src='https://ads.exosrv.com/ads.js'></script>
					<noscript><a href='https://main.exosrv.com/img-click.php?idzone=2920040' target='_blank'><img src='https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920040&output=img&type=728x90' width='728' height='90'></a></noscript>
						                                
						            
					      
						</div>

				</div>

					<div class='panel panel-default'>
						<div class='panel-heading'>

							<div class='row'>
								<ul class='nav navbar-nav' style='text-decoration: none;list-style: none;'>
									<li id='show_coments'><a style='cursor:pointer'>View Coments</a></li>
								</ul>
								<img src='assets/like.png' id='like_video' style='height:24px; width:24px; margin-left:75%; margin-top:2%;'><strong id='container_like' style='  margin-top:2%; z-index:5; position:absolute; margin-left:0.8%;'>0</strong>

								<img src='assets/dislike.png' id='dislike' style='height:24px; width:24px; margin-left:80%; margin-top:-4%;'><strong id='container_dislike' style='margin-left:1%; margin-top:-2.2%; z-index:5; position:absolute;'>0</strong>

							</div>
						</div>
				</div>


					<div class='panel panel-default'>
						<div class='panel-heading'>Description</div>
						<div class='panel-body'>
							$key[descripcion]
						</div>
					</div>


				";




			}





		?>

	</div><br>
	<div class="col-md-3">
			<script id="mp_spot_1772971" type="text/javascript">
			    mp_ads_spot_id=1772971;
			    mp_ads_width=300;
			    mp_ads_height=250;
			</script>
			<script src="https://static.trafficjunky.com/js/marketplace.min.js"></script>

		</div>
			 
		<div class="col-md-3">
	
			<script type="text/javascript">
			var ad_idzone = "2920010",
				 ad_width = "300",
				 ad_height = "250";
			</script>
			<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
			<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920010" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920010&output=img&type=300x250" width="300" height="250"></a></noscript>
	</div>				



<div class="col-md-3">
	
			<script id="mp_spot_1772971" type="text/javascript">
		    mp_ads_spot_id=1772971;
		    mp_ads_width=300;
		    mp_ads_height=250;
		</script>
		<script src="https://static.trafficjunky.com/js/marketplace.min.js"></script>
		</div>




</div>

	


</div>
	
	<div class="row">
		<div class="col-md-9" id="coment_now"  style="display: none;">
		<div class="panel panel-default">
		<?php 
			if(isset($_SESSION['usuario'])){
			echo "<div class='panel-heading'>Hacer comentario</div>";
		}else{
			echo "<a href='registrer.php'>Si deseas hacer comentarios debes registrarte</a>";
		}

		?>

				<div class="panel-body">
			<?php

				if(isset($_SESSION['usuario'])){

						echo "<input type='hidden' value='$_SESSION[foto_url]' id='img_url'>";
						echo "<a href='dashboard.php'><img src='$_SESSION[foto_url]' style='float:left; height:55px; width:55px;' class='img-circle image-responsive' /></a>";
						echo "<strong style='float:left; margin-top:1%;'>$_SESSION[usuario] </strong>";	
					}


			?>
				<?php
				if(isset($_SESSION['usuario'])){
						
				echo "<textarea class='form-control' id='comentario' placeholder='comentario'></textarea><br>";
					echo" <button class='btn btn-primary' style='float:right;' id='comentar'>Comentar</button>";
				}
				?>
			</div>
		</div>
			<div  id="comentarios">
		
			<strong>This video no have coments</strong>

		</div>
		</div>
	</div>	

	<div class="row">
			<div class="col-md-12" style="height:200px;" >
				
		<?php

		include'conexion.php';
			$count_view= true;
			$categoria = $_GET['categoria'];
			$corte = explode(",",$categoria);
			$categoria = $corte[0].",".$corte[1];
			$sql2 = "select * from post where categoria like'%$categoria%'";

			$resul2 =  $conexion->query($sql2);
			$count=0;

			foreach ($resul2 as $key) {
				$count+=1;


		         $caracteres = strlen($key[titulo]); 

		        if($caracteres>24){

		            $titulo = substr($key[titulo],0,24);
		            $titulo.="...";

		        }else{

		           $titulo = $key[titulo];

		        }
		        /*
		        	if($count_view==true){
		        	echo "<div class='col-md-2' style='width:280px;'>
		        		<img src='$key[ruta_imagen]'>
		        	</div>";
		        		$count_view=false;
		        	}

		        	*/

				echo"<div class='col-md-2' style='width:280px;'><a href='ver_video.php?id=$key[id_post]&categoria=$key[categoria]'><div >".
		            "<div style='background:black;' class='panel panel-default'> 
		                 <div class='panel-heading'>
		                  <strong style='font-size:12px;'>$titulo</strong>
		                 </div>
		                <div id='video$id'>
		                <img src='$key[ruta_imagen]' style='height:130px;width:100%;' class='img-responsive'>
		                </div>
		                <div class='panel-footer'>$key[duracion]</div>
		            </div>

		        </div></a></div>";
				if($count==8){

					break;
				}


			}



		
		?>



			</div>
		
	</div>
	
	

</div>



</body>
</html>
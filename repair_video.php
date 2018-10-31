<?php
	include'conexion.php';

	$sql = "select * from post";

	$data = $conexion->query($sql);

	foreach ($data as $key) {
	
	


			$fecha_a = date('Ymdhis');
			$new_img = "imagenes/$fecha_a"."portada.jpg";

				//el formato de la imagen de este video es png  sera cambiado por jpg		

			$ruta_video = $key['ruta_video'];

			//$ruta_old_image = $key['ruta_imagen'];

			//ya teniendo la ruta de la imagen vieja borramos esa imagen
			//shell_exec("rm -r $ruta_old_image");
			
			//caputrando el tiempo del video para saber la referencia para caputar la foto
			$tiempo_v = $key['duracion'];
			$tiempo_v = explode(':',$tiempo_v);
			$tiempo_v = $tiempo_v[0];
			$id_v = $key['id_post'];

		
			if($tiempo_v>=02 && $tiempo_v<06){
				

				shell_exec("ffmpeg -i $ruta_video -ss 00:01:20  -vframes 1 $new_img");

			}else if($tiempo_v>=06  && $tiempo_v<15){


				shell_exec("ffmpeg -i $ruta_video -ss 00:02:30  -vframes 1 $new_img");



			}else if($tiempo_v>=15 && $tiempo_v<=26 ){


				shell_exec("ffmpeg -i $ruta_video -ss 00:03:30  -vframes 1 $new_img");

			}else if($tiempo_v<01){

	
					shell_exec("ffmpeg -i $ruta_video -ss 00:00:15  -vframes 1 $new_img");


			}else if($tiempo_v>=1 && $tiempo_v<=2){

					
						shell_exec("ffmpeg -i $ruta_video -ss 00:00:07   -vframes 1 $new_img");

			}else if($tiempo_v>=27  &&  $tiempo_v<=50){

						shell_exec("ffmpeg -i $ruta_video -ss 00:03:30  -vframes 1 $new_img");
			}

			//actualizarlo con la nueva imagen 

			$sql = "update post set ruta_imagen='$new_img' where id_post='$id_v'";
			$change = $conexion->query($sql);


				shell_exec("echo 'video afectado correctamente...'");

				sleep(1);

				shell_exec("clear");






	












	}


	












?>
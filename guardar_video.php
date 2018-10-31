<?php

session_start();

include'conexion.php';


	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$nombreVideo = $_FILES['videos']['name'];
	$rutaTemVideo  = $_FILES['videos']['tmp_name'];
	$tipo_archivo = $_FILES['videos']['type'];
	$tipo_arc = explode("/", $tipo_archivo);
	$tipo_arc = $tipo_arc[1];//aqui esta capturada la fuente en el segundo indice


	/*
	$titulo_count = count($titulo)	;

	if($titulo>40){
		echo "Intento entrar mas caracteres en el titulo";

		return;
	}
	*/
	if(count($titulo)>60){

		die("titulo muy largo");
		return;
	}


	$fecha_a = date('Ymdhis');
	$categoria = $_POST['categoria'];


	$reciduo_video = "previa/$fecha_a"."previa.mp4";

	$rutaImagen = "imagenes/$fecha_a"."portada.jpg";
	$video_completo = "videos/$fecha_a"."videsoegg.mp4";


		$xyz = shell_exec("ffmpeg -i $rutaTemVideo 2>&1");
		$search='/Duration: (.*?),/';
		preg_match($search, $xyz, $matches);
		$explode = explode(':', $matches[1]);
		echo 'Hour: ' . $explode[0];
		echo 'Minute: ' . $explode[1];
		echo 'Seconds: ' . $explode[2];

	 $duracion=$explode[1];
	 $duracion.=":$explode[2]";
	 $duracion_c =  explode(".", $duracion);
	 $duracion = $duracion_c[0];



	#leyendo tiempo del video
	$tiempo_cut = explode(":", $duracion);
	$tiempo_cut = $tiempo_cut[0];
	$fuente_video = explode('.', $nombreVideo);
	$fuente = $fuente_video[1];

if($tipo_arc=="mp4" || $tipo_arc=="avi" || $tipo_arc=="webm" || $tipo_arc=="h264" || $tipo_arc=="mov" || $tipo_arc=="wmv"){


			if($tiempo_cut>=02 && $tiempo_cut<06){
				
						#shell_exec("ffmpeg  -ss 00:01:40 -t 5 -i $rutaTemVideo $reciduo_video" );
				shell_exec("ffmpeg  -ss 0:01:00 -t 2 -i $rutaTemVideo parte1.ts");
				shell_exec("ffmpeg  -ss 0:02:10 -t 2 -i $rutaTemVideo  parte2.ts");
				shell_exec("ffmpeg  -ss 0:03:30 -t 2 -i $rutaTemVideo parte3.ts");
				shell_exec("ffmpeg  -ss 0:05:30 -t 2 -i $rutaTemVideo  parte4.ts");

				shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

				shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:20  -vframes 1 $rutaImagen");

			}else if($tiempo_cut>=06  && $tiempo_cut<15){

					shell_exec("ffmpeg  -ss 0:01:00 -t 2 -i $rutaTemVideo parte1.ts");
				shell_exec("ffmpeg  -ss 0:02:10 -t 2 -i $rutaTemVideo  parte2.ts");
				shell_exec("ffmpeg  -ss 0:04:30 -t 2 -i $rutaTemVideo parte3.ts");
				shell_exec("ffmpeg  -ss 0:10:30 -t 2 -i $rutaTemVideo  parte4.ts");

				shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

				shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:30  -vframes 1 $rutaImagen");



			}else if($tiempo_cut>=15 && $tiempo_cut<=26 ){

				shell_exec("ffmpeg  -ss 0:05:00 -t 2 -i $rutaTemVideo parte1.ts");
				shell_exec("ffmpeg  -ss 0:08:10 -t 2 -i $rutaTemVideo  parte2.ts");
				shell_exec("ffmpeg  -ss 0:10:30 -t 2 -i $rutaTemVideo parte3.ts");
				shell_exec("ffmpeg  -ss 0:14:30 -t 2 -i $rutaTemVideo  parte4.ts");

				shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

				shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:30  -vframes 1 $rutaImagen");



			}else if($tiempo_cut<01){

						shell_exec("ffmpeg  -ss 0:00:10 -t 2 -i $rutaTemVideo parte1.ts");
						shell_exec("ffmpeg  -ss 0:00:20 -t 2 -i $rutaTemVideo  parte2.ts");
						shell_exec("ffmpeg  -ss 0:00:30 -t 2 -i $rutaTemVideo parte3.ts");
						shell_exec("ffmpeg  -ss 0:00:50 -t 2 -i $rutaTemVideo  parte4.ts");
						shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

						shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

					
						shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:15  -vframes 1 $rutaImagen");


			}else if($tiempo_cut>=1 && $tiempo_cut<=2){

						shell_exec("ffmpeg  -ss 0:00:40 -t 2 -i $rutaTemVideo parte1.ts");
						shell_exec("ffmpeg  -ss 0:00:30 -t 2 -i $rutaTemVideo  parte2.ts");
						shell_exec("ffmpeg  -ss 0:01:30 -t 2 -i $rutaTemVideo parte3.ts");
						shell_exec("ffmpeg  -ss 0:00:50 -t 2 -i $rutaTemVideo  parte4.ts");
						shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

						shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

					
						shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:07   -vframes 1 $rutaImagen");

			}else if($tiempo_cut>=27  &&  $tiempo_cut<=50){

						shell_exec("ffmpeg  -ss 0:10:40 -t 2 -i $rutaTemVideo parte1.ts");
						shell_exec("ffmpeg  -ss 0:15:30 -t 2 -i $rutaTemVideo  parte2.ts");
						shell_exec("ffmpeg  -ss 0:18:30 -t 2 -i $rutaTemVideo parte3.ts");
						shell_exec("ffmpeg  -ss 0:25:50 -t 2 -i $rutaTemVideo  parte4.ts");
						shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

						shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

					
						shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:30  -vframes 1 $rutaImagen");
			}

			shell_exec("ffmpeg -i $rutaTemVideo  $video_completo");


		foreach ($categoria as $key) {

				$categorias.= $key.",";
		}

		$id_user = $_SESSION['user_id'];

		$fecha = date('Y/m/d');
		$page=1;
		#contando pages
		$sql = "select * from post";
		$resp = $conexion->query($sql);
		$count=0;
		foreach ($resp as $key) {
			
			$count++;
			if($count==20){
				$page+=1;
			}

		}

		$dato =  explode($nombreVideo, ".");

		if($rutaTemVideo!="" && $titulo!=""){

		#if($dato[1]=="mp4" || $dato[1]=="ts" || $dato[1]=="avi"){

		$sql = "insert into post(titulo,categoria,ruta_video,ruta_imagen,descripcion,id_user,fecha_publicacion,page,previa,duracion)VALUES(?,?,?,?,?,?,?,?,?,?)";
		$ready = $conexion->prepare($sql);
		$ready->bind_param('sssssisiss',$titulo,$categorias,$video_completo,$rutaImagen,$descripcion,$id_user,$fecha,$page,$reciduo_video,$duracion);
		if($ready->execute()){

			echo "success";

		}else{

			echo "error load video";
		}

		#}else{

		#	echo "este archivo no es mp4";
		#}



		}else{

			echo "faltan datos por completar";
		}

}else{

	echo "<strong>We are sorry the type of file that has just been uploaded is not supported. Try these formats AVI, MPG, H264, MOV, WMV as they are the ones we work with<strong>";
}



?>
<?php
#archivo logico preparado
	include'../conexion.php';




class Video {

	public static function url_ready($id_post,$titulo){
        $url_video = "playvideo.php?id=$id_post/$titulo";
        $url_ready = str_replace(' ', '_', $url_video);

        return $url_ready;
      }



      public static function read_page($page,$categoria="",$config=""){
      		global $conexion;

      		if($page==1){


      				$sql = "select * from post  order by fecha_publicacion desc limit 0,21";
      				$data = $conexion->query($sql);

      				foreach ($data as $key) {


      					Video::interfaz_video($key);
      				}




      		}else if($page>1){
      			$limite = 21;
      			$calculo =  ($limite * $page) - $limite;

      				$sql = "select * from post  order by fecha_publicacion desc limit $calculo,$limite";
      				  $data = $conexion->query($sql);


      				foreach ($data as $key) {

      					Video::interfaz_video($key);
      				}
				


      		}else if($categoria!="" && $config=="read_category"){

				    $limite =21;
				    if($page==1){

				        $limite--;
				        $sql ="select * from post   where categoria like'%$categoria%'  order by fecha_publicacion desc limit 0,21 ";

				    }else if($page>1){

				        $inicio = $page * $limite -$limite -1; 

				         $sql ="select * from post   where categoria like'%$categoria%'  order by fecha_publicacion desc limit $inicio,$limite ";
				     }else{

				     	 $sql ="select * from post where categoria like'%$categoria%' order by fecha_publicacion desc limit 0,21";


				     }

					$data = $conexion->query($sql);
	
				  


      				foreach ($data as $key) {

      					Video::interfaz_video($key);
      				}

				
      		}





      }

		public static function interfaz_video($key =[]){

			$titulo	= Video::cortar_titulo($key['titulo'],35);

				$url = Video::url_ready($key['id_post'],$key['titulo']);

					echo "
						<a href=''  >
								<div class='col-md-4 resent-grid recommended-grid slider-top-grids'>
								
			        <div   class='resent-grid-img recommended-grid-img' >

			        		<div id='video$key[id_post]'>
						<a href='$url'><img style='height:190px;' src='https://videosegg.com/$key[ruta_imagen]' ontouchmove='load_preview(`video$key[id_post]`,`$key[previa]`,`single.php?id=$key[id_post]&categoria=$key[categoria]`,`$key[ruta_imagen]`,`$key[duracion]`)' alt='' /></a>
										
			        		</div>
										<div class='time'>
												<p>$key[duracion]</p>
										</div>
											
									<div class='clck'>
										<span class='glyphicon glyphicon-time' aria-hidden='true'></span>
									</div>
								</div>
								<div class='resent-grid-info recommended-grid-info'>
					<p><a href='$url' class='title title-info'>$titulo</a></p>
									<ul>
										<li class='right-list'><p class='views views-info'></p></li>
									</ul>
								</div>
							</div>
							</a>
							
							";


		}

     public static function cortar_titulo($titulo,$hasta,$inicio=0){


            $caracteres = strlen($titulo); 

            if($caracteres>30){

            $titulo = substr($titulo,$inicio,$hasta);
        	
            	return $titulo;

        	}else{


        			return $titulo;

        	}


	}



	public static function crear_paginacion($page="",$categoria="",$config="",$search=""){
		//target 
		global $conexion;
		if($categoria!="" && $config=="categoria_page"){

			$sql = "select count(titulo)cantidad from post where categoria like '%$categoria%'";

		}else if($categoria=="" && $config==""){
			
			$sql = "select count(titulo)cantidad from post";
		
		}else if($config=="search_paginacion" && $search!=""){

	$sql = "select count(titulo)cantidad from post where titulo like '%$search%' || descripcion like '%$search%'";

		}
		$posts = $conexion->query($sql);
		$posts =  mysqli_fetch_object($posts);
		$cantidad = $posts->cantidad;
		$count_page=1;
		$count_post=0;
		echo "<ul class='pagination' style='margin-left:30%;'>
             <li  id='retroceder'><a  href='#'>&laquo;</a></li>";
				

		if($page=="" && $config==""){
				echo "<li ><a href='index.php?page=$count_page' >$count_page</a></li>";
			
				for ($i=0; $i<=$cantidad; $i++) { 
					
					$count_post+=1;
						


					if($count_post==20){

							$count_page+=1;
							if($categoria==""){

								echo "<li ><a href='index.php?page=$count_page' >$count_page</a></li>";

							}else{
							echo "<li ><a href='index.php?page=$count_page&categoria=$categoria'>$count_page</a></li>";

							}

						$count_post=0;
					}



					if($count_page==15){

						break;
					}

				
					


				}



		}else if($page>=1 && $config==""){

			//cuando quieren una pagina mayor que 1

			$count_page = 0;
			$contador=0;
			$romper= 0;
			if($page>3){
					$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2' >$page2</a></li>";
		   }else if($page==3){
		   			$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2' >$page2</a></li>";


		   }else if($page==2){

		   			$page1 = $page -1;
					echo "<li ><a href='index.php?page=$page1'>$page1</a></li>";

		   }
				for ($i=1; $i<=$cantidad; $i++) { 
						
						$count_post+=1;
						
						if($count_post==20){
							
							$count_page++;
							$count_post=0;
						

							if($count_page>=$page){
								$romper++;
								
								if($categoria==""){


										if($count_page==$page){
											echo "<li ><a href='index.php?page=$count_page' style='background:black;'>$count_page</a></li>";
										}else{
												echo "<li ><a href='index.php?page=$count_page' >$count_page</a></li>";

										}

								}else{
										if($count_page==$page){
												echo "<li ><a href='index.php?page=$count_page&categoria=$categoria' style='background:black;'>$count_page</a></li>";

										}else{
													echo "<li ><a href='index.php?page=$count_page&categoria=$categoria'>$count_page</a></li>";

										}	

								}
						     	
					     	}

					
							
						}

					if($romper==13){

						break;
					}

					     	

		



				}






		}else if($categoria!="" && $config=="categoria_page" ){
		#echo "<h1>YO NO TENGO TIEMPO PA PELDER EL TIEMPO";

			$count_page = 0;
			$contador=0;
			$romper= 0;
			if($page>3){
					$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1&categoria=$categoria' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2&categoria=$categoria' >$page2</a></li>";
		   }else if($page==3){
		   			$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1&categoria=$categoria' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2&categoria=$categoria' >$page2</a></li>";


		   }else if($page==2){

		   			$page1 = $page -1;
					echo "<li ><a href='index.php?page=$page1&categoria=$categoria'>$page1</a></li>";

		   }

		 #  echo "<h1>CANTIDAD ACTUAL DE PAGIANAS $cantidad</h1>";


				for ($i=1; $i<=$cantidad; $i++) { 
						
						$count_post+=1;
						
						if($count_post==20){
							
							$count_page++;
							$count_post=0;
						

							if($count_page>=$page){
								$romper++;
								
								if($categoria==""){


										if($count_page==$page){
											echo "<li ><a href='index.php?page=$count_page&categoria=$categoria' style='background:black;'>$count_page</a></li>";
										}else{
												echo "<li ><a href='index.php?page=$count_page&categoria=$categoria' >$count_page</a></li>";

										}

								}else{
										if($count_page==$page){
												echo "<li ><a href='index.php?page=$count_page&categoria=$categoria' style='background:black;'>$count_page</a></li>";

										}else{
													echo "<li ><a href='index.php?page=$count_page&categoria=$categoria'>$count_page</a></li>";

										}	

								}
						     	
					     	}

					
							
						}

					if($romper==13){

						break;
					}

					     	

		



				}


		}else if($search!="" && $config=="search_paginacion"  && $categoria==""){

				$count_page = 0;
			$contador=0;
			$romper= 0;
			if($page>3){
					$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1&search=$search' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2&search=$search' >$page2</a></li>";
		   }else if($page==3){
		   			$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1&search=$search' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2&search=$search' >$page2</a></li>";


		   }else if($page==2){

		   			$page1 = $page -1;
					echo "<li ><a href='index.php?page=$page1&search=$search'>$page1</a></li>";

		   }

		 #  echo "<h1>CANTIDAD ACTUAL DE PAGIANAS $cantidad</h1>";


				for ($i=1; $i<=$cantidad; $i++) { 
						
						$count_post+=1;
						
						if($count_post==20){
							
							$count_page++;
							$count_post=0;
						

							if($count_page>=$page){
								$romper++;
								
								if($categoria==""){


										if($count_page==$page){
											echo "<li ><a href=href='index.php?page=$page&search=$search' style='background:black;'>$count_page</a></li>";
										}else{
									echo "<li ><a href='index.php?page=$page&search=$search'>$count_page</a></li>";

										}

								}else{
										if($count_page==$page){
												echo "<li ><a href='index.php?page=$page&search=$search' style='background:black;'>$count_page</a></li>";

										}else{
													echo "<li ><a href='index.php?page=$page&search=$search'>$count_page</a></li>";

										}	

								}
						     	
					     	}

					
							
						}

					if($romper==13){

						break;
					}

					     	

		



				}





		}




		echo " <li><a href='#' id='siguiente'>&raquo;</a></li>";


	}


	public static function videos_read($ruta_t=""){


		
		global $conexion;

		$sql = "select * from post order by fecha_publicacion desc limit 9 ";

		$data = $conexion->query($sql);

			foreach ($data as $key) {


						Video::interfaz_video($key);

					}





	}



		public static function videos_read_page($page=0){

			global $conexion;
			if($page==1){

				$sql = "select * from post as p inner join user as u on p.id_user=u.id_user limit  0,19 order by desc fecha_publicacion";

				$data = $conexion->query($sql);
				foreach ($data as $key) {
		
							Video::interfaz_video($key);

					}



			}else if($page>1){

					$limite = 22;
					$inicio = ($limite * $page) - $limite;
					$sql = "select * from post as p inner join user as u on p.id_user=u.id_user limit $inicio,$limite order by desc fecha_publicacion";
					$data = $conexion->query($sql);

					foreach ($data as $key) {
		

								Video::interfaz_video($key);
					}






			}
			








		}


		public static function search_video($search){

					global $conexion;
			       $sql = "select * from post where titulo like '%$search%' || categoria like '%$search%' limit 30";
			       $data = $conexion->query($sql);
			      foreach ($data as $key) {
		
			      			Video::interfaz_video($key);

					}


		}


		public static function login($usario,$clave){

				global $conexion;

				$sql  = "select * from user where usuario=? and clave=?";
				$login = $conexion->prepare($sql);
				$login->bind_param('ss',
					$usuario,
					$clave
				);
				$data = $login->execute();
				$data = $data->get_result();

				if($data->num_rows>0){
 					
 					$data = mysqli_fetch_object($data);

					session_start();
					$_SESSION['nombre'] = $data->nombre;
					$_SESSION['apellido'] = $data->apellido;
					$_SESSION['edad'] = $data->edad;
					$_SESSION['email'] = $data->edad;
					$_SESSION['sexo'] = $data->sexo;
		 			$_SESSION['user_id'] = $data->user_id;
		 			$_SESSION['usuario']= $data->usuario;
		 			$_SESSION['foto_url'] = $data->foto_url;


					header("location:dashboard.php");

				}else{

						echo "Usuario y contraseñas incorrectos";

				}





		}

		public static function cargar_data_video($id_video){
			//este metodo retorna un objecto con los metadatos del video

			global $conexion;
				$titulo ="";
				$categoria = "";
				$sql = "select * from post where id_post=?";
				$cargar = $conexion->prepare($sql);
				$cargar->bind_param('i',
					$id_video
			    );
			    $cargar->execute();
			    $data = $cargar->get_result();
			    $data = mysqli_fetch_object($data);

			    return $data;

		}

		public static function cargar_video($id_video){

			global $conexion;
				$titulo ="";
				$categoria = "";
				$sql = "select * from post where id_post=?";
				$cargar = $conexion->prepare($sql);
				$cargar->bind_param('i',
					$id_video
			    );
			    $cargar->execute();
			    $data = $cargar->get_result();
			    $data = mysqli_fetch_object($data);

			   $categoria = $data->categoria;
			   $titulo = $data->titulo;

			    echo "
			    <div class='song'>
						<div class='song-info'>
							<h3>$data->titulo</h3>	
					</div>

						<div class='video-grid'>
							<video  class='img-responsive' id='video_listo' controls width='990' src='https://videosegg.com/$data->ruta_video' poster='https://videosegg.com/$data->ruta_imagen' type='video/webm'></video><br>
						</div>
					</div>

			    ";



		}

		public static function cargar_relacion($categoria){

				
					$cate = explode(",", $categoria);
						$categoria = $cate[0].",".$cate[1];

					global $conexion;
					$sql = "select * from post as p inner join user as u on p.id_user=u.id_user where categoria like '%$categoria%'";
					$data = $conexion->query($sql);


					foreach ($data as $key) {
		

						echo "
						<div class='single-grid-right'>

							<div class='single-right-grids'>

							<div class='col-md-4 single-right-grid-left'>
							<a href='playvideo.php?id=$key[id_post]'><img src='https://videosegg.com/$key[ruta_imagen]' alt='' /></a>
								</div>
								<div class='col-md-8 single-right-grid-right'>
									<a href='single.html' class='title'>$key[titulo]</a>
									<p class='author'><a href='#' class='author'>$key[usuario]</a></p>
									<p class='views'></p>
								</div>
								<div class='clearfix'> </div>
									</div>	
							</div>
							
							";

							

					}

		



		}

		public static function load_category($categoria=""){

			global $conexion;
					$cate = explode(",", $categoria);
						$categoria = $cate[0];
						echo "<h1>$categoria</h1>";

				$sql = "select * from post as p inner join user as u  on p.id_user=u.id_user where p.categoria like '%$categoria%' order by fecha_publicacion desc limit 0,9";

				$data = $conexion->query($sql);

				foreach ($data as $key) {
							
						echo "
										<div class='col-md-3 resent-grid recommended-grid slider-first'>
											<div class='resent-grid-img recommended-grid-img'>
												<a href='single.html'><img src='https://videosegg.com/$key[ruta_imagen]' alt='' /></a>
												<div class='time smalltime slider-time'>
													<p>$key[duracion]</p>
												</div>
												<div class='clck small-clck'>
													<span class='glyphicon glyphicon-time' aria-hidden='true'></span>
												</div>
											</div>
											<div class='resent-grid-info recommended-grid-info'>
												<h5><a href='single.html' class='title'>$key[titulo]</a></h5>
												<div class='slid-bottom-grids'>
													<div class='slid-bottom-grid'>
									<p class='author author-info'><a href='#' class='author'>$key[usuario]</a></p>
													</div>
													<div class='slid-bottom-grid slid-bottom-right'>
														<p class='views views-info'></p>
													</div>
													<div class='clearfix'> </div>
												</div>
											</div>
										</div>";


				}






		}


public static function upload_video($titulo,$descripcion){

	#metodo para subir video

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












		}

		public static  function leer_comentarios($id_post){

			global $conexion;
				$sql ="select * from comentario as c inner join user as u on  c.id_user=u.id_user  where c.id_post=? order by fecha_publicacion desc ";

				$read =$conexion->prepare($sql);
				$read->bind_param('i',$id_post);
				$read->execute();
				$ejecutar = $read->get_result();

				foreach ($ejecutar as $key) {
					
						$data[] = $key;

				}

				echo json_encode($data);







		}




}


































?>
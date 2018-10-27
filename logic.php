<?php
	include'conexion.php';




class Video {

	 function url_ready($id_post,$titulo){
        $url_video = "ver_video.php?id=$id_post/$titulo";
        $url_ready = str_replace(' ', '_', $url_video);

        return $url_ready;
      }



      public static function read_page($page,$categoria="",$config=""){
      		global $conexion;

      		if($page==1){


      				$sql = "select * from post  order by fecha_publicacion desc limit 0,19";
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


					echo "
						<a href=''  >
								<div class='col-md-4 resent-grid recommended-grid slider-top-grids'>
								
			        <div   class='resent-grid-img recommended-grid-img' >

			        		<div id='video$id'>
									<a href='playvideo.php?id=$key[id_post]'><img style='height:190px;' src='../$key[ruta_imagen]' ontouchmove='load_preview(`video$id`,`$key[previa]`,`single.php?id=$key[id_post]&categoria=$key[categoria]`,`$key[ruta_imagen]`,`$key[duracion]`)' alt='' /></a>
										
			        		</div>
										<div class='time'>
												<p>$key[duracion]</p>
										</div>
											
									<div class='clck'>
										<span class='glyphicon glyphicon-time' aria-hidden='true'></span>
									</div>
								</div>
								<div class='resent-grid-info recommended-grid-info'>
					<p><a href='single.php?id=$key[id_post]&categoria=$key[categoria]' class='title title-info'>$titulo</a></p>
									<ul>
										<li class='right-list'><p class='views views-info'>$key[usuario]</p></li>
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



	public static function crear_paginacion($page="",$categoria="",$config=""){
		//target 
		global $conexion;
		if($categoria!="" && $config=="categoria_page"){

			$sql = "select count(titulo)cantidad from post where categoria like '%$categoria%'";

		}else{
			$sql = "select count(titulo)cantidad from post";
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


		public static function search_video($serach){

					global $conexion;
			       $sql = "select * from post where titulo like '%$serach%' || categoria like '%$serach%' limit 30";
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


					header("location:../dashboard.php");

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
							<video  class='img-responsive' id='video_listo' controls width='990' src='../$data->ruta_video' poster='../$data->ruta_imagen' type='video/webm'></video><br>
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
							<a href='playvideo.php?id=$key[id_post]'><img src='../$key[ruta_imagen]' alt='' /></a>
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
												<a href='single.html'><img src='../$key[ruta_imagen]' alt='' /></a>
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





}


































?>
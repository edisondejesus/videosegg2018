<?php
			include'conexion.php';
			$action = $_POST['action'];

			if($action=="load_video"){


					$id_post = $_POST['id_video'];

					$sql = "select * from post where id_post='$id_post'";
					$result = $conexion->query($sql);
					foreach ($result as $key) {
					
						$data[] = $key;

					}
						echo $id_video;
					echo json_encode($data);
		}else if($action=="update_video"){
					if(count($titulo)>60){

						die("titulo muy largo");
						return;
					}


				$id_post = $_POST['id_video'];

				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
		
				$categoria = $_POST['categoria'];

				foreach ($categoria as $key) {

				$categorias.= $key.",";
					
				}



				if($categorias!=""){

						$sql = "update post set titulo='$titulo',descripcion='$descripcion',categoria='$categorias' where id_post='$id_post'";

				}else{

						$sql = "update post set titulo='$titulo',descripcion='$descripcion' where id_post='$id_post'";	

				}
			
		



			
				$result2 = $conexion->query($sql);

				if($result2){
					echo"<i>Datos modificados correctamente</i>";
					sleep(2);
					header("location:dashboard.php");

				}else{
					echo"<i>Error al modificar los datos</i>";

				}





			}






		?>

<?php
if(isset($_POST['load_favorits'])){


			include'conexion.php';
			$id_user = $_POST['id_user'];
			$sql = "select * from favorito inner join post on  post.id_post=favorito.id_video where favorito.id_user='$id_user'";
			$ejecutar = $conexion->query($sql);

			foreach ($ejecutar as $key) {
				
					$data[] = $key;
			}

			echo json_encode($data);
			
			$conexion->close();

}


?>
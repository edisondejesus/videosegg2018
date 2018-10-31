<?php



class Gesto {

	public static function update_coment($id_coment,$text_coment){


		$conexion  = new mysqli('localhost','goro','meteoro2412','videosegg');
		$sql = "update comentario set texto='$text_coment' where id_comentario='$id_coment'";
		$ej = $conexion->query($sql);
		if($ej){
			echo "success";

		}
		$conexion->close();


	}


	public static function favorito_add($video_id,$user_id){
		$conexion  = new mysqli('localhost','goro','meteoro2412','videosegg');


		$fecha = date('Ymdhis');

		#verificando existencia de este usuario con este video

		$sql = "select * from favorito where id_user='$user_id'  and  id_video='$video_id'";
		$datos = $conexion->query($sql);
		if($datos->num_rows<1){
			$sql = "insert into  favorito(id_user,id_video,fecha_favorito)VALUES(?,?,?)";
			$guardar =$conexion->prepare($sql);
			$guardar->bind_param('iis',$user_id,$video_id,$fecha);
			$guardar->execute() or die("error no guardo en favorito");
		}else{

				echo "ya lo tiene como favorito este video";
		}

		

	}

	public static function favorito_drop($id_favorito){
	$conexion  = new mysqli('localhost','goro','meteoro2412','videosegg');


		$sql = "delete from favorito where id_favorito='$id_favorito'";
		$resp = $conexion->query($sql);
		if($resp){

			echo "eliminado de favorito correctamente";
		}

		$conexion->close();
	}

	public  static function like_video($id_video,$user_id){

		if($user_id==""){

				return;
		}
		
		$conexion  = new mysqli('localhost','goro','meteoro2412','videosegg');
		
		$fecha = date('Ymdhis');
		#confir dislike
		$confir = "select * from no_like where id_user='$user_id' and id_video='$id_video'";
		$result = $conexion->query($confir);
		$count=0;
		foreach ($result as $key) { $count++;}
		if($count>0){

			$confir = "delete from no_like where id_user='$user_id' and id_video='$id_video'";
			$ejecutar = $conexion->query($confir) or die("no se pudo borrar");
		}
		#verificar si exite un like en este video
		$verificar = "select * from  like_video where id_video='$id_video' and id_user='$user_id'";
		$respuesta=  $conexion->query($verificar);
		$count=0;
		foreach ($respuesta as $key) {
				$count++;
		}
		if($count==0){

			$sql = "insert into like_video(id_video,id_user,fecha_like)values(?,?,?)";
			$guardar=$conexion->prepare($sql);
			$guardar->bind_param('iis',$id_video,$user_id,$fecha);
			$guardar->execute() or die("no se pudo guardar el like");
			if($guardar){
					echo "like success";
			}
		}else{

			echo "ya te gusta este video";
		}


		

	}

	public  static function no_like($id_user,$id_video){

		if($id_user==""){
			return;
		}

		$conexion  = new mysqli('localhost','goro','meteoro2412','videosegg');
		$fecha = date('Ymdhis');

			$confir = "select * from like_video where id_user='$id_user' and  id_video='$id_video'";
		$result = $conexion->query($confir);
		$count=0;
		foreach ($result as $key) { $count++;}
		if($count>0){

			$confir = "delete from like_video where id_user='$id_user' and  id_video='$id_video'";
			$ejecutar = $conexion->query($confir) or die("no se pudo borrar");

			$sql = "insert into  no_like (id_user,id_video,fecha_no_like)values(?,?,?)";
			$guardar=$conexion->prepare($sql);
			$guardar->bind_param('iis',$id_user,$id_video,$fecha);
			$guardar->execute();
		}


		

	}

	public static function traer_likes($id_video){
		$conexion  = new mysqli('localhost','goro','meteoro2412','videosegg');

			$count=0;

		$sql = "select * from like_video  where id_video='$id_video'";
		$ejecutar = $conexion->query($sql);
		$count=0;

		foreach ($ejecutar as $key) {
				
			$count++;

		}

		echo $count;

	}

	public static function traer_noLike($id_video){
				$conexion  = new mysqli('localhost','goro','meteoro2412','videosegg');

		$sql = "select * from no_like where id_video='$id_video'";
		$result = $conexion->query($sql);
		echo $result->num_rows;



	}





}



	


?>
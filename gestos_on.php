<?php
	include'gestos.php';
$action = $_POST['action'];

	if($action=="save_like"){

		$id_video = $_POST['id_video'];
		$id_user=  $_POST['id_user'];

		Gesto::like_video($id_video,$id_user);


	}else if($action=="load_likes") {
			
		$id = $_POST['id_video'];
		
		Gesto::traer_likes($id);


	}else if($action=="load_dislike") {

		$id_video =$_POST['id_video'];
		Gesto::traer_noLike($id_video);
		
	}else if($action=="agregar_favorito"){

			$id_user = $_POST['id_user'];
			$id_video = $_POST['id_video'];

		Gesto::favorito_add($id_video,$id_user);
	}else if($action=="disklike_video"){
		
			$id_user = $_POST['id_user'];
			$id_video = $_POST['id_video'];

			Gesto::no_like($id_user,$id_video);

	}else if($action=="delete_favorit"){

			$id_favorito = $_POST['id'];
			Gesto::favorito_drop($id_favorito);

	}else if($action=="update_coment"){
		$id_comentario = $_POST['id_comentario'];
		$text=  $_POST['text_coment'];
		Gesto::update_coment($id_comentario,$text);

	}



?>
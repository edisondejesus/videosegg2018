function add_favorit(id_video,id_user){

	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			action:"agregar_favorito",
			id_video:id_video,
			id_user:id_user
		}


	}).done(function(resp){


		console.log(resp);

	});






}

function modificar_comentario(id){

	var img_url = $('#img_url').val();
	$('body').scrollTop(-500);

	var comentario_new = `
	<div class='panel panel-default col-md-8' id='update_coment_w'  style='z-index:5;position:absolute; top:-400px; box-shadow:black 1px 1px 1px 1px;'>
			<div'>
				<textarea class='form-control' cols='10' rows='5' id='text_coment'>
				</textarea><img src='${img_url}' width='50' class='img-circle'>
				<button id='actualizar_comentario' class='btn btn-primary'>Actualizar</button>
				<button id='cancelar_acutalizar' class='btn btn-primary'>Cancelar</button>

			</div>
	</div>
	`;	

	$('#comentarios').append(comentario_new);
	$('#actualizar_comentario').click(function(){


		$.ajax({
			url:"../gestos_on.php",
			type:"post",
			data:{
				action:"update_coment",
				text_coment:$('#text_coment').val(),
				id_comentario:id
			}

		}).done(function(resp){
							alertify.success(resp);
						leer_comentarios();


		});



	});

	$('#cancelar_acutalizar').click(function(){

		$('#update_coment_w').hide('slow');

	});


}




function no_like(id_video,id_user){

	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			action:'disklike_video',
			id_video:id_video,
			id_user:id_user
		}


	}).done(function(resp){


		console.log(resp);	
			traer_dislike($('#id_post').val());


	});





}







function like_video(id_video,id_user){

	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			action:"save_like",
			id_video:id_video,
			id_user:id_user
		}


	}).done(function(resp){
	console.log(resp);

			traer_dislike(id_video);

	});




}


function traer_likes(id){
	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			id_video:id,
			action:'load_likes'
			
		}


	}).done(function(resp){
			
			$("#container_like").html(resp);
					traer_likes($('#id_post').val());


	});



}

function traer_dislike(id_video){
	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			id_video:id_video,
			action:'load_dislike'
		}

	}).done(function(resp){

			if(resp==""){
							$('#container_dislike').html("0");


			}else{

				$('#container_dislike').html(resp);

			}
	});



}







function actualizar_datos(comentario,id_comentario){


	$.ajax({
		url:'../actualizar_comentario.php',
		type:'post',
		data:{
			id_comentario:id_comentario,
			comentario:comentario

		}

	}).done(function(resp){

		alertify.success("hola");

	});




}


function leer_comentarios(){

		var id_user = $('#id_user').val();

			$.ajax({
				url:'../leer_comentarios.php',
				type:'post',
				data:{
					id_post:$('#id_post').val()
				}

			}).done(function(resp2){

				var comentario="";
				var data = JSON.parse(resp2);

				for(i=0;i<data.length;i++){

						comentario+="<div class='panel panel-default'>";
						comentario+="<div class='panel-heading'>"+data[i].usuario+"";
						if(data[i].id_user==id_user){
		
							comentario+=`
							<div class="dropdown" style='float:right'>
							  <img  class='dropdown-toggle' data-toggle="dropdown" src='../assets/menu.png'>					
							  <ul class="dropdown-menu">`;
							 comentario+="<li><a onclick=eliminar_video("+data[i].id_comentario+")>Eliminar</a></li>";
							 comentario+=`<li><a onclick='modificar_comentario(${data[i].id_comentario})'>Modificar</a></li>`;
							comentario+=`
							  </ul>
							</div>
							`;
						}	
						comentario+="</div>";
						comentario+="<div class='panel-body'>"+data[i].texto+"";
						comentario+=`<img  style='height:50px; width:50px;  float:left' src='../${data[i].foto_url}' class='img-circle'>`;
						comentario+="<strong style='float:right'>"+data[i].fecha_publicacion+"</strong>";
						comentario+="</div></div>";


				}

				$('#comentarios').html(comentario);


			});


	}



	function eliminar_video(eliminar){

		alertify.confirm("estas seguro que quieres eliminar el comentario?",function(){

			$.ajax({
			url:'../eliminar_comentario.php',
			type:'post',
			data:{
				id:eliminar
			}


		}).done(function(resp){


				if(resp=="success"){
					alertify.success("comentario eliminado");
					
				}else{
						alertify.error("error al eliminar");
				}

				leer_comentarios();

		});


		},
		function(){

		}


		)

		




	}



$('document').ready(function(){
 	
 	var count=true;

	$('#show_coments').click(function(){


			if(count==true){

					$('#coment_now').show('slow');
					count=false;
			}else{

				$('#coment_now').hide('slow');
				count=true;
			}	

	});

	
	traer_likes($('#id_post').val());
		traer_dislike($('#id_post').val());
	

	$('#add_favorit').click(function(){
			$('#add_favorit').css("box-shadow","orange 1px 1px 1px 1px");
			$('#add_favorit').css("border-radius","100px");
			add_favorit($('#id_post').val(),$('#id_user').val());

	});

	$('#dislike').click(function(){

		$('#dislike').css("box-shadow","3px 3px 3px #D42BA8");
		$('#dislike').css("border-radius","100px");
		no_like($('#id_post').val(),$('#id_user').val());


	});

	$('#like_video').click(function(){

		$('#like_video').css("box-shadow","3px 3px 3px #D42BA8");
		$('#like_video').css("border-radius","100px");
		like_video($('#id_post').val(),$('#id_user').val());

	})


	$('#comentar').click(function(){

		if($('#comentario').val()!=""){

		

			$.ajax({
				url:'../guardar_comentario.php',
				type:'post',
				data:{
					id_post:$('#id_post').val(),
					id_user:$('#id_user').val(),
					comentario:$('#comentario').val()
				}


			}).done(function(resp){

					$('#comentarios').trigger('click');
					leer_comentarios();

			});


			

			$('#comentario').val("");

		}

	});



	


leer_comentarios();


/*
 $('#editar_perfil').click(function(){

 	alert("hola");

 });

*/


});
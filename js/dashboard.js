var count_v=0;
function load_favorit(){

		$.ajax({
		url:"load_favorits.php",
		type:"post",
		data:{
			id_user:$('#id_user').val(),
			load_favorits:true
		}

	}).done(function(resp){

		var data = JSON.parse(resp);
		var adaptador="";
		for(i=0;i<data.length;i++){
			adaptador+=`<br>`;
			adaptador+=`
			<div class='panel panel-default'>	
			<div class='panel-heading'>${data[i].titulo}</div>
				<div class='panel-body' >
					<video src='${data[i].ruta_video}' class='img-responsive' controls='true' width='500' ></video>
				</div>
				<div class='panel-footer'>
					${data[i].descripcion}
						<a href='ver_video.php?id=${data[i].id_post}&categoria=${data[i].categoria}'><br><button class='btn btn-primary' style='border:none; background:#FF3399; border-color:#FF3399;'>See More</button></a>
				<button style='float:right; border:none; background:#FF3399; border-color:#FF3399;' class='btn btn-warning' onclick='eliminar_favorito(${data[i].id_favorito})'>Delete</button>
				</div>

			</div>
			`;	


		}
		$('#dataMain').html(adaptador);


	});
}

	function eliminar_video(id_video){

		alertify.confirm('eliminar video','Deseas eliminar este video',function(){

			
					$.ajax({
						url:'editar_video.php',
						type:'post',
						data:{
							eliminar_video:id_video
						}
					}).done(function(resp){

							$('#video').trigger('click');
							alertify.success(resp);
					});

		},function(){


		});




	}

	function editar_video(id_video){
		var id = id_video;
		//load data video
		var datos;
		$.ajax({
			url:"editando_video.php",
			type:"post",
			data:{
				action:'load_video',
				id_video:id_video
			}

		}).done(function(resp){
				console.log(resp);

				var editar_video
				datos =  JSON.parse(resp);
				
				datos.forEach(function(key){

						editar_video =`
						<form method='post' action='editando_video.php' enctype='multipart/form-data' >
						<strong>Titulo</strong><br>
						<input type='text' name='titulo' id='titulo' value='${key.titulo}' class='form-control'/><br>
							<strong>Descripcion</strong>
							<textarea class='form-control' name='descripcion'>${key.descripcion}</textarea>
							<strong>Categoria seleccionada</strong>
							<select name='categoria' class='form-control' id='categoria'>
										<option value='${key.categoria}'>${key.categoria}</option>
								</select><br>
								<strong>Selecione categorias</strong><br><br>
								<input type="checkbox"  value="Rubias" name="categoria[]"><strong>Rubias</strong>
								<input type="checkbox"  value="Latina" name="categoria[]"><strong>Latinas</strong>
								<input type="checkbox"  value="Porno start" name="categoria[]"><strong>Porn Star</strong>
								<input type="checkbox"  value="Amateur" name="categoria[]"><strong>Amateur</strong>
								<input type="checkbox"  value="Sexo Anal" name="categoria[]"><strong>Anal</strong>
								<input type="checkbox"  value="Africana" name="categoria[]"><strong>Africanas</strong>
								<input type="checkbox"  value="Hentai" name="categoria[]"><strong>Hentai</strong>
								<input type="checkbox"  value="Gay" name="categoria[]"><strong>Gay</strong><br>
								<input type="checkbox"  value="Sado" name="categoria[]"><strong>Sado</strong>
								<input type="checkbox"  value="Arabes" name="categoria[]"><strong>Arabes</strong>
								<input type="checkbox"  value="Alemanas" name="categoria[]"><strong>Alemanas</strong>
								<input type="checkbox"  value="Jovenes" name="categoria[]"><strong>Jovenes</strong>
								<input type="checkbox"  value="Orgias" name="categoria[]"><strong>Orgias</strong>
								<input type="checkbox"  value="Trios" name="categoria[]"><strong>Trios</strong>
								<input type="checkbox"  value="Milf" name="categoria[]"><strong>Milf</strong>
								<input type="checkbox"  value="Lesbianas" name="categoria[]"><strong>Lesbianas</strong><br>
								<input type="checkbox"  value="Uniformes" name="categoria[]"><strong>Uniformes</strong>
								<input type="checkbox"  value="POV" name="categoria[]"><strong>POV</strong>
								<input type="checkbox"  value="Mamadas" name="categoria[]"><strong>Mamadas</strong>
								<input type="checkbox"  value="Masages" name="categoria[]"><strong>Masages</strong>
								<input type="checkbox"  value="Mature" name="categoria[]"><strong>Mature</strong>
								<input type="checkbox"  value="Doble penetracion" name="categoria[]"><strong>Doble Penetracion</strong><br>
								<input type="checkbox"  value="Tetonas" name="categoria[]"><strong>Tetonas</strong>
								<input type="checkbox"  value="Gordas" name="categoria[]"><strong>Gordas</strong>
								<input type="checkbox"  value="Publico" name="categoria[]"><strong>Publico</strong>
								<input type="checkbox"  value="Negra" name="categoria[]"><strong>Negras</strong>
								<input type="checkbox"  value="Hardcore" name="categoria[]"><strong>Hardcore</strong>
								<input type="checkbox"  value="Pelirrojas" name="categoria[]"><strong>Pelirrojas</strong>
								<input type="checkbox"  value="Interracial" name="categoria[]"><strong>Interracial</strong><br>
								<input type="checkbox"  value="Shemale" name="categoria[]"><strong>Shemale</strong>
								<input type="checkbox"  value="Creampie" name="categoria[]"><strong>Creampie</strong>
								<input type="checkbox"  value="Asiaticas" name="categoria[]"><strong>Asiaticas</strong>
								<input type="checkbox"  value="Cartoon" name="categoria[]"><strong>Cartoon</strong>
								<input type="checkbox"  value="Facial" name="categoria[]"><strong>Facial</strong>
								<input type="checkbox"  value="Parodias" name="categoria[]"><strong>Parodias</strong>
								<input type="checkbox"  value="Culos" name="categoria[]"><strong>Culos</strong><br>
								<input type="checkbox"  value="Penes grandes" name="categoria[]"><strong>Penes Grandes</strong>
								<input type="checkbox"  value="Aceite" name="categoria[]"><strong>Oiled</strong>
								<input type="checkbox"  value="PornHD" name="categoria[]"><strong>PornHD</strong>
								<input type="checkbox"  value="Fetiche" name="categoria[]"><strong>Fetiche</strong>
								<input type="checkbox"  value="Bukkake" name="categoria[]"><strong>Bukkake</strong>
								<input type="checkbox"  value="Casting" name="categoria[]"><strong>Casting</strong>
								<input type="checkbox"  value="Compilation" name="categoria[]"><strong>Compilation</strong>
								<input type="checkbox"  value="Latex" name="categoria[]"><strong>Latex</strong>
								<input type="checkbox"  value="Gangbang" name="categoria[]"><strong>Gangbang</strong>
								<input type="checkbox"  value="Orgasm" name="categoria[]"><strong>Orgasm</strong>
								<input type="checkbox"  value="BBW" name="categoria[]"><strong>BBW</strong>
								<input type="checkbox"  value="Camara Web" name="categoria[]"><strong>Camara Web</strong>
								<input type="checkbox"  value="Masturbacion" name="categoria[]"><strong>Masturbacion</strong>
								<input type="checkbox"  value="Brasileñas" name="categoria[]"><strong>Brasileñas</strong>
								<input type="checkbox"  value="Colombianas" name="categoria[]"><strong>Colombianas</strong>
								<input type="checkbox"  value="Squirt" name="categoria[]"><strong>Squirt</strong>
								<input type="checkbox"  value="Jovecintas/Viejos" name="categoria[]"><strong>Jovencitas/Viejos</strong>
								<input type="checkbox"  value="Toys" name="categoria[]"><strong>Toys</strong>
								<input type="checkbox"  value="Outdoor" name="categoria[]"><strong>Outdoor</strong>
								<input type="checkbox"  value="Cumshot" name="categoria[]"><strong>Cumshot</strong>
								<input type="checkbox"  value="Pajas" name="categoria[]"><strong>Pajas</strong>
								<input type="checkbox"  value="Vintage" name="categoria[]"><strong>Vintage</strong>
							<input type='hidden' name='action' value='update_video'>
							<input type='hidden' name='id_video' value='${key.id_post}'><br><br>
							<button class='btn btn-success' id='update_video'>Update</button>
					
						<form>
						`;

					
				});

		
					$('#dataMain').html(editar_video);

		




		});




	}


function eliminar_favorito(id){


	alertify.confirm("quieres borrar el video de favorito?",
	function(){

			$.ajax({
				url:"gestos_on.php",
				type:"post",
				data:{
					action:"delete_favorit",
					id:id
				}

			}).done(function(resp){

					alertify.success(resp);
					load_favorit();
			});	
	},
	function(){

	}


	);


}


$('document').ready(function(){

	$('#subir_video').click(function(){

		var loading = `
		<div style='position:absolute;z-index:4;left:3%; opacity:0.9;'>
		<strong>Subiendo video<strong><br>
		<img src='assets/loading.gif' width='75'>
		<div>
		`;

		$('#dataMain').append(loading);




	});


$('#video').click(function(){

	$.ajax({
		url:'editar_video.php',
		type:'post',
		data:{
			id_user:$('#id_user').val()
		}



	}).done(function(resp){
		var  videos="<div style='overflow:scroll; height:400px;'>";
	

		data = JSON.parse(resp);
		
		data.forEach(function(dato){

			videos+=`<div class='panel panel-default'>
			<div class='panel-heading'>${dato['titulo']}</div>
			<div class='panel-body'>
			<img src='${dato.ruta_imagen}' style='height:120px; width:400px;' class='img-responsive'>
			<button class='btn btn-success' style='background:#FF3399; border-color:#FF3399;' onclick='editar_video(${dato.id_post})'>Edit</button>
			<button
			class='btn  btn-success'  style='float:right;background:#FF3399;
			 border-color:#FF3399; float:right' onclick='eliminar_video(${dato.id_post})'>Delete</button></div></div>
			`;


		});

		
		videos+=`</div>`;

		$('#mis_videos').html(videos).hide();
				$('#mis_videos').show('slow');




	});





});

$('#publicar_video').click(function(){

	var loading = `<img src='http://videosegg.com/assets/loading.gif' width='75'>`;
	$('#dataMain').append(loading);




});

$('#Upload_video_s').click(function(){

	var load_video =`<br><form method="post" action="" enctype="multipart/form-data">
				<input type="text" maxlength="40" name="titulo" placeholder="titulo del video" class="form-control"><br>
				<strong>Select Category</strong><br><br>
				<input type="checkbox"  value="Rubias" name="categoria[]"><strong>Rubias</strong>
				<input type="checkbox"  value="Latina" name="categoria[]"><strong>Latinas</strong>
				<input type="checkbox"  value="Porno start" name="categoria[]"><strong>Porn Star</strong>
				<input type="checkbox"  value="Amateur" name="categoria[]"><strong>Amateur</strong>
				<input type="checkbox"  value="Sexo Anal" name="categoria[]"><strong>Anal</strong>
				<input type="checkbox"  value="Africana" name="categoria[]"><strong>Africanas</strong>
				<input type="checkbox"  value="Hentai" name="categoria[]"><strong>Hentai</strong>
				<input type="checkbox"  value="Gay" name="categoria[]"><strong>Gay</strong><br>
				<input type="checkbox"  value="Sado" name="categoria[]"><strong>Sado</strong>
				<input type="checkbox"  value="Arabes" name="categoria[]"><strong>Arabes</strong>
				<input type="checkbox"  value="Alemanas" name="categoria[]"><strong>Alemanas</strong>
				<input type="checkbox"  value="Jovenes" name="categoria[]"><strong>Jovenes</strong>
				<input type="checkbox"  value="Orgias" name="categoria[]"><strong>Orgias</strong>
				<input type="checkbox"  value="Trios" name="categoria[]"><strong>Trios</strong>
				<input type="checkbox"  value="Milf" name="categoria[]"><strong>Milf</strong>
				<input type="checkbox"  value="Lesbianas" name="categoria[]"><strong>Lesbianas</strong><br>
				<input type="checkbox"  value="Uniformes" name="categoria[]"><strong>Uniformes</strong>
				<input type="checkbox"  value="POV" name="categoria[]"><strong>POV</strong>
				<input type="checkbox"  value="Mamadas" name="categoria[]"><strong>Mamadas</strong>
				<input type="checkbox"  value="Masages" name="categoria[]"><strong>Masages</strong>
				<input type="checkbox"  value="Mature" name="categoria[]"><strong>Mature</strong>
				<input type="checkbox"  value="Doble penetracion" name="categoria[]"><strong>Doble Penetracion</strong><br>
				<input type="checkbox"  value="Tetonas" name="categoria[]"><strong>Tetonas</strong>
				<input type="checkbox"  value="Gordas" name="categoria[]"><strong>Gordas</strong>
				<input type="checkbox"  value="Publico" name="categoria[]"><strong>Publico</strong>
				<input type="checkbox"  value="Negra" name="categoria[]"><strong>Negras</strong>
				<input type="checkbox"  value="Hardcore" name="categoria[]"><strong>Hardcore</strong>
				<input type="checkbox"  value="Pelirrojas" name="categoria[]"><strong>Pelirrojas</strong>
				<input type="checkbox"  value="Interracial" name="categoria[]"><strong>Interracial</strong><br>
				<input type="checkbox"  value="Shemale" name="categoria[]"><strong>Shemale</strong>
				<input type="checkbox"  value="Creampie" name="categoria[]"><strong>Creampie</strong>
				<input type="checkbox"  value="Asiaticas" name="categoria[]"><strong>Asiaticas</strong>
				<input type="checkbox"  value="Cartoon" name="categoria[]"><strong>Cartoon</strong>
				<input type="checkbox"  value="Facial" name="categoria[]"><strong>Facial</strong>
				<input type="checkbox"  value="Parodias" name="categoria[]"><strong>Parodias</strong>
				<input type="checkbox"  value="Culos" name="categoria[]"><strong>Culos</strong><br>
				<input type="checkbox"  value="Penes grandes" name="categoria[]"><strong>Penes Grandes</strong>
				<input type="checkbox"  value="Aceite" name="categoria[]"><strong>Oiled</strong>
				<input type="checkbox"  value="PornHD" name="categoria[]"><strong>PornHD</strong>
				<input type="checkbox"  value="Fetiche" name="categoria[]"><strong>Fetiche</strong>
				<input type="checkbox"  value="Bukkake" name="categoria[]"><strong>Bukkake</strong>
				<input type="checkbox"  value="Casting" name="categoria[]"><strong>Casting</strong>
				<input type="checkbox"  value="Compilation" name="categoria[]"><strong>Compilation</strong>
				<input type="checkbox"  value="Gangbang" name="categoria[]"><strong>Gangbang</strong>
				<input type="checkbox"  value="Orgasm" name="categoria[]"><strong>Orgasm</strong>
				<input type="checkbox"  value="BBW" name="categoria[]"><strong>BBW</strong>
				<input type="checkbox"  value="Camara Web" name="categoria[]"><strong>Camara Web</strong>
				<input type="checkbox"  value="Masturbacion" name="categoria[]"><strong>Masturbacion</strong>
				<input type="checkbox"  value="Brasileñas" name="categoria[]"><strong>Brasileñas</strong>
				<input type="checkbox"  value="Colombianas" name="categoria[]"><strong>Colombianas</strong>
				<input type="checkbox"  value="Squirt" name="categoria[]"><strong>Squirt</strong>
				<input type="checkbox"  value="Jovecintas/Viejos" name="categoria[]"><strong>Jovencitas/Viejos</strong>
				<input type="checkbox"  value="Toys" name="categoria[]"><strong>Toys</strong>
				<input type="checkbox"  value="Outdoor" name="categoria[]"><strong>Outdoor</strong>
				<input type="checkbox"  value="Cumshot" name="categoria[]"><strong>Cumshot</strong>
				<input type="checkbox"  value="Pajas" name="categoria[]"><strong>Pajas</strong>
				<input type="checkbox"  value="Vintage" name="categoria[]"><strong>Vintage</strong>

				<img src="assets/upload.svg" class="img-responsive" id="upload_v" style="margin:auto" width="80">
				<p style="text-align: center; font-size: 18px;">Select video to upload</p>

				<input type="file" name="videos" class="form-control" id="upload_o" style="display: none;"><br>
				<textarea name="descripcion" class="form-control" placeholder="descripcion del contenido"></textarea><br>

				<button class="btn btn-primary"  id="publicar_video">Public</button>
			</form>`;

			$('#dataMain').html(load_video);

			$('body').scrollTop(800);

			$('#upload_v').click(function(){


		$('#upload_o').trigger('click');
		$('#upload_o').show('slow');


	$('#subir_video').click(function(){

		var loading = `
		<div style='position:absolute;z-index:4;left:3%; opacity:0.9;'>
		<strong>Subiendo video<strong><br>
		<img src='assets/loading.gif' width='75'>
		<div>
		`;

		$('#dataMain').append(loading);




	});




$('#publicar_video').click(function(){



	if(count_v==0){
		count_v=1;

			var loading = `<img src='http://videosegg.com/assets/loading.gif' width='75'>`;
			$('#dataMain').append(loading);
	}



});

});




});



$('#upload_v').click(function(){


		$('#upload_o').trigger('click');
		$('#upload_o').show('slow');

});





$('#favoritos').click(function(){
	/*Cargando mis videos favortios*/

	load_favorit();

});

$('#editar_perfil').click(function(){

	var profile="";
		$.ajax({
			url:'datos_usuario.php',
			type:'post',
			data:{
				id_user:$('#id_user').val(),
				action:"cargar_perfil"
			}

		}).done(function(resp){

				var data = JSON.parse(resp);

			
			for(i=0;i<data.length;i++){

			profile+="<br><form method='post'   enctype='multipart/form-data'";
				profile+="<br><div class='panel panel-default'>";
					profile+="<div class='panel-heading'>Datos personales</div>";
						profile+="<div class='panel-body'>";
							profile+="<strong>Usuario</strong>";
							profile+="<input  class='form-control' type='text' name='usuario'  id='usuario' value='"+data[i].usuario+"'/>";
							profile+="<strong>Contraseña</strong>";
							profile+="<input  class='form-control' type='password' name='pw' id='password' value='"+data[i].clave+"'/>";
							profile+="<strong>Repita su contraseña</strong>";
							profile+="<input  class='form-control' type='password' name='pw' id='password2' value='"+data[i].clave+"'/>";
							profile+="<strong>Correo electronico</strong>";
							profile+="<input  class='form-control' type='text' name='email' id='email' value='"+data[i].email+"'/>";
							profile+="<strong>Cambiar foto de perfil</strong>";
							profile+="<input  class='form-control' name='foto' type='file' id='picture' value='"+data[i].foto_url+"'/>";
							profile+="<br><button name='action' value='actualizar_perfil' class='btn btn-primary'>Modificar datos</button>";
						profile+="</div>";
						profile+="<div class='panel-footer'></div>";
				profile+="</div>";
			profile+="</form>";



			}
		
			$('#dataMain').html(profile);

			

			$('#editar').click(function(){

				if($('#password').val()==$('#password2').val()){

				$.ajax({	
					url:'datos_usuario.php',
					type:'post',
					data:{
						id_user:$('#id_user').val(),
						action:'actualizar_perfil',
						usuario:$('#usuario').val(),
						pw:$('#password').val(),
						email:$("#email").val()
					}


				}).done(function(resp2){

					alert(resp2);


				});


			}else{
				alert("no coienciden");
			}


			});

	


		});
	




 });



});
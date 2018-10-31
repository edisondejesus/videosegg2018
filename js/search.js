
function dafault_search(){	
	$.ajax({
		url:'buscar.php',
		type:'post',
		data:{
			action:"search_all"
		}


	}).done(function(resp){
		console.log(resp);

		var data = JSON.parse(resp);
		var adaptador ="";

		for(i=0;i<data.length;i++){

		adaptador+="<a href='ver_video.php?id="+data[i].id_post+"&categoria="+data[i].categoria+"'><div class='col-md-3'>";
		adaptador+=`<div class='panel panel-default' onmouseover=previa(${data[i].id_post},${data[i].previa}) onmouseout=portada(${data[i].id_post},${data[i].previa})>`;
		adaptador+="<div class='panel-heading'>";
		adaptador+="<strong>"+data[i].titulo+"</strong></div>";

		adaptador+="<img class='img-responsive' src='"+data[i].ruta_imagen+"'style='height:180px; width:346px;'></div>";
		adaptador+="</div></a>";

		}

		$('#datos').html(adaptador);


	});

}



//dafault_search();




function page_read(page){	
	$.ajax({
		url:'buscar.php',
		type:'post',
		data:{
			action:"view_pages",
			page:page
		}


	}).done(function(resp){
		var count=0;
		console.log(resp);

		var data = JSON.parse(resp);
		var adaptador ="";

		for(i=0;i<data.length;i++){
			count+=1;
			
		adaptador+="<a href='ver_video.php?id="+data[i].id_post+"&categoria="+data[i].categoria+"'><div class='col-md-3'>";
		adaptador+=`<div class='panel panel-default' onmouseover='previa(${count},${data[i].previa})' onmouseout='portada(${count},${data[i].previa})'>`;
		adaptador+="<div class='panel-heading'>";
		adaptador+="<strong>"+data[i].titulo+"</strong></div>";

		adaptador+="<img class='img-responsive' src='"+data[i].ruta_imagen+"'style='height:180px; width:346px;'></div>";
		adaptador+="</div></a>";


		}

		$('#datos').html(adaptador);


	});

}





$('document').ready(function(){
//busqueda por dafault

/*


$('#buscar').keypress(function(){
	$.ajax({
		url:'buscar.php',
		type:'post',
		data:{
			action:"filtro",
			search:$('#buscar').val()
		}


	}).done(function(resp){

		var data = JSON.parse(resp);
		var adaptador ="";
		var count=0;

		for(i=0;i<data.length;i++){
			count+=1;

		adaptador+="<a href='ver_video.php?id="+data[i].id_post+"&categoria="+data[i].categoria+"'><div class='col-md-3'>";
		adaptador+=`<div class='panel panel-default' onmouseover=previa(${count},${data[i].previa}) onmouseout=portada(${data[i].id_post},${data[i].previa})>`;
		adaptador+="<div class='panel-heading'>";
		adaptador+="<strong>"+data[i].titulo+"</strong></div>";

		adaptador+="<img class='img-responsive' src='"+data[i].ruta_imagen+"'style='height:180px; width:346px;'></div>";
		adaptador+="</div></a>";



		}

		$('#datos').html(adaptador);


	});








});

*/




});



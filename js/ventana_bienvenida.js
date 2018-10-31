var adentro=0;

function previa(id,previa){
	adentro+=1;

if(adentro==1){
 	var id= `#video${id}`;
 	var hi = previa;

 	$(id).css("background","black");
 	$(id).html(`
		<video src='${hi}'  id='${id}' class='img-responsive' constrols autoplay loop style='height:180px; width:100%;' autoplay='true'>	

 	`);
 }
 		
 var video=document.getElementById(id);	
 	video.muted=true;
}

function portada(id,portada){

	 	var id= `#video${id}`;
	 	adentro=0;
 	$(id).css("background","white");

	var portadada_img = portada;

	 $(id).html(`<img class='img-responsive' src='${portadada_img}' style='height:180px; width:100%;'>`);
 	

}

$('document').ready(function(){


	var ventana_bienvenida =`
	<div id='Advertencia' class='panel panel-default col-md-5';  style='background:black;height:300px;  left:25%; color:white; z-indez:3px; position:fixed; opacity:0.9;'>
		<div >
			<n>Warning</n>
		</div>
		<div class='panel-body'>
			<n>
			Content only for over 18 years
			of age we are not responsible for entering minors
			to this site.<br>
				<img src="assets/logo.png" width='200' stlye='margin:auto'><br>
				<strong style='color:white; margin-left:40%;'>Click here</strong>

			</n>
		</div>





	</div>
	`;


/*
	$('#datos').append(ventana_bienvenida);
	$('#Advertencia').click(function(){

		this.remove();
	});
*/







});
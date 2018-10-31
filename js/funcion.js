$('document').ready(function(){

 var cont=0;

	$('#lupa').click(function(){


		if(cont==0){
			$('#buscar').show(500);		
			cont++;

			$("#buscar").css("margin-left","10%");

		}else{
			cont--;
			$('#buscar').hide(500);	

		}

	});





});
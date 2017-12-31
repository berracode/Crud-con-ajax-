 $(document).ready(function(){
 	$('#finsertar').submit(function(e){ //ACTIVAMOS EL ENVENTO ENVIAR EN EL FORMULARIO
 		e.preventDefault(); //PREVENIMOS QUE SE RECARGUE LA PAGINA, AUNQUE SE PUEDE ENTENDER DE OTRA MANERA. 
 		var data=$(this).serializeArray();// SIRIALAIZ, Para volver los datos del formulario en una matriz de dos columnas name y value
 		data.push({name:'c',value:'insertar'}); //Insertar "Un nuevo registro a la matriz" o agregar un nuevo elemento al conjunto. 
 		$.ajax({
 			url:'php/procesador.php',
 			type: 'POST',
 			data: data,
 			success: function(dat){
 				if (dat==1) {
	 				$('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
	 			    $('input[type=text]').focus();
		 			setTimeout(function(){
		 			$('input[type=text]').val('');
		 			$('input[type=number]').val(''); 
		 			}, 600);
		 			 mostrar(); 
		 			 $('#insertar').show();
	 			}else{
	 			    $('#insertar').html('Hubo un error.');
	 			 	setTimeout(function(){
		 			$('input[type=text]').val('');
		 			$('input[type=number]').val('');
		 			$('#insertar').hide();
		 			}, 600);
	 			}
 			}
 		})
 	});
 })
 
document.getElementById("load").onload = function() {mostrar()};
function ocultarFmod(){
	$('#fmod').hide();
	$('#finsertar').css('display','inline');
}
function mostrar(){
	$.ajax({
		url:'php/procesador.php',
		type: 'get',
		success: function(dat){
      var show = $("#mostrar");
   	  show.html(dat); 
		}
    })//ajax
}
function eliminar(id){
	var idele = id;
    var sub = 'id='+idele;
		$.ajax({
			url:'php/procesador.php?d=delete',
			type: 'POST',
			data: sub,
			success: function(){
				$('#remove').html("<div class='alert alert-danger'><strong>Bien!</strong></div>");
				setTimeout(function(){
				$('#remove').hide();
				}, 700);
				mostrar();
				$('#remove').show();
			}
        })
}
function llevarDatos(name){
	var idm= name;
	var llevar = 'llevar';
		$.ajax({
	            url:   'php/procesador.php',
	            type:  'POST',
                data: {sujeto:idm,ld:llevar},
	            success:  function (response) {
	            	 $('#finsertar').hide();
	                    $('#fmod').css('display','inline');
	                    $("#fmod").html(response);
	            }
	    });
}
function actualizar(){
	 var datosUp = $("#fmod").serializeArray();
 		datosUp.push({name:'u',value:'mod'});
 		$.ajax({
 			url:'php/procesador.php',
 			type: 'POST',
 			data: datosUp			
 		})//ajax
 			.done(function(){ 
 				$('#modificar').html("<div class='alert alert-info'><strong>Actualizado!</strong></div>");	
				$('#fmod').hide();
				setTimeout(function(){
				$('#modificar').hide();
				}, 700);
 				$('#finsertar').css('display','inline');
 			    $('input[type=text]').focus();
	 			mostrar();
		})
}






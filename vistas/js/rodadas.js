/**************************************
EDITAR USUARIO
***************************************/
$(document).on("click", ".btnEditarRodada", function(){

	var idRodada = $(this).attr("idRodada"); //capturo la variable lo que me trae el boton en su atributo id usuario
	console.log("idRodada", idRodada);

	var datos = new FormData();  //clase formdata de javascript
	datos.append("idRodada", idRodada);

	$.ajax({

		url: "ajax/rodadas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuesta", respuesta); //Lo que nos trae la BD

			$("#idRodada").val(respuesta["id"]);
			//$("#editarNombre").html(respuesta["nombre"]);
			$("#editarRuta").val(respuesta["ruta"]);

			//$("#editarCedula").html(respuesta["identificacion"]);
			$("#editarLugar").val(respuesta["lugar"]);
			
			//$("#editarTelefono").html(respuesta["telefono"]);
			$("#editarObs").val(respuesta["observaciones"]);

		}

	});

})


/*=============================================
ACTIVAR Rodada
=============================================*/

$(document).on("click", ".btnActivarRodada", function(){
//$(".tablas").on("click", ".btnActivar", function(){

	var idRodada = $(this).attr("idRodada");
	var estadoRodada = $(this).attr("estadoRodada");

	var datos = new FormData();
 	datos.append("activarId", idRodada);
  datos.append("activarRodada", estadoRodada);

  	$.ajax({

	  url:"ajax/rodadas.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
      	console.log(respuesta);
      		if (respuesta == "ok") {

      			// if(window.matchMedia("(max-width:767px)").matches){

		      		swal({
				      	title: "La rodada ha sido actualizada",
				      	type: "success",
				      	confirmButtonText: "¡Cerrar!"
				   		}).then(function(result) {
						        if (result.value) {
						        	window.location = "rodadas";
						        }
									});
		      	// }
      		}

      		

      }

  	});

  	if(estadoRodada == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('No Realizada');
  		$(this).attr('estadoRodada',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Realizada');
  		$(this).attr('estadoRodada',0);

  	}

})


/*=============================================
ELIMINAR Rodada
=============================================*/
$(document).on("click", ".btnEliminarRodada", function(){

//$(".tablas").on("click", ".btnEliminarUsuario", function(){

  var idRodada = $(this).attr("idRodada");

  swal({
    title: '¿Está seguro de borrar la Rodada?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar rodada!'
  }).then(function(result){

    if(result.value){

    	//redireccionamos la pagina con una variable get enviando el id del usuario y la ruta de la foto
      window.location = "index.php?ruta=rodadas&idRodada="+idRodada

    }

  })

})

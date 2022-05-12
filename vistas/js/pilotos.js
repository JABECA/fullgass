
/**************************************
EDITAR PILOTO
***************************************/
$(document).on("click", ".btnEditarPiloto", function(){

	var idPiloto = $(this).attr("idPiloto"); //capturo la variable lo que me trae el boton en su atributo id usuario
	console.log("idPiloto", idPiloto);

	var datos = new FormData();  //clase formdata de javascript
	datos.append("idPiloto", idPiloto);

	$.ajax({

		url: "ajax/pilotos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuesta", respuesta); //Lo que nos trae la BD
			
			$("#editarNombres").val(respuesta["nombres"]);
			$("#editarApellidos").val(respuesta["apellidos"]);
			$("#editarIdentificacion").val(respuesta["numeroIdentificacion"]);
			$("#editarTelefono").val(respuesta["telefono"]);
			$("#editar_fecha_nacimiento").val(respuesta["fecha_nacimiento"]);
			$("#editar_nombre_contacto").val(respuesta["nombre_contacto"]);
			$("#editar_numero_contacto").val(respuesta["numero_contacto"]);
			$("#editar_fecha_ingreso").val(respuesta["fecha_ingreso"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#passwordActual").val(respuesta["password"]);

			$("#idPiloto").val(respuesta["id"]);
			


		}

	});

})


/*=============================================
ACTIVAR USUARIO
=============================================*/

$(document).on("click", ".btnActivarPiloto", function(){

	var idPiloto = $(this).attr("idPiloto");
	var estadoPiloto = $(this).attr("estadoPiloto");
	var perfil = $(this).attr("perfil");

	console.log("activarId", idPiloto);
	console.log("activarPiloto", estadoPiloto);
	console.log("perfil", perfil);

	if (perfil == 'Administrador') {
			var datos = new FormData();
	 	  datos.append("activarId", idPiloto);
	  	datos.append("activarPiloto", estadoPiloto);

	  	$.ajax({
			  url:"ajax/pilotos.ajax.php",
			  method: "POST",
			  data: datos,
			  cache: false,
		      contentType: false,
		      processData: false,
		      success: function(respuesta){
							swal({
					    	  title: "El piloto ha sido actualizado",
					      	type: "success",
					      	confirmButtonText: "¡Cerrar!"
					    }).then(function(result) {
					    		if (result.value) {
					        	window.location = "pilotos";
					        }
							});
		      }
	  	})

	  	if(estadoPiloto == 0){

	  		$(this).removeClass('btn-success');
	  		$(this).addClass('btn-danger');
	  		$(this).html('Desactivado');
	  		$(this).attr('estadoPiloto',1);
	  	}else{

	  		$(this).addClass('btn-success');
	  		$(this).removeClass('btn-danger');
	  		$(this).html('Activado');
	  		$(this).attr('estadoPiloto',0);
	  	}
	}else{
		swal({
		    	title: 'Oops...',
		    	text: "No estas autorizado para realizar esta accion",
		    	type: "error",
		    	confirmButtonText: "¡Cerrar!"
			}).then(function(result) {
				if (result.value) {
				   	// window.location = "pagos";
				}
			});
	}
	  

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#numeroIdentificacion").change(function(){

	var piloto = $(this).val();

	alert("el numero digitado es: "+ piloto);

	var datos = new FormData();
	datos.append("piloto", piloto);

	 $.ajax({
	    url:"ajax/pilotos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	//console.log("respuesta", respuesta);

	     	if(respuesta){
	    		$("#numeroIdentificacion").parent().after('<div class="alert alert-warning">Este Piloto ya existe en la base de datos</div>');
		     	$("#numeroIdentificacion").val("");
		    }

	    }

	})
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarPiloto", function(){

  var idPiloto = $(this).attr("idPiloto");
  

  swal({
    title: '¿Está seguro de borrar el Piloto?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar piloto!'
  }).then(function(result){

    if(result.value){

    	//redireccionamos la pagina con una variable get enviando el id del usuario y la ruta de la foto
      window.location = "index.php?ruta=pilotos&idPiloto="+idPiloto;

    }

  });

});


/**************************************
EDITAR PILOTO
***************************************/
$(document).on("click", ".btnEditarVehiculo", function(){

	var idVehiculo = $(this).attr("idVehiculo"); //capturo la variable lo que me trae el boton en su atributo id usuario
	console.log("idVehiculo", idVehiculo);

	var datos = new FormData();  //clase formdata de javascript
	datos.append("idVehiculo", idVehiculo);

	$.ajax({

		url: "ajax/vehiculos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){



			console.log("respuesta", respuesta); //Lo que nos trae la BD
			
			$("#id_vehiculo").val(respuesta["id"]);
			$("#editarPiloto").val(respuesta["id_piloto"]);
			$("#editarMarca").val(respuesta["marca"]);
			$("#editarReferencia").val(respuesta["referencia"]);
			$("#editarModelo").val(respuesta["modelo"]);
			$("#editarPlaca").val(respuesta["placa"]);

			


		}

	});

})


/*=============================================
ACTIVAR USUARIO
=============================================*/

$(document).on("click", ".btnActivarVehiculo", function(){

	var idVehiculo = $(this).attr("idVehiculo");
	var estadoVehiculo = $(this).attr("estadoVehiculo");

	console.log("activarId", idVehiculo);
	console.log("estadoVehiculo", estadoVehiculo);

	var datos = new FormData();
 	datos.append("activarId", idVehiculo);
  	datos.append("estadoVehiculo", estadoVehiculo);

  	$.ajax({

	  url:"ajax/vehiculos.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

 

	      		 swal({
			      title: "El vehiculo ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "vehiculos";

			        }


				});


      }

  	})

  	if(estadoVehiculo == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoVehiculo',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoVehiculo',0);

  	}

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#placa").change(function(){

	var placa = $(this).val();

	alert("el numero de placa es: "+ placa);

	var datos = new FormData();
	datos.append("placa", placa);

	 $.ajax({
	    url:"ajax/vehiculos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	//console.log("respuesta", respuesta);

	     	if(respuesta){
	    		$("#nuevaPlaca").parent().after('<div class="alert alert-warning">Esta Placa ya existe en la base de datos</div>');
		     	$("#nuevaPlaca").val("");
		    }

	    }

	})
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarVehiculo", function(){

  var idVehiculo = $(this).attr("idVehiculo");
  

  swal({
    title: '¿Está seguro de borrar el Vehiculo?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar vehiculo!'
  }).then(function(result){

    if(result.value){

    	//redireccionamos la pagina con una variable get enviando el id del usuario y la ruta de la foto
      window.location = "index.php?ruta=vehiculos&idVehiculo="+idVehiculo;

    }

  });

});

/**************************************
SUBIENDO LA FOTO DEL EMPLEADO O USUARIO
***************************************/

$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	console.log("imagen", imagen);

	/**************************************
	validamos el formato de la imagen
	***************************************/
	 if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	 	$(".nuevaFoto").val("");

	 	swal({
	 		title: "Error al subir la imagen",
	 		text: "!La imagen debe estar en formato JPG o PNG",
	 		type:"error",
	 		confirmButtontect: "¡Cerrar!"
	 	})

	 }else if (imagen["size"] > 2000000) {


	 	$(".nuevaFoto").val("");

	 	swal({
				title: "Error al subir la imagen",
	 		text: "!La imagen no debe pesar mas de 2 MB",
	 		type:"error",
	 		confirmButtontect: "¡Cerrar!"
	 	})

	 }else{

	 	var datosImagen = new FileReader;  //clase para lectura de archivo

	 	datosImagen.readAsDataURL(imagen);  //leer como dato URL la variable imagen

	 	$(datosImagen).on("load", function(event){

	 		var rutaImagen = event.target.result;

	 		$(".previsualizar").attr("src", rutaImagen);

	 	})

	 }

})


/**************************************
EDITAR USUARIO
***************************************/
$(document).on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario"); //capturo la variable lo que me trae el boton en su atributo id usuario
	console.log("idUsuario", idUsuario);

	var datos = new FormData();  //clase formdata de javascript
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuesta", respuesta); //Lo que nos trae la BD

			$("#id_User").val(respuesta["id"]);
			//$("#editarNombre").html(respuesta["nombre"]);
			$("#editarNombre").val(respuesta["nombre"]);

			//$("#editarCedula").html(respuesta["identificacion"]);
			$("#editarCedula").val(respuesta["identificacion"]);
			
			//$("#editarTelefono").html(respuesta["telefono"]);
			$("#editarTelefono").val(respuesta["telefono"]);

			$("#editarUsuario").val(respuesta["usuario"]);
			$("#passwordActual").val(respuesta["password"]);


			//$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			
			// $("#editarContacto").html(respuesta["contacto"]);
			$("#editarContacto").val(respuesta["contacto"]);
			
			$("#editarTelefonoContacto").val(respuesta["numero_contacto"]);
			
			$("#editarNivel").html(respuesta["nivel"]);
			$("#editarNivel").val(respuesta["nivel"]);

			$("#editarFoto").val(respuesta["foto"]);

			$("#fotoActual").val(respuesta["foto"]);			

			if (respuesta["foto"] != "") {

			$(".previsualizar").attr("src", respuesta["foto"]);

			}

		}

	});

})


/*=============================================
ACTIVAR USUARIO
=============================================*/

$(document).on("click", ".btnActivar", function(){
//$(".tablas").on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
      	console.log(respuesta);
      	if (respuesta == 'ok') {
      			// if(window.matchMedia("(max-width:767px)").matches){

			      		swal({
						      title: "El usuario ha sido actualizado",
						      type: "success",
						      confirmButtonText: "¡Cerrar!"
						    }).then(function(result) {
					        	if (result.value) {
						        	window.location = "usuarios";
						        }
									});
		      	// }
      	}
      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

	$(".alert").remove();  //los mensajes de alerta son removidos

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		//console.log("respuesta", respuesta);

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarUsuario", function(){

//$(".tablas").on("click", ".btnEliminarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

    	//redireccionamos la pagina con una variable get enviando el id del usuario y la ruta de la foto
      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})

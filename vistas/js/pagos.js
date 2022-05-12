
$(document).on("click", ".btnPagoMes", function(){

	
	var perfil = $(this).attr("perfil");
	var idPago = $(this).attr("idPago");
	var estadoPago = $(this).attr("estadoPago");
	var mesPago = $(this).attr("mesPago");

	console.log("activarId", idPago);
	console.log("estadoPago", estadoPago);
	console.log("mesPago", mesPago);
	console.log("Perfil: ", perfil);

	if (perfil == 'Administrador') {

			var datos = new FormData();
		 	datos.append("activarId", idPago);
		  	datos.append("estadoPago", estadoPago);
		  	datos.append("mesPago", mesPago);

		  	$.ajax({

			  url:"ajax/pagos.ajax.php",
			  method: "POST",
			  data: datos,
			  cache: false,
		      contentType: false,
		      processData: false,
		      success: function(respuesta){
			      		 swal({
					      title: "El pago ha sido aplicado",
					      type: "success",
					      confirmButtonText: "¡Cerrar!"
					    }).then(function(result) {
					        if (result.value) {
					        	// window.location = "pagos";
					        }
						});
		      }
		  	})

		  	if(estadoPago === 0){

		  		$(this).removeClass('btn-success');
		  		$(this).addClass('btn-danger');
		  		$(this).html('Debe');
		  		$(this).attr('estadoPago',1);

		  	}else{

		  		$(this).addClass('btn-success');
		  		$(this).removeClass('btn-danger');
		  		$(this).html('Pago');
		  		$(this).attr('estadoPago',0);

		  	}
	}else{
		swal({
		    	title: 'Oops...',
		    	text: "No estas autorizado para realizar esta accion, tu intento de fraude ha sido registrado",
		    	type: "error",
		    	confirmButtonText: "¡Cerrar!"
			}).then(function(result) {
				if (result.value) {
				   	// window.location = "pagos";
				}
			});
	}
})

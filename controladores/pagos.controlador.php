<?php

class ControladorPagos{
	/*=============================================
	CREAR USUARIO NUEVO
	=============================================*/
	static public function ctrCrearPago(){

			if (isset($_POST["id_piloto"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["enero"]) &&
					preg_match('/^[0-9]+$/', $_POST["id_piloto"]) ){


							$tabla = "pagos";

						
							$datos = array('id_piloto'	=>  $_POST["id_piloto"],
										   'enero'		=>  $_POST["enero"],
										   'febrero' 	=>  $_POST["febrero"],
										   'marzo' 		=>  $_POST["marzo"],
										   'abril' 		=>  $_POST["abril"],
										   'mayo' 		=>  $_POST["mayo"],
										   'junio' 		=>  $_POST["junio"],
										   'julio' 		=>  $_POST["julio"],
										   'agosto' 	=>  $_POST["agosto"],
										   'septiembre' =>  $_POST["septiembre"],
										   'octubre'	=>  $_POST["octubre"],
										   'noviembre' 	=>  $_POST["noviembre"],
										   'diciembre' 	=>  $_POST["diciembre"],
										   'year' 		=>  $_POST["year"]
										 );

							$respuesta = ModeloPagos::mdlIngresarPago($tabla, $datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡El pago ha sido guardado correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "pagos";

												}

											});
							
										</script>';
								}
						
					}else{
					
							echo '<script>
								swal({
									type: "error",
									title: "¡No pueden ir campos vacios o llevar caracteres especiales!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
								}).then((result) => {
									if(result.value){	
										window.location = "pagos";
									}
								});
							

							</script>';		
					}
				

			}
	}
	/*=============================================
	FIN METODO CREAR USUARIO NUEVO
	=============================================*/


	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/
	static public function ctrMostrarPagos($item, $valor){

		$tabla = "pagos";
		$respuesta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMostrarPagosPiloto($item, $valor){

		$tabla = "pagos";
		$respuesta = ModeloPagos::mdlMostrarPagosPiloto($tabla, $item, $valor);

		return $respuesta;

	}



	/*=============================================
	Contar USUARIOS
	=============================================*/
	static public function ctrContarPagos(){

		$tabla = "pagos";
		$respuesta = ModeloPagos::mdlContarPagos($tabla);

		return $respuesta;

	}

	/*=============================================
	Editar USUARIO
	=============================================*/

	static public function ctrEditarPago(){

		if(isset($_POST["editarMarca"])){


					if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMarca"])){
					

							$tabla = "vehiculos";

						
							$datos = array('id_piloto' => $_POST["editarPiloto"],
										   'marca' =>  $_POST["editarMarca"],
										   'referencia' =>  $_POST["editarReferencia"],
										   'modelo' => $_POST["editarModelo"],
										   'placa' => $_POST["editarPlaca"],
										   'id' => $_POST["id_vehiculo"]
										);

							$respuesta = ModeloPagos::mdlEditarPago($tabla, $datos);

							echo json_encode($datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡El pago ha sido editado correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "pagos";

												}

											});
							
										</script>';
							}else{
									echo '<script>
										swal({
											type: "error",
											title: "¡Los datos del pago no pudieron ser modificados!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "pagos";
											}
										});
									

									</script>';	

							}
						
					}else{

								echo '<script>
										swal({
											type: "error",
											title: "¡El mes no puede ir vacio o llevar caracteres especiales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "pagos";
											}
										});
									

									</script>';	



					}



		}

	}


	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarPago(){

		if(isset($_GET["idVehiculo"])){

			$tabla ="vehiculos";
			$datos = $_GET["idVehiculo"];

		
			$respuesta = ModeloPagos::mdlBorrarPago($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El pago ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "pagos";

								}
							})

				</script>';

			}		

		}

	}



}
//final de la clase principal



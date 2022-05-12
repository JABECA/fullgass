<?php

class ControladorVehiculos{
	/*=============================================
	CREAR USUARIO NUEVO
	=============================================*/
	static public function ctrCrearVehiculo(){

			if (isset($_POST["nuevaMarca"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMarca"]) &&
					preg_match('/^[0-9]+$/', $_POST["nuevoPiloto"]) ){


							$tabla = "vehiculos";

						
							$datos = array('id_piloto' => $_POST["nuevoPiloto"],
										   'marca' =>  $_POST["nuevaMarca"],
										   'referencia' => $_POST["nuevaReferencia"],
										   'modelo' => $_POST["nuevoModelo"],
										   'placa' => $_POST["nuevaPlaca"],
										   'estado' => $_POST["estado"]
										 );

							$respuesta = ModeloVehiculos::mdlIngresarVehiculo($tabla, $datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡El vehiculo ha sido guardado correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "vehiculos";

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
										window.location = "vehiculos";
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
	static public function ctrMostrarVehiculosPiloto($item, $valor){

		$tabla = "vehiculos";
		$respuesta = ModeloVehiculos::mdlMostrarVehiculosPiloto($tabla, $item, $valor);

		return $respuesta;

	}


	static public function ctrMostrarVehiculos($item, $valor){

		$tabla = "vehiculos";
		$respuesta = ModeloVehiculos::mdlMostrarVehiculos($tabla, $item, $valor);

		return $respuesta;

	}

	


	/*=============================================
	Contar USUARIOS
	=============================================*/
	static public function ctrContarVehiculos(){

		$tabla = "vehiculos";
		$respuesta = ModeloVehiculos::mdlContarVehiculos($tabla);

		return $respuesta;

	}

	/*=============================================
	Editar USUARIO
	=============================================*/

	static public function ctrEditarVehiculo(){

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

							$respuesta = ModeloVehiculos::mdlEditarVehiculo($tabla, $datos);

							echo json_encode($datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡El vehiculo ha sido editado correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "vehiculos";

												}

											});
							
										</script>';
							}else{
									echo '<script>
										swal({
											type: "error",
											title: "¡Los datos del vehiculo no pudieron ser modificados!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "vehiculos";
											}
										});
									

									</script>';	

							}
						
					}else{

								echo '<script>
										swal({
											type: "error",
											title: "¡El nombre no puede ir vacio o llevar caracteres especiales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "vehiculos";
											}
										});
									

									</script>';	



					}



		}

	}


	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarVehiculo(){

		if(isset($_GET["idVehiculo"])){

			$tabla ="vehiculos";
			$datos = $_GET["idVehiculo"];

		
			$respuesta = ModeloVehiculos::mdlBorrarVehiculo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Vehiculo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "vehiculos";

								}
							})

				</script>';

			}		

		}

	}



}
//final de la clase principal



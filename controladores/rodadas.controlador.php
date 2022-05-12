<?php

class ControladorRodadas{

	/*=============================================
	CREAR RODADA NUEVA
	=============================================*/

	static public function ctrCrearRodada(){

			if (isset($_POST["nuevaRuta"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\-\_\,\;\. ]+$/', $_POST["nuevaRuta"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\-\_\,\;\. ]+$/', $_POST["nuevoLugar"]) ){

					$tabla = "rodadas";

					$datos = array('ruta' => $_POST["nuevaRuta"],
								   'lugar' =>  $_POST["nuevoLugar"],
								    'observaciones' => $_POST["nuevaObs"],
								    'estado' => $_POST['estado'],
								    'fecha' => $_POST['nuevaFecha'],
								    'usr_crea' => $_POST['usr_crea']
								  );

							$respuesta = ModeloRodadas::mdlIngresarRodada($tabla, $datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡La rodada ha sido guardada correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "rodadas";

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
										window.location = "rodadas";
									}
								});
							

							</script>';		
					}
				

			}
	}
	/*=============================================
	FIN METODO CREAR RODADA NUEVO
	=============================================*/


	/*=============================================
	MOSTRAR RODADAS
	=============================================*/
	static public function ctrMostrarRodadas($item, $valor){

		$tabla = "rodadas";
		$respuesta = ModeloRodadas::mdlMostrarRodadas($tabla, $item, $valor);

		return $respuesta;

	}
	static public function ctrMostrarRodadasRealizadas($item, $valor){

		$tabla = "rodadas";
		$respuesta = ModeloRodadas::mdlMostrarRodadasRealizadas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Contar USUARIOS
	=============================================*/
	static public function ctrContarRodadas(){

		$tabla = "rodadas";
		$respuesta = ModeloRodadas::mdlContarRodadas($tabla);

		return $respuesta;

	}
	
	/*=============================================
	Editar RODADA
	=============================================*/

	static public function ctrEditarRodada(){

		if(isset($_POST["editarRuta"])){


					if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\-\_\,\;\. ]+$/', $_POST["editarRuta"])){
					

							/**************************************
							Validamos la imagen
							**************************************/

							$tabla = "rodadas";

							$datos = array('ruta' => $_POST["editarRuta"],
										   'lugar' =>  $_POST["editarLugar"],
										   'observaciones' => $_POST["editarObs"],
										   'id'	=> $_POST['idRodada']
										  );

							$respuesta = ModeloRodadas::mdlEditarRodada($tabla, $datos);

							echo json_encode($datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡La rodada ha sido editada correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "rodadas";

												}

											});
							
										</script>';
							}else{
									echo '<script>
										swal({
											type: "error",
											title: "¡Los datos de la rodada no pudieron ser modificados!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "rodadas";
											}
										});
									

									</script>';	

							}
						
					}else{

								echo '<script>
										swal({
											type: "error",
											title: "¡la ruta, lugar y obs nombre no puede ir vacio o llevar caracteres especiales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "rodadas";
											}
										});
									

									</script>';	



					}



		}

	}


	/*=============================================
	BORRAR RODADA
	=============================================*/

	static public function ctrBorrarRodada(){

		if(isset($_GET["idRodada"])){

			$tabla ="rodadas";
			$datos = $_GET["idRodada"];

			$respuesta = ModeloRodadas::mdlBorrarRodada($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La rodada ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "rodadas";

								}
							})

				</script>';

			}		

		}

	}



}
//final de la clase principal



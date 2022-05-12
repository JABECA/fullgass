<?php

class ControladorAsistentes{

	/*=============================================
	CREAR RODADA NUEVA
	=============================================*/

	static public function ctrCrearAsistentes(){

			if (isset($_POST["nuevaRodada"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\-\_\,\;\. ]+$/', $_POST["nuevaRodada"])){

					$tabla = "asistencias";
					$pilotos = $_POST["pilotos"];
					$id_rodada = $_POST['nuevaRodada'];
					$observaciones = $_POST['nuevaObs'];
					$estado = $_POST['estado'];
					$respuestaGrabado = 0;



					for ($i=0; $i < sizeof($pilotos); $i++) { 
						
						$id_piloto = $pilotos[$i];
						
						$respuesta = ModeloAsistentes::mdlIngresarAsistentes($tabla, $id_piloto, $id_rodada, $observaciones, $estado );
						
						if ($respuesta == 'ok') {
							$respuestaGrabado = $respuestaGrabado + 1;
						}
						if ($respuestaGrabado == sizeof($pilotos)) {
											echo '<script>

											swal({

												type: "success",
												title: "¡La asistencia ha sido guardada correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "asistentes";

												}

											});
							
										</script>';
						}
					
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
									window.location = "asistentes";
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
	static public function ctrMostrarAsistentes($item, $valor){

		$tabla = "asistencias";
		$respuesta = ModeloAsistentes::mdlMostrarAsistentes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Contar USUARIOS
	=============================================*/
	static public function ctrContarAsistente(){

		$tabla = "asistencias";
		$respuesta = ModeloAsistentes::mdlContarAsistente($tabla);

		return $respuesta;

	}
	
	/*=============================================
	Editar RODADA
	=============================================*/

	static public function ctrEditarAsistente(){

		if(isset($_POST["editarRuta"])){


					if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\-\_\,\;\. ]+$/', $_POST["editarRuta"])){
					

							/**************************************
							Validamos la imagen
							**************************************/

							$tabla = "asistencias";

							$datos = array('ruta' => $_POST["editarRuta"],
										   'lugar' =>  $_POST["editarLugar"],
										   'observaciones' => $_POST["editarObs"],
										   'id'	=> $_POST['idRodada']
										  );

							$respuesta = ModeloAsistentes::mdlEditarAsistente($tabla, $datos);

							echo json_encode($datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡La asistencia ha sido editada correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "asistentes";

												}

											});
							
										</script>';
							}else{
									echo '<script>
										swal({
											type: "error",
											title: "¡Los datos de la asistencia no pudieron ser modificados!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "asistentes";
											}
										});
									

									</script>';	

							}
						
					}else{

								echo '<script>
										swal({
											type: "error",
											title: "¡la asistencia no puede ir vacio o llevar caracteres especiales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "asistentes";
											}
										});
									

									</script>';	



					}



		}

	}


	/*=============================================
	BORRAR RODADA
	=============================================*/

	static public function ctrBorrarAsistente(){

		if(isset($_GET["idAsistencia"])){

			$tabla ="asistencias";
			$datos = $_GET["idAsistencia"];

			var_dump($datos);

			$respuesta = ModeloAsistentes::mdlBorrarAsistente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La asistencia ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "asistentes";

								}
							})

				</script>';

			}		

		}

	}



}
//final de la clase principal



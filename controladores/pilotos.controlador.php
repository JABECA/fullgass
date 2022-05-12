<?php

class ControladorPilotos{
	/*=============================================
	CREAR USUARIO NUEVO
	=============================================*/
	static public function ctrCrearPiloto(){

			if (isset($_POST["nombres"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombres"]) &&
					preg_match('/^[0-9]+$/', $_POST["numeroIdentificacion"]) ){


							$tabla = "pilotos";

							$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						
							$datos = array('nombres' => $_POST["nombres"],
										   'apellidos' =>  $_POST["apellidos"],
										   'numeroIdentificacion' => $_POST["numeroIdentificacion"],
										   'telefono' => $_POST["telefono"],
										   'fecha_nacimiento' => $_POST["fecha_nacimiento"],
										   'nombre_contacto' => $_POST["nombre_contacto"],
										   'numero_contacto' => $_POST["numero_contacto"],
										   'fecha_ingreso' => $_POST["fecha_ingreso"],
										   'estado' => $_POST["estado"],
										   'usuario' => $_POST['usuario'],
										   'password' => $encriptar,
										   'perfil' => 'Piloto',
										   'foto' => ''
										 );

							$respuesta = ModeloPilotos::mdlIngresarPiloto($tabla, $datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡El piloto ha sido guardado correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "pilotos";

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
										window.location = "pilotos";
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
	static public function ctrMostrarPilotos($item, $valor){

		$tabla = "pilotos";
		$respuesta = ModeloPilotos::mdlMostrarPilotos($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrMostrarPiloto($item, $valor){

		$tabla = "pilotos";
		$respuesta = ModeloPilotos::mdlMostrarPiloto($tabla, $item, $valor);
		return $respuesta;
	}



	/*=============================================
	Contar USUARIOS
	=============================================*/
	static public function ctrContarPilotos(){

		$tabla = "pilotos";
		$respuesta = ModeloUsuarios::mdlContarPilotos($tabla);

		return $respuesta;

	}

	/*=============================================
	Editar USUARIO
	=============================================*/

	static public function ctrEditarPiloto(){

		if(isset($_POST["editarIdentificacion"])){

					if (preg_match('/^[0-9 ]+$/', $_POST["editarIdentificacion"])){
						
						$passwordActual = $_POST['passwordActual'];

						if ($_POST["editarPassword"] != "") {
								# code...
								if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

									$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

								}else{
									echo   '<script>
												swal({
													type: "error",
													title: "¡La contraseña no puede ir vacia o llevar caracteres especiales!",
													showConfirmButton: true,
													confirmButtonText: "Cerrar",
													closeOnConfirm: false
												}).then((result) => {
													if(result.value){
														window.location = "pilotos";
													}
												});
											</script>';		
								}
						}else{

								$encriptar = $passwordActual;
						}
						
						$tabla = "pilotos";

						
						$datos = array( 'nombres' => $_POST["editarNombres"],
									    'apellidos' =>  $_POST["editarApellidos"],
										'numeroIdentificacion' => $_POST["editarIdentificacion"],
										'telefono' => $_POST["editarTelefono"],
										'fecha_nacimiento' => $_POST["editar_fecha_nacimiento"],
										'nombre_contacto' => $_POST["editar_nombre_contacto"],
										'numero_contacto' => $_POST["editar_numero_contacto"],
										'fecha_ingreso' => $_POST["editar_fecha_ingreso"],
										'usuario' => $_POST['editarUsuario'],
										'password' => $encriptar,
										'perfil' => 'Piloto',
										'foto'   => '',
 										'id' => $_POST["idPiloto"]

										
										);

							$respuesta = ModeloPilotos::mdlEditarPiloto($tabla, $datos);

							echo json_encode($datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡El piloto ha sido editado correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "pilotos";

												}

											});
							
										</script>';
							}else{
									echo '<script>
										swal({
											type: "error",
											title: "¡Los datos del piloto no pudieron ser modificados!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "pilotos";
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
												window.location = "pilotos";
											}
										});
									

									</script>';	



					}



		}

	}


	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarPiloto(){

		if(isset($_GET["idPiloto"])){

			$tabla ="pilotos";
			$datos = $_GET["idPiloto"];

		
			$respuesta = ModeloPilotos::mdlBorrarPiloto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El piloto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "pilotos";

								}
							})

				</script>';

			}		

		}

	}



}
//final de la clase principal



<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"]) && isset($_POST["ing_tipo_usuario"])){

			if ($_POST["ing_tipo_usuario"] == 'Administrador') {
					
				if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				   	preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){


					$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$tabla = "usuarios";

					$item = "usuario";
					$valor = $_POST["ingUsuario"];

					$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

					if (is_array($respuesta)) {
						
						$usuario = $respuesta['usuario'];

						if($usuario == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar && $respuesta['perfil'] == 'Administrador'){

							/*****************************************************************
							Validadmos que el usuario ese activado
							*******************************************************************/
							if ($respuesta["estado"] == 1) {
								# code...

								/*****************************************************************
								Creacion de variables de session par apoder usarlas en la Pagina
								*******************************************************************/

								$_SESSION["iniciarSesion"] = "ok";
								$_SESSION["id"] = $respuesta["id"];
								$_SESSION["nombre"] = $respuesta["nombre"];
								$_SESSION["foto"] = $respuesta["foto"];
								$_SESSION["perfil"] = $respuesta["perfil"];
								$_SESSION["identificacion"] = $respuesta["identificacion"];

								date_default_timezone_set('America/Bogota');

								$fecha = date('Y-m-d');
								$hora = date('H:i:s');

								$fechaActual = $fecha.' '.$hora;


								if ($respuesta["estado"] == 1) {
									echo '<script>

									window.location = "inicio";

								</script>';
								}

								
							}else{

								echo '<script>

										swal({	type: "error",
												title: "Oops...",
												text: "¡No estas activado en el sistema, por favor comunicate con el administrador!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"
											}).then(function(result){
												if(result.value){
													window.location = "usuarios";
												}
											});

	                                  </script>';
							}


						}

					}else{
						$usuario = '';
						echo '<br><div class="alert alert-danger">Error al ingresar, usuario o contraseña incorrectos, o no eres administrador</div>';
					}

					
				}
			
			}

			else if ($_POST["ing_tipo_usuario"] == 'Piloto') {
					
				if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				   	preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){


					$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$tabla = "pilotos";

					$item = "usuario";
					$valor = $_POST["ingUsuario"];

					$respuesta = ModeloPilotos::mdlMostrarPilotos($tabla, $item, $valor);
					

					if (is_array($respuesta)) {
						
						$usuario = $respuesta['usuario'];


						if($usuario == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar && $respuesta['perfil'] == 'Piloto'){

							/*****************************************************************
							Validadmos que el usuario ese activado
							*******************************************************************/
							if ($respuesta["estado"] == 1) {
								# code...

								/*****************************************************************
								Creacion de variables de session par apoder usarlas en la Pagina
								*******************************************************************/

								$_SESSION["iniciarSesion"] = "ok";
								$_SESSION["id"] = $respuesta["id"];
								$_SESSION["nombre"] = $respuesta["nombres"];
								$_SESSION["foto"] = $respuesta["foto"];
								$_SESSION["perfil"] = $respuesta["perfil"];
								$_SESSION["numeroIdentificacion"] = $respuesta["numeroIdentificacion"];

								date_default_timezone_set('America/Bogota');

								$fecha = date('Y-m-d');
								$hora = date('H:i:s');

								$fechaActual = $fecha.' '.$hora;


								if ($respuesta["estado"] == 1) {
									echo '<script>

									window.location = "inicio";

								</script>';
								}

								
							}else{

								echo '<script>

										swal({	type: "error",
												title: "Oops...",
												text: "¡No estas activado en el sistema, por favor comunicate con el administrador!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"
											}).then(function(result){
												if(result.value){
													window.location = "usuarios";
												}
											});

	                                  </script>';
							}


						}

					}else{
						$usuario = '';
						echo '<br><div class="alert alert-danger">Error al ingresar, usuario o contraseña incorrectos</div>';
					}

					
				}
			
			}

				

		}

	}


	/*=============================================
	CREAR USUARIO NUEVO
	=============================================*/

	static public function ctrCrearUsuario(){

			if (isset($_POST["nuevoNombre"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
					preg_match('/^[0-9]+$/', $_POST["nuevaCedula"]) &&
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]) ){


							$ruta = "";  //en el caso que no e este guaardando alguna foto
							/**************************************
							Validamos la imagen
							**************************************/

							if(isset($_FILES["nuevaFoto"]["tmp_name"])){

								list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

								$nuevoAncho = 500;
								$nuevoAlto = 500;

								/*Creamos directorio donde se guardara la imagen*/

								$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

								mkdir($directorio, 0755); //0755 permisos de lectura y escritura

										/***************************************************************
										Deacuerdo al formato de la imgen jpeg aplicamos metodos de php
										****************************************************************/

										if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
											//guardamos la imagen
											$aleatorio = mt_rand(100,999);
											$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
											$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
											$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
											imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho , $nuevoAlto, $ancho, $alto);
											imagejpeg($destino, $ruta);
										}

										/***************************************************************
										Deacuerdo al formato de la imgen png aplicamos metodos de php
										****************************************************************/

										if($_FILES["nuevaFoto"]["type"] == "image/png"){
											//guardamos la imagen
											$aleatorio = mt_rand(100,999);
											$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
											//$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
											//$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
											//imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho , $nuevoAlto, $ancho, $alto);
											//imagejpeg($destino, $ruta);
										}

							}

							$tabla = "usuarios";

							$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

							$datos = array('nombre' => $_POST["nuevoNombre"],
										   'identificacion' =>  $_POST["nuevaCedula"],
										   'telefono' => $_POST["nuevoTelefono"],
										   'usuario' =>  $_POST["nuevoUsuario"],
										   'password' =>  $encriptar,
										   'perfil' => $_POST["nuevoPerfil"],
										   'contacto' => $_POST["nuevoContacto"],
										   'numero_contacto' => $_POST["nuevoTelefonoContacto"],
										   'estado' => $_POST["estado"],
										   'ruta' =>  $ruta);

							$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡El usuario ha sido guardado correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "usuarios";

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
										window.location = "usuarios";
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
	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMostrarEmpleado($item){

		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlMostrarEmpleado($tabla, $item);

		return $respuesta;

	}

	/*=============================================
	Contar USUARIOS
	=============================================*/
	static public function ctrContarUsuarios(){

		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlContarUsuarios($tabla);

		return $respuesta;

	}

	/*=============================================
	Mostrar Jefes de Area
	=============================================*/
	static public function ctrMostrarJefesArea(){

		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlMostrarJefesArea($tabla);

		return $respuesta;

	}
	/*=============================================
	FIN METODO Contar USUARIOS
	=============================================*/

	/*=============================================
	Contar USUARIOS
	=============================================*/
	static public function ctrContarJefes(){

		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlContarJefes($tabla);

		return $respuesta;

	}
	/*=============================================
	FIN METODO Contar USUARIOS
	=============================================*/



	/*=============================================
	Editar USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){


					if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){
					

							/**************************************
							Validamos la imagen
							**************************************/

							$ruta = $_POST["fotoActual"];  //en el caso que no e este guaardando alguna foto
							
							if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

								list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

								$nuevoAncho = 500;
								$nuevoAlto = 500;

								/*Creamos directorio donde se guardara la imagen*/

								$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

								/***************************************************************
									Primero Preguntamos si existe otra imagen en la bd
								****************************************************************/
								if (!empty($_POST["fotoActual"])) {
									# code...
									unlink($_POST["fotoActual"]);

								}else{

									mkdir($directorio, 0755);
								}


								mkdir($directorio, 0755); //0755 permisos de lectura y escritura

								/***************************************************************
								Deacuerdo al formato de la imgen jpeg aplicamos metodos de php
								****************************************************************/
								if($_FILES["editarFoto"]["type"] == "image/jpeg"){
									//guardamos la imagen
									$aleatorio = mt_rand(100,999);
									$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
									$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
									$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
									imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho , $nuevoAlto, $ancho, $alto);
									imagejpeg($destino, $ruta);
								}

								/***************************************************************
								Deacuerdo al formato de la imgen png aplicamos metodos de php
								****************************************************************/

								if($_FILES["editarFoto"]["type"] == "image/png"){
									
									$aleatorio = mt_rand(100,999);
									$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
									$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
									$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
									imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho , $nuevoAlto, $ancho, $alto);
									imagejpeg($destino, $ruta);
								}

							}
							//fin validacion de la imagen

							$tabla = "usuarios";

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
														window.location = "usuarios";
													}
												});
											</script>';		
								}
							}else{

								$encriptar = $passwordActual;
							}


							$datos = array('nombre' => $_POST["editarNombre"],
										   'identificacion' =>  $_POST["editarCedula"],
										   'telefono' => $_POST["editarTelefono"],
										   'usuario' => $_POST["editarUsuario"],
										   'perfil' =>  $_POST["editarPerfil"],
										   'password' =>  $encriptar,
										   'id'     => $_POST['id_User'],
										   'contacto' => $_POST["editarContacto"],
										   'numero_contacto' => $_POST["editarTelefonoContacto"],
										   'ruta' =>  $ruta);

							$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

							echo json_encode($datos);

							if($respuesta == "ok"){

									echo '<script>

											swal({

												type: "success",
												title: "¡El usuario ha sido editado correctamente!",
												showConfirmButton: true,
												confirmButtonText: "Cerrar"

											}).then(function(result){

												if(result.value){
												
													window.location = "usuarios";

												}

											});
							
										</script>';
							}else{
									echo '<script>
										swal({
											type: "error",
											title: "¡Los datos del usuario no pudieron ser modificados!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
										}).then((result) => {
											if(result.value){	
												window.location = "usuarios";
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
												window.location = "usuarios";
											}
										});
									

									</script>';	



					}



		}

	}


	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}



}
//final de la clase principal



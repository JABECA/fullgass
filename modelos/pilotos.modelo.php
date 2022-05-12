<?php

require_once "conexion.php";

class ModeloPilotos{
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/
	static public function mdlMostrarPilotos($tabla, $item, $valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombres ASC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	static public function mdlMostrarPiloto($tabla, $item, $valor){
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor");
			// $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
		
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	static public function mdlMostrarCumpleaños(){
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM pilotos WHERE fecha_nacimiento = CURRENT_DATE");
			// $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
		
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}


	/*=============================================
	REGISTRO, AGREGAR USUARIO USUARIOS
	=============================================*/

	static public function mdlIngresarPiloto($tabla, $datos){
		$stmt = Conexion::conectar() -> prepare("INSERT INTO 
		$tabla(nombres, apellidos, numeroIdentificacion, fecha_nacimiento, telefono, nombre_contacto, numero_contacto, fecha_ingreso, usuario, password, perfil, foto, estado ) 

		values(:nombres, :apellidos, :numeroIdentificacion, :fecha_nacimiento, :telefono, :nombre_contacto, :numero_contacto, :fecha_ingreso, :usuario, :password, :perfil, :foto, :estado) ");
		//enlazamos los parametros
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroIdentificacion", $datos["numeroIdentificacion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_contacto", $datos["nombre_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":numero_contacto", $datos["numero_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		
				
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}
		$stmt->close();
		
		$stmt = null;
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarPiloto($tabla, $datos){ 

		$stmt = Conexion::conectar()->prepare("

			UPDATE $tabla 

			SET nombres				 = :nombres, 
			    apellidos 			 = :apellidos, 
			    numeroIdentificacion = :numeroIdentificacion, 
			    telefono 		     = :telefono, 
			    fecha_nacimiento     = :fecha_nacimiento, 
			    nombre_contacto      = :nombre_contacto, 
			    numero_contacto      = :numero_contacto,
			    fecha_ingreso        = :fecha_ingreso,
			    usuario 			 = :usuario,
			    password 			 = :password,
			    perfil 				 = :perfil,
			    foto   				 = :foto

			WHERE id= :id ");

		$stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt -> bindParam(":numeroIdentificacion", $datos["numeroIdentificacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

		$stmt -> bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre_contacto", $datos["nombre_contacto"], PDO::PARAM_STR);
		$stmt -> bindParam(":numero_contacto", $datos["numero_contacto"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);

		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		

		if ($stmt -> execute()) {
			# code...
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		
		$stmt -> null;

	}


	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarPiloto($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarPiloto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}


	static public function mdlContarPilotos(){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(nombres) as total from pilotos");

		
		if($stmt -> execute()){

			return $stmt -> fetch();
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}


}
<?php

require_once "conexion.php";

class ModeloRodadas{
	/*=============================================
	MOSTRAR Rodadas
	=============================================*/
	static public function mdlMostrarRodadas($tabla, $item, $valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY ruta ASC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	static public function mdlMostrarRodadasRealizadas($tabla, $item, $valor){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY ruta ASC");
		$stmt -> execute();
		return $stmt -> fetchAll();
	
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	static public function mdlMostrarProximaRodada(){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM rodadas ORDER BY id DESC LIMIT 1");
		$stmt -> execute();
		return $stmt -> fetch();
	
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	static public function mdlMostrarProximaRodadas(){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM rodadas where estado = 0 ORDER BY fecha ASC LIMIT 4");
		$stmt -> execute();
		return $stmt -> fetchAll();
	
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	/*=============================================
	REGISTRO, AGREGAR RODADA
	=============================================*/

	static public function mdlIngresarRodada($tabla, $datos){
		$stmt = Conexion::conectar() -> prepare("INSERT INTO 
		$tabla(ruta, lugar, observaciones, estado, fecha, usr_crea) 

		values(:ruta, :lugar, :observaciones, :estado, :fecha, :usr_crea)");
		//enlazamos los parametros
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":usr_crea", $datos["usr_crea"], PDO::PARAM_STR);
						
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}
		$stmt->close();
		
		$stmt = null;
	}

	/*=============================================
	EDITAR RODADA
	=============================================*/

	static public function mdlEditarRodada($tabla, $datos){ 

		$stmt = Conexion::conectar()->prepare("

			UPDATE $tabla SET ruta = :ruta, lugar = :lugar, observaciones = :observaciones WHERE id= :id ");

		$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt -> bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
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
	ACTUALIZAR ESTADO RODADA
	=============================================*/

	static public function mdlActualizarRodada($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = $valor1 WHERE $item2 =  $valor2");
		
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR RODADA
	=============================================*/

	static public function mdlBorrarRodada($tabla, $datos){

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


}
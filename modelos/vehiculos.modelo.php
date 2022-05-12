<?php

require_once "conexion.php";

class ModeloVehiculos{
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/
	static public function mdlMostrarVehiculos($tabla, $item, $valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("

			SELECT v.id, p.nombres, p.apellidos, v.marca, v.referencia, v.modelo, v.placa, v.estado
			FROM pilotos p, vehiculos v
			WHERE p.id = v.id_piloto

			");

			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	static public function mdlMostrarVehiculosPiloto($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("

			SELECT v.id, p.nombres, p.apellidos, v.marca, v.referencia, v.modelo, v.placa, v.estado
			FROM pilotos p, vehiculos v
			WHERE p.id = v.id_piloto and p.id = $valor

			");

		$stmt -> execute();
		return $stmt -> fetchAll();
		stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	/*=============================================
	REGISTRO, AGREGAR USUARIO USUARIOS
	=============================================*/

	static public function mdlIngresarVehiculo($tabla, $datos){
		
		$stmt = Conexion::conectar() -> prepare("INSERT INTO 
		$tabla(id_piloto, marca, referencia, modelo, placa, estado) 

		values(:id_piloto, :marca, :referencia, :modelo, :placa, :estado ) ");
		//enlazamos los parametros
		$stmt->bindParam(":id_piloto", $datos["id_piloto"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
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

	static public function mdlEditarVehiculo($tabla, $datos){ 

		$stmt = Conexion::conectar()->prepare("

			UPDATE $tabla 
			SET id_piloto= :id_piloto, marca = :marca, referencia = :referencia, modelo = :modelo, placa = :placa
			WHERE id= :id ");

		$stmt -> bindParam(":id_piloto", $datos["id_piloto"], PDO::PARAM_STR);
		$stmt -> bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt -> bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt -> bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt -> bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
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

	static public function mdlActualizarVehiculo($tabla, $item1, $valor1, $item2, $valor2){

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

	static public function mdlBorrarVehiculo($tabla, $datos){

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
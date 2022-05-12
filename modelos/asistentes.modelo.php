<?php

require_once "conexion.php";

class ModeloAsistentes{
	/*=============================================
	MOSTRAR Rodadas
	=============================================*/
	static public function mdlMostrarAsistentes($tabla, $item, $valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("

				SELECT a.id, r.id as idRodada, r.ruta, r.lugar, r.fecha, p.nombres, p.apellidos 
				FROM asistencias a, rodadas r, pilotos p 
				WHERE a.id_rodada = r.id and a.id_piloto = p.id
			");
			
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	/*=============================================
	REGISTRO, AGREGAR RODADA
	=============================================*/

	static public function mdlIngresarAsistentes($tabla, $id_piloto, $id_rodada, $observaciones, $estado){
		$stmt = Conexion::conectar() -> prepare("INSERT INTO  $tabla (id_piloto, id_rodada, observaciones, estado) 
			                                                   values(:id_piloto, :id_rodada, :observaciones, :estado)");
		
		//enlazamos los parametros
		$stmt->bindParam(":id_piloto", $id_piloto, PDO::PARAM_STR);
		$stmt->bindParam(":id_rodada", $id_rodada, PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $observaciones, PDO::PARAM_STR);
		$stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
						
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

	static public function mdlEditarAsistente($tabla, $datos){ 

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

	static public function mdlActualizarAsistente($tabla, $item1, $valor1, $item2, $valor2){

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

	static public function mdlBorrarAsistente($tabla, $datos){

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
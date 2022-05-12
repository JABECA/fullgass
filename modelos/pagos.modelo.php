<?php

require_once "conexion.php";

class ModeloPagos{
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/
	static public function mdlMostrarPagos($tabla, $item, $valor){
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("

			SELECT 	pa.id, p.nombres, p.apellidos, 
					pa.enero, pa.febrero, pa.marzo, pa.abril, pa.mayo, pa.junio, pa.julio, pa.agosto,
					pa.septiembre, pa.octubre, pa.noviembre, pa.diciembre, pa.year
			FROM pilotos p, pagos pa
			WHERE p.id = pa.id_piloto

			");

			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}

	static public function mdlMostrarPagosPiloto($tabla, $item, $valor){
		
		$stmt = Conexion::conectar()->prepare("
			SELECT 	pa.id, p.nombres, p.apellidos, 
					pa.enero, pa.febrero, pa.marzo, pa.abril, pa.mayo, pa.junio, pa.julio, pa.agosto,
					pa.septiembre, pa.octubre, pa.noviembre, pa.diciembre, pa.year
			FROM pilotos p, pagos pa
			WHERE p.id = pa.id_piloto and p.id = $valor

			");

			$stmt -> execute();
			return $stmt -> fetchAll();
		
		$stmt -> close(); //cerramos la conexion
		$stmt -> null; //ponemos el onbejo vacio de conexion
	}


	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarPago($tabla, $item1, $valor1, $item2, $valor2){

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

	static public function mdlIngresarPago($tabla, $datos){
		
		$stmt = Conexion::conectar() -> prepare("

		INSERT INTO $tabla(id_piloto, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre,
						              octubre, noviembre, diciembre, year) 

		values(:id_piloto, :enero, :febrero, :marzo, :abril, :mayo, :junio, :julio, :agosto, :septiembre,
						              :octubre, :noviembre, :diciembre, :year ) ");
		//enlazamos los parametros
		$stmt->bindParam(":id_piloto", $datos["id_piloto"], PDO::PARAM_STR);
		$stmt->bindParam(":enero", $datos["enero"], PDO::PARAM_STR);
		$stmt->bindParam(":febrero", $datos["febrero"], PDO::PARAM_STR);
		$stmt->bindParam(":marzo", $datos["marzo"], PDO::PARAM_STR);
		$stmt->bindParam(":abril", $datos["abril"], PDO::PARAM_STR);
		$stmt->bindParam(":mayo", $datos["mayo"], PDO::PARAM_STR);
		$stmt->bindParam(":junio", $datos["junio"], PDO::PARAM_STR);
		$stmt->bindParam(":julio", $datos["julio"], PDO::PARAM_STR);
		$stmt->bindParam(":agosto", $datos["agosto"], PDO::PARAM_STR);
		$stmt->bindParam(":septiembre", $datos["septiembre"], PDO::PARAM_STR);
		$stmt->bindParam(":octubre", $datos["octubre"], PDO::PARAM_STR);
		$stmt->bindParam(":noviembre", $datos["noviembre"], PDO::PARAM_STR);
		$stmt->bindParam(":diciembre", $datos["diciembre"], PDO::PARAM_STR);
		$stmt->bindParam(":year", $datos["year"], PDO::PARAM_STR);
		
				
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}
		$stmt->close();
		
		$stmt = null;
	}




}
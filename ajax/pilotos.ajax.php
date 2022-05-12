<?php

require_once "../controladores/pilotos.controlador.php";
require_once "../modelos/pilotos.modelo.php";

class AjaxPilotos{

		/**************
		editar usuario
		***************/

	public $idPiloto;

	public function ajaxEditarPiloto(){

		$item = "id"; 
		$valor = $this->idPiloto;

		$respuesta = ControladorPilotos::ctrMostrarPilotos($item, $valor);

		echo json_encode($respuesta);

	}

	public $piloto;

	public function ajaxValidarPiloto(){

		$item = "numeroIdentificacion";
		$valor = $this->piloto;

		$respuesta = ControladorPilotos::ctrMostrarPilotos($item, $valor);

		echo json_encode($respuesta);

	}

	/**************
	 Activar usuario
	***************/
	public $activarPiloto;
	public $activarId;


	public function ajaxActivarPiloto(){

		$tabla = "pilotos";

		$item1 = "estado";
		$valor1 = $this->activarPiloto;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloPilotos::mdlActualizarPiloto($tabla, $item1, $valor1, $item2, $valor2);
		echo json_encode($respuesta);
	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	



}
/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idPiloto"])){

	$editar = new AjaxPilotos();
	$editar -> idPiloto = $_POST["idPiloto"];
	$editar -> ajaxEditarPiloto();

}

if(isset($_POST["piloto"])){

	$validar = new AjaxPilotos();
	$validar -> piloto = $_POST["piloto"];
	$validar -> ajaxValidarPiloto();

}
/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarPiloto"])){

	$activarPiloto = new AjaxPilotos();
	$activarPiloto -> activarPiloto = $_POST["activarPiloto"];
	$activarPiloto -> activarId = $_POST["activarId"];
	$activarPiloto -> ajaxActivarPiloto();

}

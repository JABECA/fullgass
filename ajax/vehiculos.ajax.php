<?php

require_once "../controladores/vehiculos.controlador.php";
require_once "../modelos/vehiculos.modelo.php";

class AjaxVehiculos{

		/**************
		editar usuario
		***************/

	public $idVehiculo;

	public function ajaxEditarVehiculo(){

		$item = "id"; 
		$valor = $this->idVehiculo;

		$respuesta = ControladorVehiculos::ctrMostrarVehiculos($item, $valor);

		echo json_encode($respuesta);

	}

	public $vehiculo;

	public function ajaxValidarVehiculo(){

		$item = "placa";
		$valor = $this->placa;

		$respuesta = ControladorVehiculos::ctrMostrarVehiculos($item, $valor);

		echo json_encode($respuesta);

	}

	/**************
	 Activar usuario
	***************/
	public $activarVehiculo;
	public $activarId;


	public function ajaxActivarVehiculo(){

		$tabla = "vehiculos";

		$item1 = "estado";
		$valor1 = $this->activarVehiculo;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloVehiculos::mdlActualizarVehiculo($tabla, $item1, $valor1, $item2, $valor2);
		echo json_encode($respuesta);
	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	



}
/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idVehiculo"])){

	$editar = new AjaxVehiculos();
	$editar -> idVehiculo = $_POST["idVehiculo"];
	$editar -> ajaxEditarVehiculo();

}

if(isset($_POST["vehiculo"])){

	$validar = new AjaxVehiculos();
	$validar -> vehiculo = $_POST["vehiculo"];
	$validar -> ajaxValidarVehiculo();

}
/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarId"])){

	$activarVehiculo = new AjaxVehiculos();
	$activarVehiculo -> activarVehiculo = $_POST["estadoVehiculo"];
	$activarVehiculo -> activarId = $_POST["activarId"];
	$activarVehiculo -> ajaxActivarVehiculo();

}

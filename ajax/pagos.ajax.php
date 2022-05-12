<?php

require_once "../controladores/pagos.controlador.php";
require_once "../modelos/pagos.modelo.php";

class AjaxPagos{

	public $activarId; //id del año y el piloto
	public $estadoPago;
	public $mesPago;

	// enviar el id, valor id el mes y valor del mes 

	public function ajaxAplicarPago(){

		$tabla = "pagos";

		$item1 = $this->mesPago;
		$valor1 = $this->estadoPago;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloPagos::mdlActualizarPago($tabla, $item1, $valor1, $item2, $valor2);
		echo json_encode($respuesta);
	}




}

/*=============================================
ACTIVAR PAGO
=============================================*/	

if(isset($_POST["activarId"])){

	$activarVehiculo = new AjaxPagos();
	$activarVehiculo -> estadoPago = $_POST["estadoPago"];
	$activarVehiculo -> activarId = $_POST["activarId"];
	$activarVehiculo -> mesPago = $_POST["mesPago"];
	$activarVehiculo -> ajaxAplicarPago();

}

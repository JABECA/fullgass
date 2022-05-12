<?php

require_once "../controladores/rodadas.controlador.php";
require_once "../modelos/rodadas.modelo.php";

class AjaxRodadas{

		/**************
		editar Rodada
		***************/

	public $idRodada;

	public function ajaxEditarRodada(){

		$item = "id"; 
		$valor = $this->idRodada;

		$respuesta = ControladorRodadas::ctrMostrarRodadas($item, $valor);

		echo json_encode($respuesta);

	}

	/**************
	 Activar Rodada
	***************/
	public $activarRodada;
	public $activarId;


	public function ajaxActivarRodada(){

		$tabla = "rodadas";

		$item1 = "estado";
		$valor1 = $this->activarRodada;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloRodadas::mdlActualizarRodada($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


}
/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idRodada"])){

	$editar = new AjaxRodadas();
	$editar -> idRodada = $_POST["idRodada"];
	$editar -> ajaxEditarRodada();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarRodada"])){

	$activarRodada = new AjaxRodadas();
	$activarRodada -> activarRodada = $_POST["activarRodada"];
	$activarRodada -> activarId = $_POST["activarId"];
	$activarRodada -> ajaxActivarRodada();

}

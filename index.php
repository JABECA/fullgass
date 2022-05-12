<?php
// session_start();
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/pilotos.controlador.php";
require_once "controladores/vehiculos.controlador.php";
require_once "controladores/pagos.controlador.php";
require_once "controladores/rodadas.controlador.php";
require_once "controladores/asistentes.controlador.php";



require_once "modelos/usuarios.modelo.php";
require_once "modelos/pilotos.modelo.php";
require_once "modelos/vehiculos.modelo.php";
require_once "modelos/pagos.modelo.php";
require_once "modelos/rodadas.modelo.php";
require_once "modelos/asistentes.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
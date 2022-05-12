<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=brainiacscom_fullgass",
			            "brainiac_fullgas",
			            "h%RX;m(YMG]1qhRF!=");

		$link->exec("set names utf8");

		return $link;

	}

}
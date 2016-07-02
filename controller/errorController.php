<?php

class errorController{

	public function __construct(){
		if (($_SESSION['id_emp']) == "") {
			header("Location: ".Conectar::ruta()."?controller=login");
		}
	}

	public function index(){
		require_once("views/layout/template.php");
		require_once("views/error.php");
	}
}


?>
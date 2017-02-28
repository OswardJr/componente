<?php
class IndexController{

	public function __construct(){
		if (($_SESSION['id_emp']) == "") {
			header("Location: ".Conectar::ruta()."?controller=login");
		}
	}

	public function index(){
    require_once("views/layout/template.php");
    require_once("views/index.php");
  }

  public function prueba(){
    require_once("views/layout/template.php");
    require_once("views/prueba/index.php");
  }

  public function presupuesto(){
		require_once("views/layout/template.php");
		require_once("views/prueba/presupuesto.php");
	}
  public function venta(){

		require_once("views/layout/template.php");
		require_once("views/prueba/venta.php");
	}

}

?>

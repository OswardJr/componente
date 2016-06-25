<?php
	/**
	* 
	*/
	class PresupuestosController 
	{
		
		public function __construct(){
			if (($_SESSION['id_emp']) == "") {
				header("Location: ".Conectar::ruta()."?controller=login");
			}
		}
		
		public function index(){
			# code...
		}

		public function create(){
			require_once("views/layout/template.php");
			require_once("views/presupuestos/nuevo_presup.php");
		}

		public function getById(){
			# code...
		}

		public function update(){
			# code...
		}

		public function delete(){
			# code...
		}
	}


	?>

<?php session_start();
require_once("includes/config.php");
	//Funciones para el controlador
require_once("includes/baseController.php");
	//Cargamos controladores y acciones
if(isset($_GET["controller"])){
	$controllerObj=cargarControlador($_GET["controller"]);
	lanzarAccion($controllerObj);
}else{
	$controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
	lanzarAccion($controllerObj);
}

?>

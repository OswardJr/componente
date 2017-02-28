<?php session_start();
date_default_timezone_set('America/Los_Angeles');
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

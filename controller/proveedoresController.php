<?php
/**
* controller for proveedores
*/
class ProveedoresController{

	public function __construct()
	{
		require_once("model/provModel.php");
		if (($_SESSION['id_emp']) == "") {
			header("Location: ".Conectar::ruta()."?controller=login");
		}
	}

	/*Listar proveedores*/
	public function index()
	{
		require_once("views/layout/template.php");
		require_once("views/proveedores/proveedores.php");

	}

	public function all(){
		$p = new proveedor();
		$proveedor = $p->get_proveedores() ;
		$data = array();
		foreach ($proveedor as $person) {
			$row = array($person['rif'],
				$person['razon_social'],
				$person['direccion'],
				$person['telefono'],
				'<a  data-toggle="tooltip" title="Ver" href="javascript:void(0)" onclick="javascript:ver_proveedor('."'".$person['id_prov']."'".')"><i class=" btn btn-xs btn-ver 
				glyphicon glyphicon-eye-open"></i></a>
				<a  data-toggle="tooltip" title="Editar" href="javascript:void(0)" onclick="javascript:editar_proveedor('."'".$person['id_prov']."'".')"><i class=" btn btn-xs btn-editar
					glyphicon glyphicon-pencil"></i></a>
					<a  data-toggle="tooltip" title="Eliminar" href="javascript:void(0)" onclick="javascript:eliminarProv('."'".$person['id_prov']."'".')" ><i class=" btn btn-xs btn-delete 
						glyphicon glyphicon-trash"></i></a>');
			$data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}


	/*crear proveedor*/
	public function create()
	{
		require_once("views/layout/template.php");
		require_once("views/proveedores/crear_proveedor.php");
 
		$proveedor = new proveedor;	
		if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
			$rif = $_POST['rif'];
			$razon_social = $_POST['razon_social'];
			$telefono = $_POST['telefono'];
			$email = $_POST['email'];
			$direccion = $_POST['direccion'];
			$status = 'activo';
			$proveedor->create_proveedor($rif,$razon_social,$telefono,$email,$direccion,$status);
		}
	}

	/*comprobar si existe un proveedor*/
	public function getProveedorByRif()
	{
		$rif = $_GET["rif"];
		if(empty($_GET["rif"]))
		{
			echo "Debe introducir un Rif";
			exit;
		}	
		$p = new proveedor();
		if (isset($_GET["rif"]) and $_GET["rif"] != "") {
			$proveedor = $p->get_proveedor_by_rif($rif);
			if ($proveedor > 0) {
				echo "El proveedor ya existe";
			}else{
				echo "El proveedor no existe";
			}
		}

	}
	/*obtener datos de un proveedor*/
	public function searchproveedorByid()
	{
		$id_prov = $_GET["id_prov"];	
		$c = new proveedor();
		if (isset($_GET["id_prov"]) and $_GET["id_prov"] != "") {
			$proveedor = $c->get_proveedor_by_id($id_prov);
		}

	}

	/*actualizar proveedor*/
	public function update()
	{
		$proveedor = new proveedor;	
		if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
			$rif = $_POST['rif'];
			$razon_social = $_POST['razon_social'];
			$telefono = $_POST['telefono'];
			$email = $_POST['email'];
			$direccion = $_POST['direccion'];
			$id_prov = $_POST['id_prov'];
			$proveedor->update_proveedor($rif,$razon_social,$telefono,$email,$direccion, $id_prov);
		}else{
			echo "fallo";
		}
	}
	/*eliminar un proveedor*/
	public function delete()
	{
		$id_prov=$_GET["id_prov"];
		$p = new proveedor();
		if (isset($_GET["id_prov"])){
			$p->delete_proveedor($id_prov);
		}else{
			header("location: ".Conectar::ruta()."?controller=error&action=index");
			exit();
		}
	}
	
}


?>

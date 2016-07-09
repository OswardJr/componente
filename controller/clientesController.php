<?php

class ClientesController{

	public function __construct()
	{
		require_once("model/clienteModel.php");
		if (($_SESSION['id_emp']) == "") {
			header("Location: ".Conectar::ruta()."?controller=login");
		}

	}

	/*Listar clientes*/
	public function index()
	{
		require_once("views/layout/template.php");
		require_once("views/clientes/clientes.php");

	}

	public function all()
	{
		$c = new cliente();
		$clientes = $c->get_clientes() ;
		$data = array();
		foreach ($clientes as $person) {
			$row = array($person['rif'],
				$person['razon_social'],
				$person['direccion'],
				$person['telefono'],
				'<a  data-toggle="tooltip" title="Ver" href="javascript:void(0)" onclick="javascript:ver_cliente('."'".$person['id_cliente']."'".')"><i class=" btn btn-xs btn-ver
				glyphicon glyphicon-eye-open"></i></a>
				<a  data-toggle="tooltip" title="Editar" href="javascript:void(0)" onclick="javascript:editar_cliente('."'".$person['id_cliente']."'".')"><i class=" btn btn-xs btn-editar
					glyphicon glyphicon-pencil"></i></a>
					<a  data-toggle="tooltip" title="Eliminar" href="javascript:void(0)" onclick="javascript:eliminarCliente('."'".$person['id_cliente']."'".')" ><i class=" btn btn-xs btn-delete
						glyphicon glyphicon-trash"></i></a>');
			$data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}


	/*crear clientes*/
	public function create()
	{
		require_once("views/layout/template.php");
		require_once("views/clientes/crear_cliente.php");

		$cliente = new cliente;
		if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
			$rif = $_POST['rif'];
			$razon_social = $_POST['razon_social'];
			$telefono = $_POST['telefono'];
			$email = $_POST['email'];
			$direccion = $_POST['direccion'];
			$status = 'activo';
			$cliente->create_cliente($rif,$razon_social,$telefono,$email,$direccion,$status);
		}
	}

	/*comprobar si existe un cliente*/
  public function getClienteByRif(){
    $objProducto = new cliente();
    if ($_GET['rif']!=''){
      $rif = $_GET['rif'];
      $producto = $objProducto->get_cliente_by_rif($rif);
    }else if($_GET['rif']==''){
     $data = array();
     $data['success'] = true;
     $data['msj'] = 'debes introducir el rif';
     echo json_encode($data);
   }

 }

 /* este es para obtener y ver*/
 public function searchClienteByid()
 {
  $id_cliente = $_GET["id_cliente"];
  $c = new cliente();
  if (isset($_GET["id_cliente"]) and $_GET["id_cliente"] != "") {
   $cliente = $c->get_cliente_by_id($id_cliente);
 }

}

/*actualizar clientes*/
public function update()
{
  $cliente = new cliente;
  if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
   $rif = $_POST['rif'];
   $razon_social = $_POST['razon_social'];
   $telefono = $_POST['telefono'];
   $email = $_POST['email'];
   $direccion = $_POST['direccion'];
   $id_cliente = $_POST['id_cliente'];
   $cliente->update_cliente($rif,$razon_social,$telefono,$email,$direccion, $id_cliente);
 }
}
/*eliminar un cliente*/
public function delete()
{
  $id_cliente=$_GET["id_cliente"];
  $c = new cliente();
  if (isset($_GET["id_cliente"])){
   $c->delete_cliente($id_cliente);
 }else{
   header("location: ".Conectar::ruta()."?controller=error&action=index");
   exit();
 }
}



}


?>

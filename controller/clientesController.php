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

  public function autoCliente(){
    $searchTerm = $_GET['term'];
    $p = new cliente();
    $p->auto_cliente($searchTerm);
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

// public function validate($rif,$razon_social,$telefono,$direccion) {
//   $data = array();
//   $data['error_string'] = array();
//   $data['inputerror'] = array();
//   $data['status'] = TRUE;

//   if ($rif == '' ) {
//     $data['error_string'][] = 'Ingrese un Rif';
//     $data['inputerror'] = 'rif';
//     $data['status'] = FALSE;
//   }
//   if ($rif == '' ) {
//     $data['error_string'][] = 'Ingrese una razon social';
//     $data['inputerror'] = 'razon_social';
//     $data['status'] = FALSE;
//   }
//   if ($rif == '' ) {
//     $data['error_string'][] = 'Ingrese un telefono';
//     $data['inputerror'] = 'telefono';
//     $data['status'] = FALSE;
//   }
//   if ($rif == '' ) {
//     $data['error_string'][] = 'Ingrese una direccion';
//     $data['inputerror'] = 'direccion';
//     $data['status'] = FALSE;
//   }
//   if ($data['status'] === FALSE) {
//       echo json_encode($data);
//       exit();
//   }

// }

/*comprobar si existe un cliente*/
public function getClienteByRif(){
  $objProducto = new cliente();
  if ($_GET['rif']!=''){
    $rif = $_GET['rif'];
    $producto = $objProducto->get_cliente_by_rif($rif);
  }else if($_GET['rif']==''){
   $data = array();
   $data['success'] = true;
   $data['msj'] = 'Debes introducir un Rif';
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

  public function crearforjson()
    {
      $cliente = new cliente;
      if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
        $rif = $_POST['rif'];
        $razon_social = $_POST['razon_social'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $status = 'activo';
        $cliente->create_cliente_for_json($rif,$razon_social,$telefono,$email,$direccion,$status);
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

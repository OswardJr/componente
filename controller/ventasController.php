<?php
	/**
	*
	*/
	class ventasController
	{

		public function __construct(){
			   require_once("model/ventaModel.php");
     		 require_once("model/prodModel.php");
			if (($_SESSION['id_emp']) == "") {
				header("Location: ".Conectar::ruta()."?controller=login");
			}
		}

		public function index(){
			$c= new venta;
      		$numorden = $c->numorden();
     		require_once("model/categoriaModel.php");
     		$c = new categoria();
      		$categorias = $c->get_categorias() ;
      		require_once("views/layout/template.php");
     		require_once("views/ventas/nuevaVenta.php");
		}

		public function create(){
			 if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
        $venta = new venta;
        $cod_venta = $_POST['cod_factura'];
        $id_cliente = $_POST['id_cliente'];
        $id_emp = $_POST['id_emp'];
        $fecha_actual = $_POST['fecha'];
        $forma_pago = $_POST['forma_pago'];
        $impuesto = $_POST['impuesto'];
        $subtot = $_POST['subtotal'];
        $tot = $_POST['total'];
        $status = 'activo';
        $datos=array();
        foreach ($_POST['cod'] as $key => $value) {
          $datos[$key]['cod']=$value;
        }
        foreach ($_POST['cant'] as $key => $value) {
          $datos[$key]['cant']=$value;
        }
        foreach ($_POST['precio_p'] as $key => $value) {
          $datos[$key]['precio_p']=$value;
        }
        $venta->create_venta($cod_venta,$id_cliente,$id_emp,$fecha_actual,$forma_pago,$impuesto,$subtot,$tot,$status,$datos);
      }
		}

    public function agregar(){
     $objProducto = new producto();
     if (isset($_GET['codigo']) && $_GET['codigo']!='' && isset($_GET['cantidad']) && $_GET['cantidad']!='') {
       try {
        $cantidad = $_GET['cantidad'];
        $codigo = $_GET['codigo'];
        $precio = $_GET['precio'];
        $producto = $objProducto->agregar_producto($codigo,$cantidad,$precio);
      } catch (PDOException $e) {
        $e->getMessage();
      }
    }
  }
  public function listado(){
    require_once("views/layout/template.php");
    require_once("views/ventas/listadoVentas.php");
  }
    public function buscarCliente(){
   require_once("model/clienteModel.php");
   $rif = $_GET["rif"];
   if(empty($_GET["rif"]))
   {
     echo 1 ;
     exit;
   }
   $p = new cliente();
   if (isset($_GET["rif"]) and $_GET["rif"] != "") {
     $cliente = $p->buscar_cliente($rif);
   }
 }
  public function buscarProducto(){
   require_once("model/prodModel.php");
   $codigo = $_GET["codigo"];
   if(empty($_GET["codigo"]))
   {
     echo 1 ;
     exit;
   }
   $p = new producto();
   if (isset($_GET["codigo"]) and $_GET["codigo"] != "") {
     $cliente = $p->buscar_producto($codigo);
   }
 }
 public function eliminar(){
  $json = array();
  $json['msj'] = 'Producto Eliminado';
  $json['success'] = true;

  if (isset($_POST['codigo'])) {
    try {
      $codigo = $_POST['codigo'];
      unset($_SESSION['detalle'][$codigo]);
      $json['success'] = true;

      echo json_encode($json);

    } catch (PDOException $e) {
      $json['msj'] = $e->getMessage();
      $json['success'] = false;
      echo json_encode($json);
    }
  }
}
		public function update(){
			# code...
		}

		public function delete(){
			# code...
		}

		public function all(){

      $c = new venta();
      $ventas = $c->get_ventas() ;
      $data = array();
      foreach ($ventas as $com) {
        $fecha = date_create($com['fecha']);//funcion para voltear la fecha
        $row = array($com['codigo'],
          $com['cliente'],
        date_format($fecha, 'd-m-Y'),//se voltea la fecha
        $com['monto'],
        '<a  data-toggle="tooltip" title="Ver" href="javascript:void(0)" onclick=""><i class=" btn btn-xs btn-ver
        glyphicon glyphicon-eye-open"></i></a>
        <a  data-toggle="tooltip" title="Eliminar" href="javascript:void(0)" onclick="" ><i class=" btn btn-xs btn-delete
          glyphicon glyphicon-trash"></i></a>');
        $data[] = $row;
      }
      $output = array("data" => $data);
      echo json_encode($output);

		}
		public function destruirCarrito(){
 		 try {
   		 unset($_SESSION['detalle']);
  		} 	catch (PDOException $e) {
   		$e->getMessage();
 		}
}
	}


	?>

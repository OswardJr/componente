<?php
	/**
	* 
	*/
	class ComprasController 
	{
		public function __construct(){
      require_once("model/comprasModel.php");
      require_once("model/prodModel.php");

      if (($_SESSION['id_emp']) == "") {
        header("Location: ".Conectar::ruta()."?controller=login");
      }

    }
    public function index(){
     $c= new compra;	
     $numorden = $c->numorden();
     require_once("views/layout/template.php");
     require_once("views/compras/nuevaCompra.php");

   }

   public function create(){
    
     if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
       $compra = new compra;	
       $cod_factura = $_POST['cod_factura'];
       $id_prov = $_POST['id_prov'];
       $id_emp = $_POST['id_emp'];
       $fecha = $_POST['fecha'];
       $forma_pago = $_POST['forma_pago'];
       $subtotal = $_POST['subtotal'];
       $impuesto = $_POST['impuesto'];
       $total = $_POST['total'];
       $status = 'activo';
       $compra->create_compra($cod_factura,$id_prov,$id_emp,$fecha,$forma_pago,$subtotal,$impuesto,$total,$status);
     }
     $cod_factura = $_POST['cod_factura'];
     if (!empty($cod_factura) and $cod_factura > 0){
      $det_compra = new compra;	
      $datos=array();
      foreach ($_POST['cod'] as $key => $value) {
       $datos[$key]['cod']=$value;
     }
     foreach ($_POST['cant'] as $key => $value) {
       $datos[$key]['cant']=$value;
     }
     $det_compra->det_compra($cod_factura,$datos);
   }
   
      /* $this->agregar_producto_factura($ultimo_id,$datos);
			if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
				$det_compra = new compra;	
			    $cod = $_POST['codigo'];
			    $cod_factura = $_POST['cod_factura'];
			    $cant = $_POST['cantidad'];
			    $det_compra->det_compra($codigo,$cod_factura,$cantidad);
       }*/
     }

     public function agregar(){
       $objProducto = new producto();
       if (isset($_GET['codigo']) && $_GET['codigo']!='' && isset($_GET['cantidad']) && $_GET['cantidad']!='') {
         try {
          $cantidad = $_GET['cantidad'];
          $codigo = $_GET['codigo'];		
          $producto = $objProducto->agregar_producto($codigo,$cantidad);
        } catch (PDOException $e) {
          $e->getMessage();
        }
      }
    }
    public function getById(){
			# code...
    }
    public function buscarProveedor(){
     require_once("model/provModel.php");
     $rif = $_GET["rif"];
     if(empty($_GET["rif"]))
     {
       echo 1 ;
       exit;
     }	
     $p = new proveedor();
     if (isset($_GET["rif"]) and $_GET["rif"] != "") {
       $proveedor = $p->buscar_proveedor($rif);
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
       $proveedor = $p->buscar_producto($codigo);
     }
   }

   public function update(){
			# code...
   }

   public function delete(){
      # code...
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
 }


 ?>

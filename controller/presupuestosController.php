<?php
		class PresupuestosController 
				{
				public function __construct()

		{

		require_once("model/prodModel.php");
		require_once("model/presupuestosModel.php");
			if (($_SESSION['id_emp']) == "") {
				header("Location: ".Conectar::ruta()."?controller=login");
			}
		}
		
		public function index()

		{

				$c= new presupuesto;	
				        $serial = $c->serial();
				        	require_once("model/categoriaModel.php");
				        		$c = new categoria();
				        			$categorias = $c->get_categorias() ;
				        				require_once("views/layout/template.php");
				       					 require_once("views/presupuestos/nuevo_presup.php");		
				    }

		public function create()

		{
			if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
			          $presupuesto = new presupuesto;	
			          $cod_presu = $_POST['cod_factura'];
			          $id_cliente = $_POST['id_cliente'];
			          $id_emp = $_POST['id_emp'];
			          $fecha_actual = $_POST['fecha'];
			          $fecha_vencimiento = $_POST['fecha_vencimiento'];
			          $impuesto = $_POST['impuesto'];
			          $descuento = $_POST['descuento'];
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
				            $presupuesto->create_presupuesto($cod_presu,$id_cliente,$id_emp,$fecha_actual,$fecha_vencimiento,$impuesto,$descuento,$subtot,$tot,$status,$datos);
				        }
			}
			
		  public function buscarCliente()

		  {

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

		   public function agregar()

		   {

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

			public function buscarProducto()

			{
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

		public function delete()
		{
			# code...
		}

		public function all()

		{
		    $c = new presupuesto();
		    $presupuestos = $c->get_presupuestos() ;
		    $data = array();
		    foreach ($presupuestos as $presu) {
		        $fecha = date_create($presu['fecha']);//funcion para voltear la fecha
		        $row = array($presu['codigo'],
		        $presu['cliente'],
		        date_format($fecha, 'd-m-Y'),//se voltea la fecha
		        $presu['monto'],
		        '<a  data-toggle="tooltip" title="Ver" href="javascript:void(0)" onclick=""><i class=" btn btn-xs btn-ver
		        glyphicon glyphicon-eye-open"></i></a>
		          <a  data-toggle="tooltip" title="Eliminar" href="javascript:void(0)" onclick="" ><i class=" btn btn-xs btn-delete
		            glyphicon glyphicon-trash"></i></a>');
		      $data[] = $row;
		    }
		    $output = array("data" => $data);
		    echo json_encode($output);
		 }

		public function Reporte()
		{
	      require_once("views/layout/template.php");
	      require_once("views/presupuestos/ReportePresu.php");
	    }

		 public function destruirCarrito(){
		  try {
		    unset($_SESSION['detalle']);
		  } catch (PDOException $e) {
		   $e->getMessage();
		 }
	}
		   public function eliminar()

		   {
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

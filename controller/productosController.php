<?php
	/**
	*
	*/
	class ProductosController
	{
		public function __construct(){
			require_once("model/prodModel.php");
			if (($_SESSION['id_emp']) == "") {
				header("Location: ".Conectar::ruta()."?controller=login");
			}
		}
		public function index(){
			require_once("views/layout/template.php");
			require_once("views/productos/productos.php");

		}

		public function all(){
			$p = new producto();
			$productos = $p->get_productos() ;
			$data = array();
			foreach ($productos as $p) {
				$row = array($p['codigo'],
					$p['descripcion'],
					$p['categoria'],
					$p['compra'],
					$p['venta'],
					$p['stock_minimo'],
					$p['stock'],
					'<a  data-toggle="tooltip" title="Ver" href="javascript:void(0)" onclick="javascript:ver_cliente('."'".$p['codigo']."'".')"><i class=" btn btn-xs btn-ver
					glyphicon glyphicon-eye-open"></i></a>
					<a  data-toggle="tooltip" title="Editar" href="javascript:void(0)" onclick="javascript:editar_cliente('."'".$p['codigo']."'".')"><i class=" btn btn-xs btn-editar
						glyphicon glyphicon-pencil"></i></a>
						<a  data-toggle="tooltip" title="Eliminar" href="javascript:void(0)" onclick="javascript:eliminarCliente('."'".$p['codigo']."'".')" ><i class=" btn btn-xs btn-delete
							glyphicon glyphicon-trash"></i></a>');
				$data[] = $row;
			}
			$output = array("data" => $data);
			echo json_encode($output);
		}

		public function create(){
			require_once("model/categoriaModel.php");
			$c = new categoria();
			$categorias = $c->get_categorias() ;
			require_once("views/layout/template.php");
			require_once("views/productos/crear_producto.php");
			$producto = new producto;
			if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
				$codigo = $_POST['codigo'];
				$descripcion = $_POST['descripcion'];
				$modelo = $_POST['modelo'];
				$peso = $_POST['peso'];
				$color = $_POST['color'];
				$garantia = $_POST['garantia'];
				$p_compra = $_POST['p_compra'];
				$p_venta = $_POST['p_venta'];
				$stock = $_POST['stock'];
				$stock_min = $_POST['stock_min'];
				$status = 'activo';
				$procedencia = $_POST['procedencia'];
				$categoria = $_POST['categoria'];
				$producto->create_producto($codigo,$descripcion,$modelo,$peso,$color,$garantia,$p_compra,$p_venta,$stock,$stock_min,$status,$procedencia,$categoria);
			}

		}
		public function createforjson(){
			require_once("model/categoriaModel.php");
			$c = new categoria();
			$categorias = $c->get_categorias() ;
			$producto = new producto;
			if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
				$codigo = $_POST['codigo'];
				$descripcion = $_POST['descripcion'];
				$modelo = $_POST['modelo'];
				$peso = $_POST['peso'];
				$color = $_POST['color'];
				$garantia = $_POST['garantia'];
				$p_compra = $_POST['p_compra'];
				$p_venta = $_POST['p_venta'];
				$stock = $_POST['stock'];
				$stock_min = $_POST['stock_min'];
				$status = 'activo';
				$procedencia = $_POST['procedencia'];
				$categoria = $_POST['categoria'];
				$producto->create_producto_for_json($codigo,$descripcion,$modelo,$peso,$color,$garantia,$p_compra,$p_venta,$stock,$stock_min,$status,$procedencia,$categoria);
			}

		}
		public function getByCod(){
      $objProducto = new producto();
      if ($_GET['codigo']!=''){
        $codigo = $_GET['codigo'];
        $producto = $objProducto->chequear_producto($codigo);
      }else if($_GET['codigo']==''){
       $data = array();
       $data['success'] = true;
       $data['msj'] = 'Debes introducir un codigo';
       echo json_encode($data);
     }

   }


   public function update(){
			# code...
   }

   public function delete(){
			# code...
   }
 }


 ?>

<?php
	/**
	* 
	*/
	class CategoriasController 
	{
		
		public function __construct(){
			require_once("model/categoriaModel.php");
			if (($_SESSION['id_emp']) == "") {
				header("Location: ".Conectar::ruta()."?controller=login");
			}
		}
		
		public function index(){
			require_once("views/layout/template.php");
			require_once("views/categorias/categorias.php");
			
		}
		public function all(){
			$c = new categoria();
			$categorias = $c->get_categorias() ;
			$data = array();
			foreach ($categorias as $categoria) {
				$row = array($categoria['nombre'],
					$categoria['descripcion'],
					'<a  data-toggle="tooltip" title="Editar" href="javascript:void(0)" onclick="javascript:editar_categoria('."'".$categoria['id_cat']."'".')"><i class=" btn btn-xs btn-editar
					glyphicon glyphicon-pencil"></i></a>
					<a  data-toggle="tooltip" title="Eliminar" href="javascript:void(0)" onclick="javascript:eliminarCategoria('."'".$categoria['id_cat']."'".')" ><i class=" btn btn-xs btn-delete 
						glyphicon glyphicon-trash"></i></a>');
				$data[] = $row;
			}
			$output = array("data" => $data);
			echo json_encode($output);			
		}

		public function create(){
			require_once("views/layout/template.php");
			require_once("views/categorias/crear_categoria.php");
			$categoria = new categoria;	
			if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
				$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];
				$categoria->create_categoria($nombre,$descripcion);
			}
		}

		public function getCategoriaById(){
			$id_cat = $_GET["id_cat"];	
			$c = new categoria();
			if (isset($_GET["id_cat"]) and $_GET["id_cat"] != "") {
				$categoria = $c->get_categoria_by_id($id_cat);
			}
		}

		public function update(){
			$categoria = new categoria;	
			if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
				$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];
				$id_cat = $_POST['id_cat'];
				$categoria->update_categoria($nombre,$descripcion,$id_cat);
			}
		}

		public function delete(){
			$id_cat=$_GET["id_cat"];
			$categoria = new categoria();
			if (isset($_GET["id_cat"])){
				$categoria->delete_categoria($id_cat);
			}else{
				header("location: ".Conectar::ruta()."?controller=error&action=index");
				exit();
			}
		}
	}


	?>

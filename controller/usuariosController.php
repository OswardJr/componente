<?php
	/**
	*
	*/
	class UsuariosController
	{

		public function __construct(){
			require_once("model/usuariosModel.php");
			if (($_SESSION['id_emp']) == "") {
				header("Location: ".Conectar::ruta()."?controller=login");
			}
		}

		public function index(){
			require_once("views/layout/template.php");
			require_once("views/usuarios/usuarios.php");

		}
		public function all(){
			$u = new usuario();
			$usuario = $u->get_users() ;
			$data = array();
			foreach ($usuario as $person) {
				$row = array($person['cedula'],
					$person['nombre'],
					$person['apellido'],
					$person['username'],
					$person['rol'],
					'<a  data-toggle="tooltip" title="Ver" href="javascript:void(0)" onclick="javascript:ver_usuario('."'".$person['cedula']."'".')"><i class=" btn btn-xs btn-ver
					glyphicon glyphicon-eye-open"></i></a>
					<a  data-toggle="tooltip" title="Editar" href="javascript:void(0)" onclick="javascript:editar_usuario('."'".$person['cedula']."'".')"><i class=" btn btn-xs btn-editar
						glyphicon glyphicon-pencil"></i></a>
						<a  data-toggle="tooltip" title="Eliminar" href="javascript:void(0)" onclick="javascript:eliminarUsuario('."'".$person['cedula']."'".')" ><i class=" btn btn-xs btn-delete
							glyphicon glyphicon-trash"></i></a>');
				$data[] = $row;
			}
			$output = array("data" => $data);
			echo json_encode($output);
		}

		public function create(){
			require_once("views/layout/template.php");
			require_once("views/usuarios/crear_usuario.php");
			$usuario = new usuario;
			if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
				$cedula = $_POST['cedula'];
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$username = $_POST['username'];
				$password= sha1($_POST['password']);
				$rol= $_POST['rol'];
				$status= $_POST['status'];
				$usuario->create_user($cedula,$nombre,$apellido,$username,$password,$rol,$status);
			}
		}

		public function getUserByCedula(){
			$cedula = $_GET["cedula"];
			$u = new usuario();
			if (isset($_GET["cedula"]) and $_GET["cedula"] != "") {
				$usuario = $u->get_user_by_cedula($cedula);
			}
		}
		public function comprobar(){
			$cedula = $_GET["cedula"];
			if(empty($_GET["cedula"]))
			{
				echo "<span class='label label-danger'>Debes introducir la cedula.</span>";
				exit;
			}
			$u= new usuario();
			if (isset($_GET["cedula"]) and $_GET["cedula"] != "") {
				$usuario = $u->comprobar_user($cedula);
				if ($usuario > 0) {
					echo "<span class='label label-success'>El usuario ya existe.</span>";
				}else{
					echo "<span class='label label-danger'>El usuario no existe.</span>";
				}
			}

		}

		public function update(){
			$usuario = new usuario;
			if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
				$cedula = $_POST['cedula'];
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$username = $_POST['username'];
				$rol= $_POST['rol'];
				$id_emp= $_POST['id_emp'];
				$usuario->update_user($cedula,$nombre,$apellido,$username,$rol,$id_emp);
			}
		}

		public function delete(){
			$cedula=$_GET["cedula"];
			$usuario = new usuario();
			if (isset($_GET["cedula"])){
				$usuario->delete_user($cedula);
			}else{
				header("location: ".Conectar::ruta()."?controller=error&action=index");
				exit();
			}
		}
	}


	?>

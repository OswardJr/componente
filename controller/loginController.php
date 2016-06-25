<?php
class LoginController 
{
    public function __construct(){
        require_once("model/usuariosModel.php");

    }

    public function index(){
        require_once("views/login.php");

    }

    public function login(){
        $u = new usuario();
        if(isset($_POST['usuario'])){
            $username= ($_POST['usuario']);
            $contrasena = sha1($_POST['clave']);
            $u->login($username, $contrasena);
        }
    }

    public function logout(){
        session_destroy();
        header("location: ".Conectar::ruta()."?controller=login&action=index");
    }
}
?>


<?php
class LoginController
{
    public $pdo;

    public function __construct(){
         $this->pdo = new PDO('mysql:host=localhost;dbname=componente', 'root', '12345678');
        require_once("model/usuariosModel.php");
        require_once("controller/utilidadesController.php");

    }

    public function index(){
        require_once("views/login.php");

    }
    public function recuperar(){
        require_once("views/recuperar.php");
    }
    public function getpregunta(){
        $username = $_GET['username'];
        $query = $this->pdo->prepare('SELECT pregunta FROM empleados WHERE username=?');
        $query->bindParam(1, $username);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_COLUMN);
        echo json_encode($data);
        $this->pdo = null;
    }
     public function checkrespuesta(){
        $respuesta = $_GET['respuesta'];
        $query = $this->pdo->prepare('SELECT * FROM empleados WHERE respuesta=?');
        $query->bindParam(1, $respuesta);
        $query->execute();
        $data = $query->fetch();
        $contar = $query->rowCount();
        if ($contar > 0) {
            echo 1;
        }else{
            echo 2;
        }
        $this->pdo = null;
    }
      public function setpassword(){
        $clave = md5($_GET['clave']);
        $username = $_GET['username'];
        $query = $this->pdo->prepare('UPDATE empleados SET password = ? WHERE username = ?');
        $query->bindParam(1, $clave);
        $query->bindParam(2, $username);
        $query->execute();
        echo 1;
        $this->pdo = null;
    }

    public function login(){

        $u = new usuario();
        if(isset($_POST['usuario'])){
            $username= ($_POST['usuario']);
            $contrasena = md5($_POST['clave']);
            $u->login($username, $contrasena);
        }
    }

    public function logout(){
        session_destroy();
        header("location: ".Conectar::ruta()."?controller=login&action=index");
    }
}
?>


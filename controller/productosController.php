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

    public function searchProductoBycod()
 {
  $cod_prod = $_GET["cod_prod"];
  $c = new producto();
  if (isset($_GET["cod_prod"]) and $_GET["cod_prod"] != "") {
   $producto = $c->get_producto_by_cod($cod_prod);
 }

}


    public function borrar(){
      $cod_prod=$_GET["cod_prod"];
      $producto = new producto();
      if (isset($_GET["cod_prod"])){
        $producto->borrar_producto($cod_prod);
      }else{
        header("location: ".Conectar::ruta()."?controller=error&action=index");
        exit();
      }
    }

/*actualizar productos*/


  public function modificar()  {
   require_once("model/categoriaModel.php");
   $producto = new producto;
   if((isset($_SESSION['token'])) && ($_POST['token'] == $_SESSION['token'])){
     $descripcion = $_POST['descripcion'];
     $modelo = $_POST['modelo'];
     $peso = $_POST['peso'];
     $color = $_POST['color'];
     $p_compra = $_POST['p_compra'];
     $p_venta = $_POST['p_venta'];
     $stock = $_POST['stock'];
     $stock_min = $_POST['stock_min'];
     $status = $_POST['status'];
     $procedencia = $_POST['procedencia'];
     $categoria = $_POST['categoria'];
     $cod_prod = $_POST['cod_prod'];

     $producto->modificar_producto($descripcion,$modelo,$peso,$color,$garantia,$p_compra,$p_venta,$stock,$stock_min,$status,$procedencia,$categoria,$cod_prod);
   }else{
     echo "fallo";
   }
  }

    public function all(){
      $p = new producto();
      $productos = $p->get_productos() ;
      $data = array();
      foreach ($productos as $p) {
        $stock = $p['stock'];
        if ($stock < 100 ) {
            $stock = '<span class="label label-danger">'.$stock.'</span>' ;
        }else{
            $stock = '<span class="label label-success">'.$stock.'</span>' ;
        }
        $row = array($p['codigo'],
          $p['descripcion'],
          $p['categoria'],
          $p['compra'],
          $p['stock_minimo'],
          $stock,
          '<a  data-toggle="tooltip" title="Ver" href="javascript:void(0)" onclick="javascript:ver_producto('."'".$p['codigo']."'".')"><i class=" btn btn-xs btn-ver
          glyphicon glyphicon-eye-open"></i></a>
          <a  data-toggle="tooltip" title="Editar" href="javascript:void(0)" onclick="javascript:editar_producto('."'".$p['codigo']."'".')"><i class=" btn btn-xs btn-editar
            glyphicon glyphicon-pencil"></i></a>
            <a  data-toggle="tooltip" title="Eliminar" href="javascript:void(0)" onclick="javascript:borrarProducto('."'".$p['codigo']."'".')" ><i class=" btn btn-xs btn-delete
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

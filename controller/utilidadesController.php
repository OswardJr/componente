<?php

class UtilidadesController
{
    public $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=componente', 'root', '12345678');
        if (($_SESSION['id_emp']) == "") {
            header("Location: ".Conectar::ruta()."?controller=login");
        }
    }

    public function index(){
        require_once("views/layout/template.php");
        require_once("views/utilidades/utilidades.php");
    }

    public function valorBancos(){
        try
        {
            $query = $this->pdo->prepare('SELECT nombre FROM bancos');
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_COLUMN);
            return $data;
            $this->pdo = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function valorIva(){
        try
        {
            $query = $this->pdo->prepare('SELECT impuesto FROM utilidades');
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_COLUMN);
            return $data;
            $this->pdo = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function getBancos(){
        try
        {
            $query = $this->pdo->prepare('SELECT nombre FROM bancos');
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_COLUMN);
            echo json_encode($data);
            $this->pdo = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }
     public function getIva(){
        try
        {
            $query = $this->pdo->prepare('SELECT impuesto FROM utilidades');
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_COLUMN);
            echo json_encode($data);
            $this->pdo = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function setIva(){
       $iva = $_POST['impuesto'];
        try {
              $query = $this->pdo->prepare('UPDATE utilidades SET impuesto = ?');
              $query->bindParam(1, $iva);
              $query->execute();
              $data = "1";
              echo json_encode($data);
              $this->pdo = null;
            } catch (PDOException $e) {
              $e->getMessage();
            }
    }

    public function setBanco(){
       $nombre = $_POST['nombre'];
        try {
              $query = $this->pdo->prepare('INSERT bancos VALUES(null,?)');
              $query->bindParam(1, $nombre);
              $query->execute();
              $data = "1";
              echo json_encode($data);
              $this->pdo = null;
            } catch (PDOException $e) {
              $e->getMessage();
            }
    }

    public function bitacora(){
        require_once("views/layout/template.php");
        require_once("views/utilidades/bitacora.php");
    }

    public function comprafecha(){
      $primera = $_GET['primera'];
      $segunda = $_GET['segunda'];
        try
        {
            $query = $this->pdo->prepare('
              SELECT
                *
              FROM
                compras
              WHERE
                fecha_actual AND fecha_actual BETWEEN ' .'"'.$primera .'"'. ' AND '. '"' . $segunda . '"'.'
              GROUP BY
              fecha_actual
              ');
            $query->execute();
            $acciones = $query->fetchAll();
            $data = array();
      foreach ($acciones as $person) {
        $id_prov =  $person['id_prov'];
        $id = $this->getprov($id_prov);
      
         $data[]= $person['cod_compra'];
         $data[]= $id;
         $data[]=  $person['fecha_actual'];
         $data[]=  $person['tot'];
         $datas[]= $data;
       
      }
      $output = array("data" => $datas);
      echo json_encode($output);
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function listadoclientefecha(){
      $primera = $_GET['primera'];
      $segunda = $_GET['segunda'];
        try
        {
            $query = $this->pdo->prepare('
              SELECT
                *
              FROM
                ventas
              WHERE
                fecha_actual AND fecha_actual BETWEEN ' .'"'.$primera .'"'. ' AND '. '"' . $segunda . '"'.'
              GROUP BY
              fecha_actual
              ');
            $query->execute();
            $acciones = $query->fetchAll();
            $data = array();
      foreach ($acciones as $person) {
        $id_cliente =  $person['id_cliente'];
        $id = $this->getcliente($id_cliente);
      
         $data[]= $person['cod_venta'];
         $data[]= $id;
         $data[]=  $person['fecha_actual'];
         $data[]=  $person['tot'];
         $datas[]= $data;
       
      }
      $output = array("data" => $datas);
      echo json_encode($output);
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function listadoclientepresu(){
      $primera = $_GET['primera'];
      $segunda = $_GET['segunda'];
        try
        {
            $query = $this->pdo->prepare('
              SELECT
                *
              FROM
                presupuestos
              WHERE
                fecha_actual AND fecha_actual BETWEEN ' .'"'.$primera .'"'. ' AND '. '"' . $segunda . '"'.'
              GROUP BY
              fecha_actual
              ');
            $query->execute();
            $acciones = $query->fetchAll();
            $data = array();
      foreach ($acciones as $person) {
        $id_cliente =  $person['id_cliente'];
        $id = $this->getclientepresu($id_cliente);
      
         $data[]= $person['cod_presu'];
         $data[]= $id;
         $data[]=  $person['fecha_actual'];
         $data[]=  $person['tot'];
         $datas[]= $data;
       
      }
      $output = array("data" => $datas);
      echo json_encode($output);
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }
    public function getMovimientos(){
        try
        {
            $query = $this->pdo->prepare('SELECT * FROM bitacora order by id_mov desc limit 30');
            $query->execute();
            $acciones = $query->fetchAll();
            $data = array();
                foreach ($acciones as $accion) {
                    $row = array($accion['id_mov'],
                    $accion['responsable'],
                    $accion['accion'],
                    $accion['fecha']);
                    $data[] = $row;
                }
                $output = array("data" => $data);
                echo json_encode($output);
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function getchartcompras(){
        $i=1;
        while ($i <= 12) {
            $valor = 0;
            for ( $k=0 ; $k < 31 ; $k++ ) {
                if ( $k < 10 ) {
                    $k =  str_pad($k, 2, "0", STR_PAD_LEFT);
                }
                $query = $this->pdo->prepare('SELECT COUNT(*) as dato FROM compras where fecha_actual LIKE :num ');
                $query->bindValue("num", "%2017-$i-$k");
                $query->execute();
                $datos = $query->fetchAll();
                $data = array();
                foreach ($datos as $dato) {
                   $output =  array();
                   $output = $dato['dato'];
                   $output = intval($output);
                   $valor = $valor + $output;
                }
            }
            $datico[] = $valor;
                if ($i == 12) {
                    $json =  array('valores' => $datico );
                    echo json_encode($datico);
                    // resultado es ["12","15","78","35"]
                }
            $i++;
        }
    }

    public function getchartpresupuestos(){
        $i=1;
        while ($i <= 12) {
            $valor = 0;
           for ($k=0; $k < 31;$k++) {
            if ($k<10) {
                $k =  str_pad($k, 2, "0", STR_PAD_LEFT);
            }
            $query = $this->pdo->prepare('SELECT COUNT(*) as dato FROM presupuestos where fecha_actual LIKE :num ');
            $query->bindValue("num", "%2017-$i-$k");
            $query->execute();
            $datos = $query->fetchAll();
             $data = array();
            foreach ($datos as $dato) {
             $output =  array();
             $output = $dato['dato'];
             $output = intval($output);
             $valor = $valor + $output;
            }
           }
            $datico[] = $valor;
           if ($i == 12) {
            $json =  array('valores' => $datico );
             echo json_encode($datico);
           }
         $i++;
        }
    }
    public function getchartventas(){
        $i=1;
        while ($i <= 12) {
            $valor = 0;
           for ($k=0; $k < 31;$k++) {
            if ($k<10) {
                $k =  str_pad($k, 2, "0", STR_PAD_LEFT);
            }
            $query = $this->pdo->prepare('SELECT COUNT(*) as dato FROM ventas where fecha_actual LIKE :num ');
            $query->bindValue("num", "%2017-$i-$k");
            $query->execute();
            $datos = $query->fetchAll();
             $data = array();
            foreach ($datos as $dato) {
             $output =  array();
             $output = $dato['dato'];
             $output = intval($output);
             $valor = $valor + $output;
            }
           }
            $datico[] = $valor;
           if ($i == 12) {
            $json =  array('valores' => $datico );
             echo json_encode($datico);
           }
         $i++;
        }
    }
    public function setMovimientos($responsable,$accion){
        try
        {
            $query = $this->pdo->prepare('INSERT INTO bitacora VALUES(null,?,?,null)');
            $query->bindParam(1, $responsable);
            $query->bindParam(2, $accion);
            $query->execute();
            $this->pdo = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }
         public function getprov($id_prov){
        try
        {
            $query = $this->pdo->prepare('SELECT razon_social FROM proveedores where id_prov = '.$id_prov.'');
            $query->execute();
            $data = $query->fetchAll();
            foreach ($data as $key) {
              return $key['razon_social'];
            }
            $this->pdo = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

             public function getcliente($id_cliente){
        try
        {
            $query = $this->pdo->prepare('SELECT razon_social FROM clientes where id_cliente = '.$id_cliente.'');
            $query->execute();
            $data = $query->fetchAll();
            foreach ($data as $key) {
              return $key['razon_social'];
            }
            $this->pdo = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

                 public function getclientepresu($id_cliente){
        try
        {
            $query = $this->pdo->prepare('SELECT razon_social FROM clientes where id_cliente = '.$id_cliente.'');
            $query->execute();
            $data = $query->fetchAll();
            foreach ($data as $key) {
              return $key['razon_social'];
            }
            $this->pdo = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }


}

?>

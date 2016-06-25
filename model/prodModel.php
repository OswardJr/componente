<?php


Class producto extends Conectar
{ 

  public function get_productos()
  {
    try 
    {
      $query = $this->dbh->prepare(
        'SELECT
        p.codigo,
        p.descripcion,
        c.nombre as categoria,
        p.p_compra as compra,
        p.p_venta as venta,
        p.stock_minimo,
        p.stock
        FROM
        productos AS p
        INNER JOIN
        categorias AS c 
        ON p.id_categoria = c.id_cat
        WHERE
        STATUS = "activo"
        ORDER BY codigo DESC;');
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    }catch (PDOException $e) 
    {
      $e->getMessage();
    }
  } 
  public function buscar_producto($codigo)
  {
    try 
    {
      $query = $this->dbh->prepare(
        'SELECT
        codigo,
        p_venta as precio,
        descripcion,
        stock,
        stock_minimo
        FROM productos 
        WHERE codigo = ? ');
      $query->bindParam(1, $codigo);
      $query->execute();
      $data = $query->fetch();
      echo json_encode($data);
      $this->dbh = null;
    }catch (PDOException $e) 
    {
      $e->getMessage();
    }
  }

  public function agregar_producto($codigo,$cantidad)
  {
    try 
    {
      $query = $this->dbh->prepare(
        'SELECT
        codigo,
        p_venta as precio,
        descripcion
        FROM productos 
        WHERE codigo = ? ');
      $query->bindParam(1, $codigo);
      $query->execute();
      $producto = $query->fetchObject();
      $descripcion = $producto->descripcion;
      $precio = $producto->precio;
      $total = $cantidad * $precio;
      $_SESSION['detalle'][$codigo] = array('codigo'=>$codigo, 'descripcion'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'total'=>$total);
      $json = array();
      $json['success'] = true;
      $json['msj'] = 'Producto Agregado';
      echo json_encode($json);
      $this->dbh = null;
    }catch (PDOException $e) 
    {
      $json['msj'] = $e->getMessage();
      $json['success'] = false;
      echo json_encode($json);
    }
  }

  public function create_producto($codigo,$descripcion,$modelo,$peso,$color,$garantia,$p_compra,$p_venta,$stock,$stock_min,$status,$procedencia,$categoria)
  {
   try
   {
    $query = $this->dbh->prepare('INSERT INTO productos VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
    $query->bindParam(1, $codigo);
    $query->bindParam(2, $descripcion);
    $query->bindParam(3, $modelo);
    $query->bindParam(4, $peso);
    $query->bindParam(5, $color);
    $query->bindParam(6, $garantia);
    $query->bindParam(7, $p_compra);
    $query->bindParam(8, $p_venta);
    $query->bindParam(9, $stock);
    $query->bindParam(10, $stock_min);
    $query->bindParam(11, $status);
    $query->bindParam(12, $procedencia);
    $query->bindParam(13, $categoria);
    $query->execute();
    echo utf8_decode("<script type='text/javascript'>
      alert('Registro exitoso.');
      window.location='?controller=productos&action=index';
    </script>");
    $this->dbh = null;

  } catch (PDOException $e) {
    $e->getMessage();
  }
} 
}

?>
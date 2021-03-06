 <?php


 Class producto extends Conectar
 {

  public function get_productos()
  {
    try
    {
      $query = $this->dbh->prepare(
        'SELECT
        p.cod_prod as codigo,
        p.descripcion,
        c.nombre as categoria,
        p.p_compra as compra,
        p.p_venta as venta,
        p.stock_minimo,
        p.peso,
        p.color,
        p.stock
        FROM
        productos AS p
        INNER JOIN
        categorias AS c
        ON p.id_cat = c.id_cat
        WHERE
        STATUS = "activo"
        ORDER BY cod_prod DESC;');
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
        cod_prod as codigo,
        p_compra as precio,
        descripcion,
        stock,
        stock_minimo
        FROM productos
        WHERE cod_prod= ? && status = "activo" ');
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

public function get_producto_by_cod($cod_prod)
{
    try
    {
      $query = $this->dbh->prepare('SELECT * FROM productos WHERE cod_prod = ? && status = "activo" ');
      $query->bindParam(1, $cod_prod);
      $query->execute();
      $data = $query->fetch();
      echo json_encode($data);
      $this->dbh = null;
  }catch (PDOException $e)
  {
      $e->getMessage();
  }
}

public function agregar_producto($codigo,$cantidad,$precio)
{
    try
    {
      $query = $this->dbh->prepare(
        'SELECT
        cod_prod as codigo,
        descripcion
        FROM productos
        WHERE cod_prod = ? ');
      $query->bindParam(1, $codigo);
      $query->execute();
      $producto = $query->fetchObject();
      $descripcion = $producto->descripcion;
      $total = $cantidad * $precio;
      $json = array();
      if(array_key_exists($codigo, $_SESSION['detalle'])){
    $json['success'] = false;
    $json['msj'] = 'El producto ya esta en el carrito';
}else{
    $json['success'] = true;
    $_SESSION['detalle'][$codigo] = array('codigo'=>$codigo, 'descripcion'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'total'=>$total);
}
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
    $query = $this->dbh->prepare('SELECT * FROM productos WHERE cod_prod = ? ');
        $query->bindParam(1, $codigo);
        $query->execute();
        $query->fetch();
        //realizo validacion
        $contar = $query->rowCount();
        if ($contar > 0) {
           echo utf8_decode("<script type='text/javascript'>
            swal('El producto ya existe.');
           </script>");
           exit();
       }else{
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
     //bitacora
    $utilidades = new utilidadesController;
    $responsable = $_SESSION['nombre'];
    $accion = 'Registró un nuevo producto';
    $utilidades->setMovimientos($responsable,$accion);
    echo utf8_decode("<script type='text/javascript'>
      swal('Registro exitoso.');
  </script>");
    $this->dbh = null;

} catch (PDOException $e) {
    $e->getMessage();
}
}
}

public function modificar_producto($descripcion,$modelo,$peso,$color,$garantia,$p_compra,$p_venta,$stock,$stock_min,$status,$procedencia,$categoria)
{
    try {
      $query = $this->dbh->prepare('UPDATE productos SET descripcion = ?, modelo = ?, peso = ?, color = ?, garantia = ?, p_compra = ?, p_venta = ?, stock = ?, stock_min = ?, status = ?, procedencia = ?, categoria = ? WHERE cod_prod = ?');
      $query->bindParam(1, $descripcion);
      $query->bindParam(2, $modelo);
      $query->bindParam(3, $peso);
      $query->bindParam(4, $color);
      $query->bindParam(5,$garantia);
      $query->bindParam(6,$p_compra);
      $query->bindParam(7,$p_venta);
      $query->bindParam(8,$stock);
      $query->bindParam(9,$stock_min);
      $query->bindParam(10,$status);
      $query->bindParam(11,$procedencia);
      $query->bindParam(12,$categoria);

      $query->execute();
      $data = "1";
      echo json_encode($data);
       //bitacora
      $utilidades = new utilidadesController;
      $responsable = $_SESSION['nombre'];
      $accion = 'Actualizó los datos de un producto';
      $utilidades->setMovimientos($responsable,$accion);
      $this->dbh = null;
  } catch (PDOException $e) {
      $e->getMessage();
  }
}
public function create_producto_for_json($codigo,$descripcion,$modelo,$peso,$color,$garantia,$p_compra,$p_venta,$stock,$stock_min,$status,$procedencia,$categoria)
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
      $json['msj'] = 'Registro exitoso';
      echo json_encode($json);
   //bitacora
      $utilidades = new utilidadesController;
      $responsable = $_SESSION['nombre'];
      $accion = 'Registró un nuevo producto';
      $utilidades->setMovimientos($responsable,$accion);
      $this->dbh = null;
  } catch (PDOException $e) {
      $json['msj'] = $e->getMessage();
      echo json_encode($json);
  }

}

public function borrar_producto($cod_prod)
{
    try {
        $query = $this->dbh->prepare('UPDATE productos SET status = "inactivo" where cod_prod = ?');
        $query->bindParam(1, $cod_prod);
        $query->execute();
        $this->dbh = null;
         //bitacora
        $utilidades = new utilidadesController;
        $responsable = $_SESSION['nombre'];
        $accion = 'Eliminó un producto';
        $utilidades->setMovimientos($responsable,$accion);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

public function chequear_producto($codigo)
{
  try
  {
    $query = $this->dbh->prepare('SELECT * FROM productos WHERE cod_prod = ? ');
    $query->bindParam(1, $codigo);
    $query->execute();
    $query->fetch();
    $contar = $query->rowCount();
    $data = array();
    if ($contar > 0) {
  $data['success'] = true;
  $data['msj'] = 'El producto ya existe';
}else{
  $data['success'] = true;
  $data['msj'] = 'El producto no existe';
}
echo json_encode($data);
$this->dbh = null;
}catch (PDOException $e)
{
    $e->getMessage();
}
}

public function get_producto($cod_prod){
  try
  {
    $query = $this->dbh->prepare('SELECT * FROM productos WHERE cod_prod = ? ');
    $query->bindParam(1, $cod_prod);
    $query->execute();
    return $query->fetch();
    $this->dbh = null;
}catch (PDOException $e)
{
    $e->getMessage();
}
}


public function auto_prod($searchTerm)
{
  $return_arr = array();
  try {
      $query = $this->dbh->prepare('SELECT cod_prod FROM productos WHERE cod_prod LIKE :term && status = "activo" ');
      $query->bindValue("term", "%$searchTerm%");
      $query->execute();
      while ($row = $query->fetch()) {
    $return_arr[] = $row['cod_prod'];
}
echo json_encode($return_arr);
$this->dbh = null;
} catch (PDOException $e) {
  $e->getMessage();
}
}


}

?>

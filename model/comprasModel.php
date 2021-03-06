<?php
class compra extends Conectar
{
  public function get_compras()
  {
    try
    {
      $query = $this->dbh->prepare('
        SELECT
        c.cod_compra AS codigo,
        p.rif AS prov,
        p.razon_social AS proveedor,
        c.fecha_actual AS fecha,
        c.tot AS monto
        FROM
        compras AS c
        INNER JOIN
        proveedores AS p
        ON c.id_prov = p.id_prov
        ORDER BY
        c.cod_compra
        DESC
        ');
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    }catch (PDOException $e)
    {
      $e->getMessage();
    }
  }

    public function get_compras_by_id($rif)
  {
    try
    {
      $query = $this->dbh->prepare('
  SELECT
        p.id_prov AS xx,
        f.rif AS rif,
        f.razon_social AS prov,
        p.tot AS total
      FROM
        compras AS p
      LEFT JOIN
        proveedores AS f
      ON
        p.id_prov = f.id_prov
      WHERE
        f.rif = ?
        ');
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    }catch (PDOException $e)
    {
      $e->getMessage();
    }
  }

  public function create_compra($cod_compra,$id_prov,$id_emp,$fecha_actual,$forma_pago,$banco,$nro_cuenta,$nro_comprobante,$impuesto,$subtot,$tot,$status,$datos)
  {
   try
   {
    $query = $this->dbh->prepare('INSERT INTO compras VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
    $query->bindParam(1, $cod_compra);
    $query->bindParam(2, $id_prov);
    $query->bindParam(3, $id_emp);
    $query->bindParam(4, $fecha_actual);
    $query->bindParam(5, $forma_pago);
    $query->bindParam(6, $banco);
    $query->bindParam(7, $nro_cuenta);
    $query->bindParam(8, $nro_comprobante);
    $query->bindParam(9, $impuesto);
    $query->bindParam(10, $subtot);
    $query->bindParam(11, $tot);
    $query->bindParam(12, $status);
    $query->execute();
    foreach ($datos as $d) {
      $sql = "INSERT INTO det_compra(cod_compra,cod_prod,cantidad,precio)
      VALUES
      (?,?,?,?)";
      $this->dbh->prepare($sql)
      ->execute(
        array(
          $cod_compra,
          $d['cod'],
          $d['cant'],
          $d['precio_p']
          ));
      $sql = "UPDATE productos SET stock = stock +'" . $d['cant'] . "', p_compra='". $d['precio_p'] ."'WHERE cod_prod = '". $d['cod']."'";
      $this->dbh->prepare($sql)
      ->execute();
    }
    // header('location:' . Conectar::ruta() .'views/reportes/factura_compra.php?cod_compra='.$cod_compra);
    $json = array();
    $json['success'] = true;
    echo json_encode($json);
    //bitacora
    $utilidades = new utilidadesController;
    $responsable = $_SESSION['nombre'];
    $accion = 'Realizó una nueva compra';
    $utilidades->setMovimientos($responsable,$accion);
    $this->dbh = null;
    unset($_SESSION['detalle']);
  } catch (PDOException $e) {
    $e->getMessage();
  }
}

public function numorden()
{
  try
  {
   $query = $this->dbh->prepare('SELECT MAX(cod_compra) FROM compras ;');
   $query->execute();
   return $query->fetch(PDO::FETCH_ASSOC);
   $this->dbh = null;
 }catch (PDOException $e)
 {
  $e->getMessage();
}
}

public function detalle_compra($cod_compra)
{
 try
 {
   $query = $this->dbh->prepare('SELECT
    d.cod_prod AS codigo,
    p.descripcion,
    d.cantidad AS cantidad,
    d.precio AS precio
    FROM
    det_compra AS d
    INNER JOIN
    compras AS c
    ON
    d.cod_compra = c.cod_compra
    INNER JOIN
    productos AS p
    ON
    d.cod_prod = p.cod_prod
    WHERE
    c.cod_compra = ?');
   $query->bindParam(1, $cod_compra);
   $query->execute();
   return $query->fetchAll(PDO::FETCH_ASSOC);
   $this->dbh = null;
 }catch (PDOException $e)
 {
  $e->getMessage();
}
}

public function obtener_compra($cod_compra)
{
 try
 {
   $query = $this->dbh->prepare('SELECT
    c.cod_compra AS codigo,
    c.fecha_actual AS fecha,
    e.primer_nombre AS nombre,
    e.primer_apellido AS apellido,
    p.razon_social,
    p.direccion,
    p.rif,
    p.telefono,
    c.forma_pago,
    c.banco,
    c.nro_cuenta,
    c.nro_comprobante,
    c.impuesto,
    c.subtot,
    c.tot
    FROM
    compras AS c
    INNER JOIN
    empleados AS e
    ON
    c.id_emp = e.id_emp
    INNER JOIN
    proveedores AS p
    ON
    c.id_prov = p.id_prov
    WHERE
    c.cod_compra = ?') ;
   $query->bindParam(1, $cod_compra);
   $query->execute();
   return $query->fetchAll(PDO::FETCH_ASSOC);
   $this->dbh = null;
 }catch (PDOException $e)
 {
  $e->getMessage();
}
}



}

/* join para una factura de compra por su codigo
SELECT
  d.cod_compra AS numero,
  d.cod_prod AS cod,
  p.descripcion,
  d.cantidad AS cant,
  d.precio AS precio_unitario,
  (d.cantidad * p.p_venta) AS precio_total,
  c.subtot,
  c.impuesto,
  c.tot
FROM
  det_compra AS d
INNER JOIN
  compras AS c
ON
  d.cod_compra = c.cod_compra
INNER JOIN
  productos AS p
ON
  d.cod_prod = p.cod_prod
WHERE
  C.cod_compra = 3
*/

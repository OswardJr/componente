<?php
class venta extends Conectar
{
  public function get_venta()
  {
    try
    {
      $query = $this->dbh->prepare('
        SELECT
        c.cod_venta AS codigo,
        p.rif AS rif,
        p.razon_social AS cliente,
        c.fecha_actual AS fecha,
        c.tot AS monto
        FROM
        ventas AS c
        INNER JOIN
        clientes AS p
        ON c.id_cliente = p.id_cliente
        ORDER BY
        c.cod_venta
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
  public function create_venta($cod_venta,$id_cliente,$id_emp,$fecha_actual,$forma_pago,$banco,$nro_cuenta,$nro_comprobante,$impuesto,$descuento,$subtot,$tot,$status,$datos)
            {
                try
                     {
                      $query = $this->dbh->prepare('INSERT INTO ventas VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
                      $query->bindParam(1, $cod_venta);
                      $query->bindParam(2, $id_cliente);
                      $query->bindParam(3, $id_emp);
                      $query->bindParam(4, $fecha_actual);
                      $query->bindParam(5, $forma_pago);
                      $query->bindParam(6, $banco);
                      $query->bindParam(7, $nro_cuenta);
                      $query->bindParam(8, $nro_comprobante);
                      $query->bindParam(9, $impuesto);
                      $query->bindParam(10, $descuento);
                      $query->bindParam(11, $subtot);
                      $query->bindParam(12, $tot);
                      $query->bindParam(13, $status);
                      $query->execute();

                          foreach ($datos as $d) {
                          $sql = "INSERT INTO det_venta(cod_venta,cod_prod,cantidad,precio)
                                  VALUES
                                    (?,?,?,?)";
                          $this->dbh->prepare($sql)
                                    ->execute(
                                      array(
                                        $cod_venta,
                                        $d['cod'],
                                        $d['cant'],
                                        $d['precio_p']
                                        ));
                          $sql = "UPDATE productos SET stock = stock -'" . $d['cant'] . "', p_venta='". $d['precio_p'] ."'WHERE cod_prod = '". $d['cod']."'";
                          $this->dbh->prepare($sql)
                                    ->execute();
                    }
                //    header('location:' . Conectar::ruta() .'views/reportes/factura_venta.php?cod_venta='.$cod_venta);

                    $json = array();
                    $json['success'] = true;
                    echo json_encode($json);
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
   $query = $this->dbh->prepare('SELECT MAX(cod_venta) FROM ventas ;');
   $query->execute();
   return $query->fetch(PDO::FETCH_ASSOC);
   $this->dbh = null;
 }catch (PDOException $e)
 {
  $e->getMessage();
}
}
public function detalle_venta($cod_venta)
{
 try
 {
   $query = $this->dbh->prepare('SELECT
    d.cod_prod AS codigo,
    p.descripcion,
    d.cantidad AS cantidad,
    d.precio AS precio
    FROM
    det_venta AS d
    INNER JOIN
    ventas AS c
    ON
    d.cod_venta = c.cod_venta
    INNER JOIN
    productos AS p
    ON
    d.cod_prod = p.cod_prod
    WHERE
    c.cod_venta = ?');
   $query->bindParam(1, $cod_venta);
   $query->execute();
   return $query->fetchAll(PDO::FETCH_ASSOC);
   $this->dbh = null;
 }catch (PDOException $e)
 {
  $e->getMessage();
}
}
public function obtener_venta($cod_venta)
{
 try
 {
   $query = $this->dbh->prepare('SELECT
    a.cod_venta AS codigo,
    a.fecha_actual AS fecha,
    e.primer_nombre AS nombre,
    e.primer_apellido AS apellido,
    p.razon_social,
    p.direccion,
    p.rif,
    p.telefono,
    a.forma_pago,
    a.banco,
    a.nro_cuenta,
    a.nro_comprobante,
    a.impuesto,
    a.descuento,
    a.subtot,
    a.tot
    FROM
    ventas AS a
    INNER JOIN
    empleados AS e
    ON
    a.id_emp = e.id_emp
    INNER JOIN
    clientes AS p
    ON
    a.id_cliente = p.id_cliente
    WHERE
    a.cod_venta = ?') ;
   $query->bindParam(1, $cod_venta);
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

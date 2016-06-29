<?php
class compra extends Conectar
{
  public function create_compra($cod_compra,$id_prov,$id_emp,$fecha_actual,$forma_pago,$impuesto,$subtot,$tot,$status,$datos)
  {
   try
   {
    $query = $this->dbh->prepare('INSERT INTO compras VALUES(?,?,?,?,?,?,?,?,?)');
    $query->bindParam(1, $cod_compra);
    $query->bindParam(2, $id_prov);
    $query->bindParam(3, $id_emp);
    $query->bindParam(4, $fecha_actual);
    $query->bindParam(5, $forma_pago);
    $query->bindParam(6, $impuesto);
    $query->bindParam(7, $subtot);
    $query->bindParam(8, $tot);
    $query->bindParam(9, $status);
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
    echo utf8_decode("<script type='text/javascript'>
               alert('Compra guardada exitosamente');
               window.location='';
           </script>");
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
// public function reporte_factura()
// {
//    try
//     {
//      $query = $this->dbh->prepare('SELECT
//       d.cod_compra AS numero,
//       d.cod_prod AS cod,
//       p.descripcion,
//       d.cantidad AS cant,
//       d.precio AS precio_unitario,
//       (d.cantidad * p.p_venta) AS precio_total,
//       c.subtot,
//       c.impuesto,
//       c.tot
//       FROM
//       det_compra AS d
//       INNER JOIN
//       compras AS c
//       ON
//       d.cod_compra = c.cod_compra
//       INNER JOIN
//       productos AS p
//       ON
//       d.cod_prod = p.cod_prod
//       WHERE
//       C.cod_compra = 3');
//      $query->execute();
//      return $query->fetch(PDO::FETCH_ASSOC);
//      $this->dbh = null;
//  }catch (PDOException $e)
//  {
//   $e->getMessage();
//  }
// }



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

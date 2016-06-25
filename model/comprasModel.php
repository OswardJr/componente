<?php
session_start();
class compra extends Conectar
{
	public function create_compra($cod_factura,$id_prov,$id_emp,$fecha,$forma_pago,$subtotal,$impuesto,$total,$status)
	{
   try
   {
    $query = $this->dbh->prepare('INSERT INTO compra VALUES(?,?,?,?,?,?,?,?,?)');
    $query->bindParam(1, $cod_factura);
    $query->bindParam(2, $id_prov);
    $query->bindParam(3, $id_emp);
    $query->bindParam(4, $fecha);
    $query->bindParam(5, $forma_pago);
    $query->bindParam(6, $subtotal);
    $query->bindParam(7, $impuesto);
    $query->bindParam(8, $total);
    $query->bindParam(9, $status);
    $query->execute();
    $this->dbh = null;
    echo utf8_decode("<script type='text/javascript'>
      alert('Registro exitoso.');
      window.location='?controller=compras&action=index';
    </script>");
  } catch (PDOException $e) {
    $e->getMessage();
  }
}

public function det_compra($cod_factura,$datos)
{
 try
 { 
  foreach ($datos as $clave => $valor) {
    $sql = "INSERT INTO compra_producto(cod_compra,cod_producto,cantidad) VALUES($cod_factura,".$datos[$clave]['cod'].",". $datos[$clave]['cant'].")";
    $query = $this->dbh->prepare($sql);
    $query->execute();
    unset($_SESSION['detalle']);
  }
  $this->dbh = null;
} catch (PDOException $e) {
  $e->getMessage();
}
}

public function numorden()
{
  try
  {
   $query = $this->dbh->prepare('SELECT MAX(codigo) FROM compra ;');
   $query->execute();
   return $query->fetch(PDO::FETCH_ASSOC);
   $this->dbh = null;
 }catch (PDOException $e)
 {
  $e->getMessage();
}

}

}

/* join para una factura de compra
SELECT
  d.cod_compra as numero,
  d.cod_producto as cod ,
  p.descripcion,
  d.cantidad as cant,
  p.p_venta as precio_u,
  (d.cantidad * p.p_venta) AS precio_t,
  c.subtot,
  c.impuesto,
  c.tot
FROM
  compra_producto as d 
INNER JOIN
  compra AS c ON d.cod_compra = c.codigo
INNER JOIN
  productos AS p ON d.cod_producto = p.codigo
 WHERE c.codigo = 2
*/
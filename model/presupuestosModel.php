<?php
      class presupuesto extends Conectar
           {
              public function create_presupuesto($cod_presu,$id_cliente,$id_emp,$fecha_actual,$fecha_vencimiento,$impuesto,$descuento,$subtot,$tot,$status,$datos)
            {
                try
                     {
                      $query = $this->dbh->prepare('INSERT INTO presupuestos VALUES(?,?,?,?,?,?,?,?,?,?)');
                      $query->bindParam(1, $cod_presu);
                      $query->bindParam(2, $id_cliente);
                      $query->bindParam(3, $id_emp);
                      $query->bindParam(4, $fecha_actual);
                      $query->bindParam(5, $fecha_vencimiento);
                      $query->bindParam(6, $impuesto);
                      $query->bindParam(7, $descuento);
                      $query->bindParam(8, $subtot);
                      $query->bindParam(9, $tot);
                      $query->bindParam(10, $status);
                      $query->execute();
                      
                          foreach ($datos as $d) {
                          $sql = "INSERT INTO det_presu(cod_presu,cod_prod,cantidad,precio)
                                  VALUES
                                    (?,?,?,?)";
                          $this->dbh->prepare($sql)
                                    ->execute(
                                      array(
                                        $cod_presu,
                                        $d['cod'],
                                        $d['cant'],
                                        $d['precio_p']
                                        ));
                          $this->dbh->prepare($sql)
                                    ->execute();
                    }
                    header('location:' . Conectar::ruta() .'views/reportes/factura_presu.php?cod_presu='.$cod_presu);
                    $this->dbh = null;
                    unset($_SESSION['detalle']);
                  } catch (PDOException $e) {
                      $e->getMessage();
                  }
                }

public function get_presupuestos()
  {
    try
    {

      $query = $this->dbh->prepare('
            SELECT
            c.cod_presu AS codigo,
            p.razon_social AS cliente,
            c.fecha_actual AS fecha,
            c.tot AS monto
            FROM
            presupuestos AS c
            INNER JOIN
            clientes AS p
            ORDER BY
            c.cod_presu
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

  public function detalle_presupuesto($cod_presu)
{
 try
 {
   $query = $this->dbh->prepare('SELECT
    d.cod_prod AS codigo,
    p.descripcion,
    d.cantidad AS cantidad,
    d.precio AS precio
    FROM
    det_presu AS d
    INNER JOIN
    presupuestos AS c
    ON
    d.cod_presu = c.cod_presu
    INNER JOIN
    productos AS p
    ON
    d.cod_prod = p.cod_prod
    WHERE
    c.cod_presu = ?');
   $query->bindParam(1, $cod_presu);
   $query->execute();
   return $query->fetchAll(PDO::FETCH_ASSOC);
   $this->dbh = null;
 }catch (PDOException $e)
 {
  $e->getMessage();
}
}
public function obtener_presupuesto($cod_presu)
{
 try
 {
   $query = $this->dbh->prepare('SELECT
    c.cod_presu AS codigo,
    c.fecha_actual AS fecha,
    e.primer_nombre AS nombre,
    e.primer_apellido AS apellido,
    p.razon_social,
    p.direccion,
    p.rif,
    p.telefono,
    c.fecha_vencimiento,
    c.impuesto,
    c.subtot,
    c.tot
    FROM
    presupuestos AS c
    INNER JOIN
    empleados AS e
    ON
    c.id_emp = e.id_emp
    INNER JOIN
    clientes AS p
    ON
    c.id_cliente = p.id_cliente
    WHERE
    c.cod_presu = ?') ;
   $query->bindParam(1, $cod_presu);
   $query->execute();
   return $query->fetchAll(PDO::FETCH_ASSOC);
   $this->dbh = null;
 }catch (PDOException $e)
 {
  $e->getMessage();
}
}
  
    public function serial()
      {
        try
            {
                 $query = $this->dbh->prepare('SELECT MAX(cod_presu) FROM presupuestos ;');
                 $query->execute();
                 return $query->fetch(PDO::FETCH_ASSOC);
                 $this->dbh = null;
           }
           catch (PDOException $e)
              {
                $e->getMessage();
              }
          }
    }


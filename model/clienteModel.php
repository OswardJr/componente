<?php
Class cliente extends Conectar
{
  public function get_clientes()
  {
    try
    {
      $query = $this->dbh->prepare('SELECT * FROM clientes WHERE status = "activo" ORDER BY id_cliente desc;');
      $query->execute();
      return $query->fetchAll();
      $this->dbh = null;
    }catch (PDOException $e)
    {
      $e->getMessage();
    }
  }

  public function  get_cliente_by_rif($rif)
  {
    try
    {
      $query = $this->dbh->prepare('SELECT * FROM clientes WHERE rif = ? ');
      $query->bindParam(1, $rif);
      $query->execute();
      $query->fetch();
      $contar = $query->rowCount();
      $data = array();
      if ($contar > 0) {
        $data['success'] = true;
        $data['msj'] = 'El cliente ya existe';
      }else{
        $data['success'] = true;
        $data['msj'] = 'El cliente no existe';
      }
      echo json_encode($data);
      $this->dbh = null;
    }catch (PDOException $e)
    {
      $e->getMessage();
    }
  }

  public function get_cliente_by_id($id_cliente)
  {
    try
    {
      $query = $this->dbh->prepare('SELECT * FROM clientes WHERE id_cliente = ? ');
      $query->bindParam(1, $id_cliente);
      $query->execute();
      $data = $query->fetch();
      echo json_encode($data);
      $this->dbh = null;
    }catch (PDOException $e)
    {
      $e->getMessage();
    }
  }

  public function create_cliente($rif,$razon_social,$telefono,$email,$direccion,$status)
  {
    try {
      $query = $this->dbh->prepare('INSERT INTO clientes VALUES(null,?,?,?,?,?,?)');
      $query->bindParam(1, $rif);
      $query->bindParam(2, $razon_social);
      $query->bindParam(3, $telefono);
      $query->bindParam(4, $email);
      $query->bindParam(5, $direccion);
      $query->bindParam(6, $status);
      $query->execute();
      $this->dbh = null;
      /* Alerta de notificacion de registro */
      echo utf8_decode("<script type='text/javascript'>
       alert('Registro exitoso.');
       window.location='?controller=clientes&action=create';
     </script>");
      exit();

    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function update_cliente($rif,$razon_social,$telefono,$email,$direccion, $id_cliente)
  {
    try {
      $query = $this->dbh->prepare('UPDATE clientes SET rif = ?, razon_social = ?, telefono = ?, email = ?, direccion = ?  WHERE id_cliente = ?');
      $query->bindParam(1, $rif);
      $query->bindParam(2, $razon_social);
      $query->bindParam(3, $telefono);
      $query->bindParam(4, $email);
      $query->bindParam(5, $direccion);
      $query->bindParam(6, $id_cliente);
      $query->execute();
      $data = "1";
      echo json_encode($data);
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function delete_cliente($id_cliente)
  {
    try {
      $query = $this->dbh->prepare('UPDATE clientes SET status = "inactivo" WHERE id_cliente = ?');
      $query->bindParam(1, $id_cliente);
      $query->execute();
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }


}

?>

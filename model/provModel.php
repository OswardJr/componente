 <?php
 Class proveedor extends Conectar
 {
    public function get_proveedores()
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM proveedores WHERE status = "activo" order by id_prov desc;');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

     public function  get_prov_by_rif($rif)
  {
    try
    {
      $query = $this->dbh->prepare('SELECT * FROM proveedores WHERE rif = ? ');
      $query->bindParam(1, $rif);
      $query->execute();
      $query->fetch();
      $contar = $query->rowCount();
      $data = array();
      if ($contar > 0) {
        $data['success'] = true;
        $data['msj'] = 'El proveedor ya existe';
      }else{
        $data['success'] = true;
        $data['msj'] = 'El proveedor no existe';
      }
      echo json_encode($data);
      $this->dbh = null;
    }catch (PDOException $e)
    {
      $e->getMessage();
    }
  }
    public function buscar_proveedor($rif)
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM proveedores WHERE rif = ? ');
            $query->bindParam(1, $rif);
            $query->execute();
            $data = $query->fetch();
            echo json_encode($data);
            $this->dbh = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function get_proveedor_by_id($id_prov)
    {
        try
        {
            $query = $this->dbh->prepare('SELECT * FROM proveedores WHERE id_prov = ? ');
            $query->bindParam(1, $id_prov);
            $query->execute();
            $data = $query->fetch();
            echo json_encode($data);
            $this->dbh = null;
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function create_proveedor($rif,$razon_social,$telefono,$email,$direccion,$status)
    {
        $query = $this->dbh->prepare('SELECT * FROM proveedores WHERE rif = ? ');
        $query->bindParam(1, $rif);
        $query->execute();
        $query->fetch();
        //realizo validacion
        $contar = $query->rowCount();
        if ($contar > 0) {
           echo utf8_decode("<script type='text/javascript'>
            swal('El proveedor ya existe.');
           </script>");
           exit();
       }else{
        try {
            $query = $this->dbh->prepare('INSERT INTO proveedores VALUES(null,?,?,?,?,?,?)');
            $query->bindParam(1, $rif);
            $query->bindParam(2, $razon_social);
            $query->bindParam(3, $telefono);
            $query->bindParam(4, $email);
            $query->bindParam(5, $direccion);
            $query->bindParam(6, $status);
            $query->execute();
             //bitacora
            $utilidades = new utilidadesController;
            $responsable = $_SESSION['nombre'];
            $accion = 'Registró un nuevo proveedor';
            $utilidades->setMovimientos($responsable,$accion);
            /* Alerta de notificacion de registro */
            echo utf8_decode("<script type='text/javascript'>
                swal('Registro exitoso.');
            </script>");
        } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }

    }

    public function create_proveedor_for_json($rif,$razon_social,$telefono,$email,$direccion,$status)
    {
        try {
            $query = $this->dbh->prepare('INSERT INTO proveedores VALUES(null,?,?,?,?,?,?)');
            $query->bindParam(1, $rif);
            $query->bindParam(2, $razon_social);
            $query->bindParam(3, $telefono);
            $query->bindParam(4, $email);
            $query->bindParam(5, $direccion);
            $query->bindParam(6, $status);
            $query->execute();
            $json['msj'] = 'Registro exitoso';
            $json['success'] = true;
            echo json_encode($json);
            $utilidades = new utilidadesController;
            $responsable = $_SESSION['nombre'];
            $accion = 'Registró un nuevo proveedor';
            $utilidades->setMovimientos($responsable,$accion);
            $this->dbh = null;
        } catch (PDOException $e) {
            $json['msj'] = $e->getMessage();
            echo json_encode($json);
        }
    }

    public function update_proveedor($rif,$razon_social,$telefono,$email,$direccion, $id_prov)
    {
        try {
            $query = $this->dbh->prepare('UPDATE proveedores SET rif = ?, razon_social = ?, telefono = ?, email = ?, direccion = ?  WHERE id_prov = ?');
            $query->bindParam(1, $rif);
            $query->bindParam(2, $razon_social);
            $query->bindParam(3, $telefono);
            $query->bindParam(4, $email);
            $query->bindParam(5, $direccion);
            $query->bindParam(6, $id_prov);
            $query->execute();
            $data = "1";
            $utilidades = new utilidadesController;
            $responsable = $_SESSION['nombre'];
            $accion = 'Actualizó los datos de un proveedor';
            $utilidades->setMovimientos($responsable,$accion);
            echo json_encode($data);
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_proveedor($id_prov)
    {
        try {
            $query = $this->dbh->prepare('UPDATE proveedores SET status = "inactivo" WHERE id_prov = ?');
            $query->bindParam(1, $id_prov);
            $query->execute();
            $this->dbh = null;
            $utilidades = new utilidadesController;
            $responsable = $_SESSION['nombre'];
            $accion = 'Eliminó un proveedor';
            $utilidades->setMovimientos($responsable,$accion);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

 public function auto_prov($searchTerm)
    {
      $return_arr = array();
     try {
      $query = $this->dbh->prepare('SELECT rif FROM proveedores WHERE rif LIKE :term');
      $query->bindValue("term", "%$searchTerm%");
      $query->execute();
      while ($row = $query->fetch()) {
        $return_arr[] = $row['rif'];
      }
      echo json_encode($return_arr);
      $this->dbh = null;
    } catch (PDOException $e) {
      $e->getMessage();
    }


  }

}

?>

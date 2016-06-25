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

    public function get_proveedor_by_rif($rif)
    {
        try 
        {
            $query = $this->dbh->prepare('SELECT * FROM proveedores WHERE rif = ? ');
            $query->bindParam(1, $rif);
            $query->execute();
            return $query->fetch();
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
        try {
            $query = $this->dbh->prepare('INSERT INTO proveedores VALUES(null,?,?,?,?,?,?)');
            $query->bindParam(1, $rif);
            $query->bindParam(2, $razon_social);
            $query->bindParam(3, $telefono);
            $query->bindParam(4, $email);
            $query->bindParam(5, $direccion);
            $query->bindParam(6, $status);
            $query->execute();      
            /* Alerta de notificacion de registro */
            echo utf8_decode("<script type='text/javascript'>
                alert('Registro exitoso.');
                window.location='?controller=proveedores&action=index';
            </script>");
        } catch (PDOException $e) {
            $e->getMessage();
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
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    
}

?>
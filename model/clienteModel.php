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

	public function buscar_cliente($rif)
	{
		try
		{
			$query = $this->dbh->prepare('SELECT * FROM clientes WHERE rif = ? ');
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
        $query = $this->dbh->prepare('SELECT * FROM clientes WHERE rif = ? ');
        $query->bindParam(1, $rif);
        $query->execute();
        $query->fetch();
        //realizo validacion
        $contar = $query->rowCount();
        if ($contar > 0) {
           echo utf8_decode("<script type='text/javascript'>
            swal('El cliente ya existe.');
           </script>");
           exit();
       }else{
        // si no existe lo creo
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
      //Lineas de bitacora
            $utilidades = new utilidadesController;
            $responsable = $_SESSION['nombre'];
            $accion = 'Registró un nuevo cliente';
            $utilidades->setMovimientos($responsable,$accion);

            echo utf8_decode("<script type='text/javascript'>
                swal('Registro exitoso.');
            </script>");
            exit();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
	public function create_cliente_for_json($rif,$razon_social,$telefono,$email,$direccion,$status)
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
			$json['msj'] = 'Registro exitoso';
			$json['success'] = true;
			echo json_encode($json);
			$this->dbh = null;
            //Lineas de bitacora
			$utilidades = new utilidadesController;
			$responsable = $_SESSION['nombre'];
			$accion = 'Registró un nuevo cliente';
			$utilidades->setMovimientos($responsable,$accion);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			echo json_encode($json);
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
			//bitacora
			$utilidades = new utilidadesController;
			$responsable = $_SESSION['nombre'];
			$accion = 'Actualizó los datos de un cliente';
			$utilidades->setMovimientos($responsable,$accion);
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
			//bitacora
			$utilidades = new utilidadesController;
			$responsable = $_SESSION['nombre'];
			$accion = 'Eliminó a un cliente';
			$utilidades->setMovimientos($responsable,$accion);
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}


	public function auto_cliente($searchTerm)
	{
		$return_arr = array();
		try {
			$query = $this->dbh->prepare('SELECT rif FROM clientes WHERE rif LIKE :term');
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

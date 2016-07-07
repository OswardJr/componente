<?php
class categoria extends Conectar
{

    public function get_categorias(){
       try
       {
        $query = $this->dbh->prepare('SELECT * FROM categorias');
        $query->execute();
        return $query->fetchAll();
        $this->dbh = null;
    }catch (PDOException $e)
    {
        $e->getMessage();
    }
}
public function get_categoria_by_id($id_cat){
    try
    {
        $query = $this->dbh->prepare('SELECT * FROM categorias WHERE id_cat = ? ');
        $query->bindParam(1, $id_cat);
        $query->execute();
        $data = $query->fetch();
        echo json_encode($data);
        $this->dbh = null;
    }catch (PDOException $e)
    {
        $e->getMessage();
    }
}

public function create_categoria($nombre,$descripcion)
{
    try {
        $query = $this->dbh->prepare('INSERT INTO categorias VALUES(null,?,?)');
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $descripcion);
        $query->execute();
        $this->dbh = null;
        /* Alerta de notificacion de registro */
        echo utf8_decode("<script type='text/javascript'>
            alert('Registro exitoso.');
            window.location='?controller=categorias&action=index';
        </script>");
        exit();

    } catch (PDOException $e) {
        $e->getMessage();
    }

}
public function delete_categoria($id_cat)
{
    try {
        $query = $this->dbh->prepare('DELETE FROM categorias WHERE id_cat = ?');
        $query->bindParam(1, $id_cat);
        $query->execute();
        $this->dbh = null;
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

public function update_categoria($nombre,$descripcion,$id_cat){
    try {
        $query = $this->dbh->prepare('UPDATE categorias SET nombre = ?, descripcion = ?  WHERE id_cat = ?');
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $descripcion);
        $query->bindParam(3, $id_cat);
        $query->execute();
        $data = "1";
        echo json_encode($data);
        $this->dbh = null;
        exit();

    } catch (PDOException $e) {
        $e->getMessage();
    }

}

}

?>

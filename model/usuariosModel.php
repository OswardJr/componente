<?php

class usuario extends Conectar
{

    public function get_users(){
       try 
       {
        $query = $this->dbh->prepare(
            'SELECT
            ci_emp AS cedula,
            primer_nombre AS nombre,
            primer_apellido AS apellido,
            username,
            rol
            FROM
            empleados
            WHERE status = "activo"');
        $query->execute();
        return $query->fetchAll();
        $this->dbh = null;
    }catch (PDOException $e) 
    {
        $e->getMessage();
    }
}
public function get_user_by_cedula($cedula){
    try 
    {
        $query = $this->dbh->prepare('SELECT * FROM empleados where ci_emp = ? ');
        $query->bindParam(1, $cedula);
        $query->execute();
        $data = $query->fetch();
        echo json_encode($data);
        $this->dbh = null;
    }catch (PDOException $e) 
    {
        $e->getMessage();
    }
}

public function comprobar_user($cedula)
{
    try 
    {
        $query = $this->dbh->prepare('SELECT * FROM empleados where ci_emp = ? ');
        $query->bindParam(1, $cedula);
        $query->execute();
        return $query->fetch();
        $this->dbh = null;
    }catch (PDOException $e) 
    {
        $e->getMessage();
    }
}

public function create_user($cedula,$nombre,$apellido,$username,$password,$rol,$status)
{
    try {
        $query = $this->dbh->prepare('INSERT INTO empleados VALUES(null,?,?,?,?,?,?,?)');
        $query->bindParam(1, $cedula);
        $query->bindParam(2, $nombre);
        $query->bindParam(3, $apellido);
        $query->bindParam(4, $username);
        $query->bindParam(5, $password);
        $query->bindParam(6, $rol);
        $query->bindParam(7, $status);
        $query->execute();
        $this->dbh = null;
        /* Alerta de notificacion de registro */
        echo utf8_decode("<script type='text/javascript'>
            alert('Registro exitoso.');
            window.location='?controller=usuarios&action=index';
        </script>");
        exit();

    } catch (PDOException $e) {
        $e->getMessage();
    }     

}
public function delete_user($cedula)
{
    try {
        $query = $this->dbh->prepare('UPDATE empleados SET status = "inactivo" where ci_emp = ?');
        $query->bindParam(1, $cedula);
        $query->execute();
        $this->dbh = null;
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

public function update_user($cedula,$nombre,$apellido,$username,$rol,$id_emp){
    try {
        $query = $this->dbh->prepare('UPDATE empleados SET ci_emp = ?, primer_nombre = ?, primer_apellido = ?, username = ?, rol = ?  WHERE id_emp = ?');
        $query->bindParam(1, $cedula);
        $query->bindParam(2, $nombre);
        $query->bindParam(3, $apellido);
        $query->bindParam(4, $username);
        $query->bindParam(5, $rol);
        $query->bindParam(6, $id_emp);
        $query->execute();
        $data = "1";
        echo json_encode($data);
        $this->dbh = null;
        exit();

    } catch (PDOException $e) {
        $e->getMessage();
    }     

}

public function login($username, $contrasena)
{
    try 
    {
        $query = $this->dbh->prepare('SELECT * FROM empleados where username=? and password=?');
        $query->bindParam(1, $username);
        $query->bindParam(2, $contrasena);
        $query->execute();
        $data = $query->fetch();
        $contar = $query->rowCount();
        if($contar > 0){
            $_SESSION['id_emp'] = $data[0];
            $_SESSION['ci_emp'] = $data[1];
            $_SESSION['nombre'] = $data[2];
            $_SESSION['apellido'] = $data[3];
            $_SESSION['username'] = $data[4];
            $_SESSION['rol'] = $data[6];
                $_SESSION['token'] = password_hash(mt_rand(), PASSWORD_DEFAULT); //Genera un token aleatorio con Bcrypt
                    echo 1; //retorno que se logueo perfectamente
                }else {
                    echo 0; // retorno que no se logueo
                }
                $this->dbh = null;
            }catch (PDOException $e) 
            {
                $e->prueba();
            }
        } 

    }

    ?>
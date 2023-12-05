<?php
class usuarios extends Conectar{
    public function get_usuarios(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  usuarios WHERE estado = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_usuarios_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  usuarios WHERE estado = 1 AND id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_usuarios($nombre,$num_doc,$tipo_doc,$email,$cargo,$clave){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO  usuarios(id,nombre,num_doc,tipo_doc,email,cargo,clave,estado) VALUES (NULL,?,?,?,?,?, MD5(?),'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $num_doc);
        $sql->bindValue(3, $tipo_doc);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $cargo);
        $sql->bindValue(6, $clave);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_usuarios($id,$nombre,$num_doc,$tipo_doc,$email,$cargo,$clave){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE  usuarios set
            nombre = ?,
            num_doc = ?,
            tipo_doc = ?,
            email = ?,
            cargo = ?,
            clave = ?
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $num_doc);
        $sql->bindValue(3, $tipo_doc);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $cargo);
        $sql->bindValue(6, $clave);
        $sql->bindValue(7, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function desactivar_usuarios($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE  usuarios set
            estado = '0'
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function activar_usuarios($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE  usuarios set
            estado = '1'
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function eliminar_usuarios($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM  usuarios WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}



?>
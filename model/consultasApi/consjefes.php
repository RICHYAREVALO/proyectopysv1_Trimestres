<?php
class jefes extends Conectar{
    public function get_jefes(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  jefes WHERE estado_jefe = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_jefes_x_id($id_jefe){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  jefes WHERE estado_jefe = 1 AND id_jefe = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_jefe);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_jefes($nom_jefe){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO  jefes (id_jefe,nom_jefe,estado_jefe) VALUES (NULL,?,'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nom_jefe);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_jefes($id_jefe,$nom_jefe){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE  jefes set
            nom_jefe = ?
            WHERE
            id_jefe = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nom_jefe);
       $sql->bindValue(2, $id_jefe);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function desactivar_jefes($id_jefe){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE  jefes set
            estado_jefe = 'inactivo'
            WHERE
            id_jefe = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_jefe);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function activar_jefes($id_jefe){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE  jefes set
            estado_jefe = '1'
            WHERE
            id_jefe = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_jefe);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function eliminar_jefes($id_jefe){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM  jefes WHERE id_jefe=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_jefe);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}



?>
<?php
class tipo_documento_model extends Conectar

{
    public function get_tipo_documento(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  tipo_documento WHERE tipo_estado = 0";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_tipo_documento_x_id($id_tipo_documento){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  tipo_documento WHERE tipo_estado = 1 AND id_tipo_documento = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_tipo_documento);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_tipo_documento($id_tipo_documento,$nom_tipo_documento,$tipo_estado){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO  tipo_documento(id_tipo_documento,nom_tipo_documento,tipo_estado) VALUES (?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_tipo_documento);
        $sql->bindValue(2, $nom_tipo_documento);
        $sql->bindValue(3, $tipo_estado);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_tipo_documento($id_tipo_documento,$nom_tipo_documento,$tipo_estado){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE  tipo_documento set
            nom_tipo_documento = ?,
            tipo_estado = ?
            WHERE
            id_tipo_documento = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nom_tipo_documento);
        $sql->bindValue(2, $tipo_estado);
        $sql->bindValue(3, $id_tipo_documento);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function desactivar_tipo_documento($id_tipo_documento){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE  tipo_documento set
            tipo_estado = 1
            WHERE
            id_tipo_documento = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_tipo_documento);}
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
<?php

class paz_salvo extends Conectar{

    public function get_paz_salvo(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  paz_salvo WHERE estado = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_paz_salvo_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  paz_salvo WHERE estado = 1 AND id_usuario = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_paz_salvo($id_usuario,$id_paz_salvo,$fecha_registro,$estado,$aprobado_final){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO  paz_salvo(id_usuario,id_paz_salvo,fecha_registro,estado,aprobado_final) VALUES (?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_usuario);
        $sql->bindValue(2, $id_paz_salvo);
        $sql->bindValue(3, $fecha_registro);
        $sql->bindValue(4, $estado);
        $sql->bindValue(5, $aprobado_final);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_paz_salvo($id_usuario,$id_paz_salvo,$fecha_registro,$estado){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE  paz_salvo set
            id_paz_salvo = ?,
            fecha_registro = ?,
            estado = ?
            WHERE
            id_usuario = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_paz_salvo);
        $sql->bindValue(2, $fecha_registro);
        $sql->bindValue(3, $estado);
        $sql->bindValue(4, $id_usuario);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
    ?>
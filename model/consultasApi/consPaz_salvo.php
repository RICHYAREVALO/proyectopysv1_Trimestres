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
        $sql="SELECT * FROM  paz_salvo WHERE estado = 1 AND id_paz_salvo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue("1", $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert_paz_salvo($id_paz_salvo,$aprobado_final){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO  paz_salvo(id_paz_salvo,estado,aprobado_final) VALUES (?,'1',?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_paz_salvo);
        
        $sql->bindValue(2, $aprobado_final);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_paz_salvo($id_paz_salvo,$aprobado_final){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE  paz_salvo set
            aprobado_final = ?
            WHERE
            id_paz_salvo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $aprobado_final);
         $sql->bindValue(2, $id_paz_salvo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

        public function desactivar_paz_salvo($id_paz_salvo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE  paz_salvo set
                estado = 'inactivo'
                WHERE
                id_paz_salvo = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_paz_salvo);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        
        }
        public function activar_paz_salvo($id_paz_salvo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE  paz_salvo set
                estado = '1'
                WHERE
                id_paz_salvo = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_paz_salvo);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    
        }
    
        public function eliminar_paz_salvo($id_paz_salvo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM  paz_salvo WHERE id_paz_salvo=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_paz_salvo);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    
    
    }
    
    
    
    ?>

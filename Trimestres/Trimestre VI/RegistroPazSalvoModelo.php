<?php
require_once '../conexion/conexionapi.php';


class RegistroPazSalvoModelo {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::getConexion();
    }

    public function obtenerRegistros() {
        $sql = "SELECT * FROM registro_paz_salvo";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRegistro($id) {
        $sql = "SELECT * FROM registro_paz_salvo WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

 
    public function actualizarRegistro($id, $datos) {
        $sql = "UPDATE registro_paz_salvo SET Empleado_ID = ?, Fecha_Emision = ?, Detalles = ?, Estado = ?, Razon_Rechazo =? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issssi", $datos['Empleado_ID'], $datos['Fecha_Emision'], $datos['Detalles'], $datos['Estado'], $datos['Razon_Rechazo'],$id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function eliminarRegistro($id) {
        $sql = "DELETE FROM registro_paz_salvo WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
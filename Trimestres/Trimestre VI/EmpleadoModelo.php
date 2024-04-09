<?php
require_once '../conexion/conexionapi.php';


class EmpleadoModelo {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::getConexion();
    }

    
    public function obtenerEmpleados() {
        $sql = "SELECT * FROM empleados";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerEmpleado($id) {
        $sql = "SELECT * FROM empleados WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function crearEmpleado($datos) {
        $sql = "INSERT INTO empleados (Nombre, Apellido, DocumentoIdentidad, Departamento_ID, Fecha_Contratacion, Fecha_Retiro, Otros_Detalles, Usuario_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssiissi", $datos['Nombre'], $datos['Apellido'], $datos['DocumentoIdentidad'], $datos['Departamento_ID'], $datos['Fecha_Contratacion'], $datos['Fecha_Retiro'], $datos['Otros_Detalles'], $datos['Usuario_ID']);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function actualizarEmpleado($id, $datos) {
        $sql = "UPDATE empleados SET Nombre = ?, Apellido = ?, DocumentoIdentidad = ?, Departamento_ID = ?, Fecha_Contratacion = ?, Fecha_Retiro = ?, Otros_Detalles = ?, Usuario_ID = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        
        // Enlaza los valores a los parámetros
        $stmt->bindParam(1, $datos['Nombre']);
        $stmt->bindParam(2, $datos['Apellido']);
        $stmt->bindParam(3, $datos['DocumentoIdentidad']);
        $stmt->bindParam(4, $datos['Departamento_ID']);
        $stmt->bindParam(5, $datos['Fecha_Contratacion']);
        $stmt->bindParam(6, $datos['Fecha_Retiro']);
        $stmt->bindParam(7, $datos['Otros_Detalles']);
        $stmt->bindParam(8, $datos['Usuario_ID']);
        $stmt->bindParam(9, $id);

        $stmt->execute();
        return true;
    }

    public function eliminarEmpleado($id) {
        $sql = "DELETE FROM empleados WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
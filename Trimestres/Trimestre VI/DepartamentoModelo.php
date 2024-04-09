<?php
require_once '../conexion/conexion.php';

class DepartamentoModelo {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::getConexion();
    }

    public function obtenerDepartamentos() {
        $sql = "SELECT * FROM departamentos";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerDepartamento($id) {
        $sql = "SELECT * FROM departamentos WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function crearDepartamento($datos) {
        $sql = "INSERT INTO departamentos (Nombre_Departamento, Descripcion) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
    
        // Enlaza los valores a los parámetros
        $stmt->bindParam(1, $datos['Nombre_Departamento']);
        $stmt->bindParam(2, $datos['Descripcion']);
        $stmt->execute();
        
        
    }

    public function actualizarDepartamentos($id, $datos) {
        $sql = "UPDATE departamentos SET Nombre_Departamento = ?, Descripcion = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        
        // Enlaza los valores a los parámetros
        $stmt->bindParam(1, $datos['Nombre_Departamento']);
        $stmt->bindParam(2, $datos['Descripcion']);
        $stmt->bindParam(3, $id);

        $stmt->execute();
        return true;
    }

    public function eliminarDepartamento($id) {
        $sql = "DELETE FROM departamentos WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return true;
    }
}
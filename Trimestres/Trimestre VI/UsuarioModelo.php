<?php
require_once '../conexion/conexion.php';

class UsuarioModelo {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::getConexion();
    }

    public function obtenerUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function obtenerUsuario($id) {
        $sql = "SELECT * FROM usuarios WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function crearUsuario($datos) {
        // Encriptar la contraseña antes de almacenarla en la base de datos
        $contrasena_encriptada = password_hash($datos['Contraseña'], PASSWORD_DEFAULT);
        
        // Consulta SQL para insertar el usuario con la contraseña encriptada
        $sql = "INSERT INTO usuarios (Nombre, Apellido, NombreUsuario, Contraseña, Rol, TipoDocumento_ID, DocumentoIdentidad, CorreoElectronico) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
    
        // Enlaza los valores a los parámetros
        $stmt->bindParam(1, $datos['Nombre']);
        $stmt->bindParam(2, $datos['Apellido']);
        $stmt->bindParam(3, $datos['NombreUsuario']);
        $stmt->bindParam(4, $contrasena_encriptada); // Almacena la contraseña encriptada
        $stmt->bindParam(5, $datos['Rol']);
        $stmt->bindParam(6, $datos['TipoDocumento_ID']);
        $stmt->bindParam(7, $datos['DocumentoIdentidad']);
        $stmt->bindParam(8, $datos['CorreoElectronico']);
        $stmt->execute();
    }
    public function actualizarUsuario($id, $datos) {
        // Verificar si se está proporcionando una nueva contraseña
        if (isset($datos['Contraseña'])) {
            // Encriptar la nueva contraseña antes de actualizarla
            $contrasena_encriptada = password_hash($datos['Contraseña'], PASSWORD_DEFAULT);
        } else {
            // Si no se proporciona una nueva contraseña, mantener la contraseña actual
            $contrasena_encriptada = $this->obtenerUsuario($id)['Contraseña'];
        }
    
        // Consulta SQL para actualizar el usuario
        $sql = "UPDATE usuarios SET Nombre = ?, Apellido = ?, NombreUsuario = ?, Contraseña = ?, Rol = ?, TipoDocumento_ID = ?, DocumentoIdentidad = ?, CorreoElectronico = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        
        // Enlaza los valores a los parámetros
        $stmt->bindParam(1, $datos['Nombre']);
        $stmt->bindParam(2, $datos['Apellido']);
        $stmt->bindParam(3, $datos['NombreUsuario']);
        $stmt->bindParam(4, $contrasena_encriptada); // Almacena la nueva contraseña encriptada o la contraseña actual
        $stmt->bindParam(5, $datos['Rol']);
        $stmt->bindParam(6, $datos['TipoDocumento_ID']);
        $stmt->bindParam(7, $datos['DocumentoIdentidad']);
        $stmt->bindParam(8, $datos['CorreoElectronico']);
        $stmt->bindParam(9, $id);
    
        $stmt->execute();
        return true;
    }
    

    public function eliminarUsuario($id) {
        $sql = "DELETE FROM usuarios WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return true;
    }
}
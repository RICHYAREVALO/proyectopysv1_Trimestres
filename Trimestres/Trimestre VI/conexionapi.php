<?php
class Conexion {
    private static $conexion;

    public static function getConexion() {
        if (self::$conexion == null) {
            $servidor = "localhost";
            $usuario = "root";
            $contrasena = "";
            $baseDatos = "paz_y_salvo";

            try {
                self::$conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $contrasena);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }

        return self::$conexion;
    }
}
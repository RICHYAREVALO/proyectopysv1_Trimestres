<?php
require_once '../modelo/UsuarioModelo.php';
require_once '../conexion/conexionapi.php';

class UsuarioControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new UsuarioModelo();
    }

    public function procesarSolicitud() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $solicitud = $_SERVER['REQUEST_URI'];

        switch ($metodo) {
            case 'GET':
                if ($solicitud == '/paz_y_salvo2/controlador/UsuarioControlador.php' || $solicitud == '/paz_y_salvo2/controlador/UsuarioControlador.php/') {
                    $usuarios = $this->modelo->obtenerUsuarios();
                    echo json_encode($usuarios);
                } else
                
                {
                    $partes = explode('/', $solicitud);
                    $id = end($partes);
                    if (is_numeric($id)) {
                        $usuario = $this->modelo->obtenerUsuario($id);
                        echo json_encode($usuario);
                    } else {
                        http_response_code(404);
                    }
                }
                break;

               
            case 'POST':
                $datos = json_decode(file_get_contents('php://input'), true);
                $nuevoId = $this->modelo->crearUsuario($datos);
                http_response_code(201);
                echo json_encode(['id' => $nuevoId]);
                break;

                case 'PUT':
                    $partes = explode('/', $solicitud);
                    $id = end($partes);
                    if (is_numeric($id)) {
                        $datos = json_decode(file_get_contents('php://input'), true);
                        $filasAfectadas = $this->modelo->actualizarUsuario($id, $datos);
                        echo json_encode(['filasAfectadas' => $filasAfectadas]);
                    } else {
                        http_response_code(404);
                    }
                    break;

            case 'DELETE':
                $partes = explode('/', $solicitud);
                $id = end($partes);
                if (is_numeric($id)) {
                    $filasAfectadas = $this->modelo->eliminarUsuario($id);
                    echo json_encode(['filasAfectadas' => $filasAfectadas]);
                } else {
                    http_response_code(404);
                }
                break;
            default:
                http_response_code(405);
                break;
        }
    }
}
$controlador = new UsuarioControlador();
$controlador->procesarSolicitud();
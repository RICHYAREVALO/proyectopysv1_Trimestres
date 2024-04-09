<?php
require_once '../modelo/RegistroPazSalvoModelo.php';
require_once '../conexion/conexionapi.php';

class RegistroPazSalvoControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new RegistroPazSalvoModelo();
    }

    public function procesarSolicitud() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $solicitud = $_SERVER['REQUEST_URI'];

        switch ($metodo) {
            case 'GET':
                if ($solicitud == '/paz_y_salvo2/controlador/RegistroPazSalvoControlador.php' || $solicitud == '/paz_y_salvo2/controlador/RegistroPazSalvoControlador.php/') {
                    $registros = $this->modelo->obtenerRegistros();
                    echo json_encode($registros);
                } else {
                    $partes = explode('/', $solicitud);
                    $id = end($partes);
                    if (is_numeric($id)) {
                        $registro = $this->modelo->obtenerRegistro($id);
                        echo json_encode($registro);
                    } else {
                        http_response_code(404);
                    }
                }
                break;
            
            case 'PUT':
                $partes = explode('/', $solicitud);
                $id = end($partes);
                if (is_numeric($id)) {
                    $datos = json_decode(file_get_contents('php://input'), true);
                    $filasAfectadas = $this->modelo->actualizarRegistro($id, $datos);
                    echo json_encode(['filasAfectadas' => $filasAfectadas]);
                } else {
                    http_response_code(404);
                }
                break;

                
            case 'DELETE':
                $partes = explode('/', $solicitud);
                $id = end($partes);
                if (is_numeric($id)) {
                    $filasAfectadas = $this->modelo->eliminarRegistro($id);
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

$controlador = new RegistroPazSalvoControlador();
$controlador->procesarSolicitud();
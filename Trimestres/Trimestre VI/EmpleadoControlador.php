<?php
require_once '../modelo/EmpleadoModelo.php';
require_once '../conexion/conexionapi.php';

class EmpleadoControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new EmpleadoModelo();
    }

    public function procesarSolicitud() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $solicitud = $_SERVER['REQUEST_URI'];

        switch ($metodo) {
            case 'GET':
                if ($solicitud == '/paz_y_salvo2/controlador/EmpleadoControlador.php' || $solicitud == '/paz_y_salvo2/controlador/EmpleadoControlador.php/') {
                    $empleados = $this->modelo->obtenerEmpleados();
                    echo json_encode($empleados);
                } else {
                    $partes = explode('/', $solicitud);
                    $id = end($partes);
                    if (is_numeric($id)) {
                        $empleado = $this->modelo->obtenerEmpleado($id);
                        echo json_encode($empleado);
                    } else {
                        http_response_code(404);
                    }
                }
                break;
            case 'POST':
                $datos = json_decode(file_get_contents('php://input'), true);
                $nuevoId = $this->modelo->crearEmpleado($datos);
                http_response_code(201);
                echo json_encode(['id' => $nuevoId]);
                break;


               
                case 'PUT':
                    $partes = explode('/', $solicitud);
                    $id = end($partes);
                    if (is_numeric($id)) {
                        $datos = json_decode(file_get_contents('php://input'), true);
                        $filasAfectadas = $this->modelo->actualizarEmpleado($id, $datos);
                        echo json_encode(['filasAfectadas' => $filasAfectadas]);
                    } else {
                        http_response_code(404);
                    }
                    break;

            case 'DELETE':
                $partes = explode('/', $solicitud);
                $id = end($partes);
                if (is_numeric($id)) {
                    $filasAfectadas = $this->modelo->eliminarEmpleado($id);
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

$controlador = new EmpleadoControlador();
$controlador->procesarSolicitud();
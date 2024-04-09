<?php
require_once '../modelo/DepartamentoModelo.php';
require_once '../conexion/conexionapi.php';


class DepartamentoControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new DepartamentoModelo();
    }

    public function procesarSolicitud() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $solicitud = $_SERVER['REQUEST_URI'];

        switch ($metodo) {
            case 'GET':
                if ($solicitud == '/paz_y_salvo2/controlador/DepartamentoControlador.php' || $solicitud == '/paz_y_salvo2/controlador/DepartamentoControlador.php/') {
                    $departamentos = $this->modelo->obtenerDepartamentos();
                    echo json_encode($departamentos);
                } else {
                    $partes = explode('/', $solicitud);
                    $id = end($partes);
                    if (is_numeric($id)) {
                        $departamento = $this->modelo->obtenerDepartamento($id);
                        echo json_encode($departamento);
                    } else {
                        http_response_code(404);
                    }
                }
                break;
            case 'POST':
                $datos = json_decode(file_get_contents('php://input'), true);
                $nuevoId = $this->modelo->crearDepartamento($datos);
                http_response_code(201);
                echo json_encode(['id' => $nuevoId]);
                break;


                case 'PUT':
                    $partes = explode('/', $solicitud);
                    $id = end($partes);
                    if (is_numeric($id)) {
                        $datos = json_decode(file_get_contents('php://input'), true);
                        $filasAfectadas = $this->modelo->actualizarDepartamentos($id, $datos);
                        echo json_encode(['filasAfectadas' => $filasAfectadas]);
                    } else {
                        http_response_code(404);
                    }
                    break;



            
                    case 'DELETE':
                        $partes = explode('/', $solicitud);
                        $id = end($partes);
                        if (is_numeric($id)) {
                            $filasAfectadas = $this->modelo->eliminarDepartamento($id);
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

$controlador = new DepartamentoControlador();
$controlador->procesarSolicitud();
<?php
header('Content-Type: aplication/json');

require_once('model/conexion.php');
require_once('model/consultasApi/consPaz_salvo.php');
$paz_salvo = new paz_salvo_model();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$paz_salvo->get_paz_salvo();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$paz_salvo->get_paz_salvo_x_id($body["id_usuario"]);
            echo json_encode($datos);
            break;

            case "Insert":
                $datos=$paz_salvo->insert_paz_salvo($body["id_usuario"],$body["id_paz_salvo"],$body["fecha_registro"],$body["estado"],$body["aprobado_final"]);
                echo json_encode("Insert Correcto");
            break;

            case "Update":
                $datos=$paz_salvo->update_paz_salvo($body["id_usuario"],$body["id_paz_salvo"],$body["fecha_registro"],$body["estado"]);
                echo json_encode("Update Correcto");
            break;

            case "desactivar":
                $datos=$paz_salvo->desactivar_paz_salvo($body["id_usuario"]); 
                echo json_encode("desactivacion  Correcta");
            break;

            case "Activar":
                $datos=$paz_salvo->activar_paz_salvo($body["id_usuario"]); 
                echo json_encode("activacion  Correcta");
            break;

            case "Eliminar":
                $datos=$paz_salvo->eliminar_paz_salvo($body["id_usuario"]);
                echo json_encode("Eliminacion  Correcta");
            break;
}

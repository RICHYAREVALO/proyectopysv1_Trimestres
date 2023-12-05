<?php
header('Content-Type: aplication/json');

require_once("../../model/conexionApi.php");
require_once('../../model/consultasApi/consPaz_salvo.php');
$paz_salvo = new Paz_salvo();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["paz"]){

    case "c_general":
        $datos=$paz_salvo->get_paz_salvo();
        echo json_encode($datos);
        break;

        case "c_id":
            $datos=$paz_salvo->get_paz_salvo_x_id($body["id_paz_salvo"]);
            echo json_encode($datos);
            break;

            case "insert":
                $datos=$paz_salvo->insert_paz_salvo($body["id_paz_salvo"],$body["aprobado_final"]);
                echo json_encode("Insert Correcto");
            break;

            case "actualizar":
                $datos=$paz_salvo->update_paz_salvo($body["id_paz_salvo"],$body["aprobado_final"]);
                echo json_encode("Update Correcto");
            break;

            case "desactivar":
                $datos=$paz_salvo->desactivar_paz_salvo($body["id_paz_salvo"]); 
                echo json_encode("desactivacion  Correcta");
            break;

            case "activar":
                $datos=$paz_salvo->activar_paz_salvo($body["id_paz_salvo"]); 
                echo json_encode("activacion  Correcta");
            break;

            case "eliminar":
                $datos=$paz_salvo->eliminar_paz_salvo($body["id_paz_salvo"]);
                echo json_encode("Eliminacion  Correcta");
            break;
}

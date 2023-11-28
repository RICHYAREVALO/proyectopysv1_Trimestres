<?php
header('Content-Type: aplication/json');

require_once("../../model/conexionApi.php");
require_once("../../model/consultasApi/consjefes.php");
$jefes = new Jefes();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$jefes->get_jefes();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$jefes->get_jefes_x_id($body["id_jefe"]);
            echo json_encode($datos);
            break;

            case "Insert":
                $datos=$jefes->insert_jefes($body["nom_jefe"]);
                echo json_encode("Insert Correcto");
            break;

            case "Update":
                $datos=$jefes->update_jefes($body["id_jefe"],$body["nom_jefe"]);
                echo json_encode("Update Correcto");
            break;

            case "desactivar":
                $datos=$jefes->desactivar_jefes($body["id_jefe"]); 
                echo json_encode("desactivacion  Correcta");
            break;

            case "Activar":
                $datos=$jefes->activar_jefes($body["id_jefe"]); 
                echo json_encode("activacion  Correcta");
            break;

            case "Eliminar":
                $datos=$jefes->eliminar_jefes($body["id_jefe"]);
                echo json_encode("Eliminacion  Correcta");
            break;
}


?>
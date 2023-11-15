<?php
header('Content-Type: aplication/json');

require_once("../../model/conexionApi.php");
require_once("../../model/consultasApi/consUsuario.php");
$usuarios = new Usuarios();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$usuarios->get_usuarios();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$usuarios->get_usuarios_x_id($body["id"]);
            echo json_encode($datos);
            break;

            case "Insert":
                $datos=$usuarios->insert_usuarios($body["nombre"],$body["email"],$body["cargo"],$body["clave"]);
                echo json_encode("Insert Correcto");
            break;

            case "Update":
                $datos=$usuarios->update_usuarios($body["id"],$body["nombre"],$body["email"],$body["cargo"],$body["clave"]);
                echo json_encode("Update Correcto");
            break;

            case "desactivar":
                $datos=$usuarios->desactivar_usuarios($body["id"]); 
                echo json_encode("desactivacion  Correcta");
            break;

            case "Activar":
                $datos=$usuarios->activar_usuarios($body["id"]); 
                echo json_encode("activacion  Correcta");
            break;

            case "Eliminar":
                $datos=$usuarios->eliminar_usuarios($body["id"]);
                echo json_encode("Eliminacion  Correcta");
            break;
}


?>
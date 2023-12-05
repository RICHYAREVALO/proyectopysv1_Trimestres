<?php
header('Content-Type: aplication/json');

require_once("../../model/conexionApi.php");
require_once("../../model/consultasApi/consUsuario.php");
$usuarios = new Usuarios();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["paz"]){

    case "c_general":
        $datos=$usuarios->get_usuarios();
        echo json_encode($datos);
        break;

        case "c_Id":
            $datos=$usuarios->get_usuarios_x_id($body["id"]);
            echo json_encode($datos);
            break;

            case "Insert":
                $datos=$usuarios->insert_usuarios($body["nombre"],$body["num_doc"],$body["tipo_doc"],$body["email"],$body["cargo"],$body["clave"]);
                echo json_encode("Insert Correcto");
            break;

            case "actualizar":
                $datos=$usuarios->update_usuarios($body["id"],$body["nombre"],$body["num_doc"],$body["tipo_doc"],$body["email"],$body["cargo"],$body["clave"]);
                echo json_encode("Update Correcto");
            break;

            case "desactivar":
                $datos=$usuarios->desactivar_usuarios($body["id"]); 
                echo json_encode("desactivacion  Correcta");
            break;

            case "activar":
                $datos=$usuarios->activar_usuarios($body["id"]); 
                echo json_encode("activacion  Correcta");
            break;

            case "eliminar":
                $datos=$usuarios->eliminar_usuarios($body["id"]);
                echo json_encode("Eliminacion  Correcta");
            break;
}


?>
<?php

header('Content-Type: aplication/json');

require_once('model/conexion.php');
require_once('model/consultasApi/consTipo_documento.php');
$tipo_documento = new tipo_documento_model();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){
  case "GetAll":
    datos=$tipo_documento->get_tipo_documento();
    echo json_encode($datos);
    break;

    case "GetId":
        $datos=$tipo_documento->get_tipo_documento_x_id($body["id_tipo_documento"]);
        echo json_encode($datos);
        break;

        case "Insert":
            $datos=$tipo_documento->insert_tipo_documento($body["id_tipo_documento"],$body["nom_tipo_documento"],$body["tipo_estado"]);
            echo json_encode("Insert Correcto");
        break;

        case "Update":
            $datos=$tipo_documento->update_tipo_documento($body["id_tipo_documento"],$body["nom_tipo_documento"],$body["tipo_estado"]);
            echo json_encode("Update Correcto");
        break;

        case "desactivar":
            $datos=$tipo_documento->desactivar_tipo_documento($body["id_tipo_documento"]); 
            echo json_encode("desactivacion  Correcta");
        break;

        case "Activar":
            $datos=$tipo_documento->activar_tipo_documento($body["id_tipo_documento"]); 
            echo json_encode("activacion  Correcta");
        break;

        case "Eliminar":
            $datos=$tipo_documento->eliminar_tipo_documento($body["id_tipo_documento"]);
            echo json_encode("Eliminacion  Correcta");
        break;
}
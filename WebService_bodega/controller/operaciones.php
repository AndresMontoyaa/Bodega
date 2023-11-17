<?php

    header('Content-type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Operaciones.php");
    $operaciones = new Operaciones();

    $body = json_decode(file_get_contents("php://input"), true);  

    switch($_GET["op"]){
        case "GetAll":
            $datos=$operaciones->get_operaciones();
            echo json_encode($datos);
        break;

        case "Insert":
            $datos=$operaciones->insert_operaciones($body["Fecha_Venta"],$body["Tipo"],);
            echo json_encode("Correcto");
        break;

        case "Update":
            $datos=$operaciones->update_operaciones($body["Codigo_Pro"],$body["Fecha_Venta"],$body["Tipo"]);
            echo json_encode("Correcto");
        break;

        case "Delete":
            $datos=$operaciones->delete_operaciones($body["Codigo_Pro"]);
            echo json_encode("Correcto");
        break;
    }
?>
<?php

    header('Content-type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Productos.php");
    $productos = new Productos();

    $body = json_decode(file_get_contents("php://input"), true);  

    switch($_GET["op"]){
        case "GetAll":
            $datos=$productos->get_productos();
            echo json_encode($datos);
        break;

        case "Insert":
            $datos=$productos->insert_productos($body["Nombre"],$body["Precio"],$body["Cantidad"],$body["Fecha_Ven"]);
            echo json_encode("Correcto");
        break;

        case "Update":
            $datos=$productos->update_productos($body["Codigo_Pro"],$body["Nombre"],$body["Precio"],$body["Cantidad"],$body["Fecha_Ven"]);
            echo json_encode("Correcto");
        break;

        case "Delete":
            $datos=$productos->delete_productos($body["Codigo_Pro"]);
            echo json_encode("Correcto");
        break;
    }
?>
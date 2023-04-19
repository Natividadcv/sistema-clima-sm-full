<?php
    /* TODO: Llamando Clases */
    require_once("../config/conexion.php");
    require_once("../models/Calendario.php");
    /* TODO: Inicializando clase */
    $calendario = new Calendario();

    switch($_GET["op"]){
        /* TODO: Listado de registros formato JSON para Datatable JS */
        case "listar":
            $datos=$calendario->get_estado();
            $data=Array();
            //$correlativo = 1;
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id"];
                $sub_array[] = $row["instalacion_completada"];
                //$sub_array[] = $correlativo++;
                $sub_array[] = $row["CLI_NOM"];
                $sub_array[] = $row["servicio"];
                $sub_array[] = $row["PROD_NOM"];
                $sub_array[] = $row["direccion"];
                $sub_array[] = $row["referencia"];
                $sub_array[] = $row["instalacion_coment"];
                $sub_array[] = $row["title"];
                $sub_array[] = $row["start"];
                $sub_array[] = $row["end"];
                $sub_array[] = '<button type="button" onClick="marcaComoCompletada(' . $row["id"] . ')" id="' . $row["id"] . '" class="btn btn-success btn-icon waves-effect waves-light"><i class="ri-task-line"></i></button>';
                $sub_array[] = '<button type="button" onClick="undoTaskCompletion(' . $row["id"] . ')" id="' . $row["id"] . '" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-arrow-go-back-line"></i></button>';
                $data[] = $sub_array;
                
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
            case "completar":
            if (!empty($_POST["id"])) {
                $calendario->update_completeTask($_POST["id"]);
            } 
            break;
        case "deshacer_completado":
            if (!empty($_POST["id"])) {
                $calendario->update_undoTaskCompletion($_POST["id"]);
            } 
            break;

    }
?>
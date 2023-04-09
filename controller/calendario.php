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
            $correlativo = 1;
            foreach($datos as $row){
                $sub_array = array();
                //$sub_array[] = $row["id"];
                $sub_array[] = $correlativo++;
                $sub_array[] = $row["CLI_NOM"];
                $sub_array[] = $row["title"];
                $sub_array[] = $row["start"];
                $sub_array[] = $row["end"];
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
    }
?>
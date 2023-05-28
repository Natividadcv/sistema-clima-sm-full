/* Este es un script PHP que maneja una solicitud con una declaración de cambio. El script espera un
parámetro GET llamado "op" para determinar qué caso ejecutar. En este caso, si el valor de "op" es
"combo", el script llamará a un método llamado "get_documento" de una clase llamada "Documento" y le
pasará un parámetro POST llamado "doc_tipo". Luego generará código HTML para una lista desplegable
basada en los datos devueltos por el método y lo repetirá. */
<?php
    /* TODO: Llamando Clases */
    require_once("../config/conexion.php");
    require_once("../models/Documento.php");
    /* TODO: Inicializando clase */
    $documento = new Documento();

    switch($_GET["op"]){

        /* TODO: Listar Combo */
        case "combo";
            $datos=$documento->get_documento($_POST["doc_tipo"]);
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option value='0' selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["DOC_ID"]."'>".$row["DOC_NOM"]."</option>";
                }
                echo $html;
            }
            break;

    }
?>
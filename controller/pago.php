/* Este es un script PHP que maneja una solicitud con una declaración de cambio. Comprueba el valor del
parámetro "op" en la solicitud y ejecuta diferentes bloques de código en función de su valor. En
este caso, si el parámetro "op" es "combo", llamará a un método de la clase "Pago" para recuperar
datos y generar código HTML para una lista desplegable. El código HTML generado se repite como
respuesta a la solicitud. */
<?php
    /* TODO: Llamando Clases */
    require_once("../config/conexion.php");
    require_once("../models/Pago.php");
    /* TODO: Inicializando clase */
    $pago = new Pago();

    switch($_GET["op"]){

        /* TODO: Listar Combo */
        case "combo";
            $datos=$pago->get_pago();
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option value='0' selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["PAG_ID"]."'>".$row["PAG_NOM"]."</option>";
                }
                echo $html;
            }
            break;

    }
?>
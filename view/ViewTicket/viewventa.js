/* Este código usa jQuery para realizar dos solicitudes AJAX POST a un script PHP que recupera y
muestra información sobre una venta (identificada por un parámetro en la URL) en una página web. La
primera solicitud recupera información general sobre la venta (como el nombre del cliente y el monto
total), y la segunda solicitud recupera una lista de artículos incluidos en la venta. Los datos
recuperados luego se usan para actualizar varios elementos HTML en la página. La función
`getUrlParameter` es una función auxiliar que extrae el valor de un parámetro de la URL. */
$(document).ready(function(){
    var vent_id = getUrlParameter('v');

    $.post("../../controller/venta.php?op=mostrar",{vent_id:vent_id},function(data){
        data=JSON.parse(data);
        $('#txtdirecc').html(data.EMP_DIRECC);
        $('#txtruc').html(data.EMP_RUC);
        $('#txtemail').html(data.EMP_CORREO);
        $('#txtweb').html(data.EMP_PAG);
        $('#txttelf').html(data.EMP_TELF);

        $('#vent_id').html(data.VENT_ID);
        var fecha = data.FECH_CREA.split(' ')[0];
        $('#fech_crea').html(fecha);
        $('#pag_nom').html(data.PAG_NOM);
        $('#txttotal').html(data.VENT_TOTAL);

        $('#vent_subtotal').html(data.VENT_SUBTOTAL);
        $('#vent_igv').html(data.VENT_IGV);
        $('#vent_total').html(data.VENT_TOTAL);

        $('#vent_coment').html(data.VENT_COMENT);

        $('#usu_nom').html(data.USU_NOM +' '+ data.USU_APE);
        $('#mon_nom').html(data.MON_NOM);

        $('#cli_nom').html("<b>Nombre: </b>"+data.CLI_NOM);
        $('#cli_ruc').html("<b>RUC: </b>"+data.CLI_RUC);
        $('#cli_direcc').html("<b>Dirección: </b>"+data.CLI_DIRECC);
        $('#cli_correo').html("<b>Correo: </b>"+data.CLI_CORREO);

    });

    $.post("../../controller/venta.php?op=listardetalleformato",{vent_id:vent_id},function(data){
        $('#listdetalle').html(data);
    });

});
/* TODO: Obtener parametro de URL */
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
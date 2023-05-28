/* Este es un código JavaScript que maneja un evento de clic en un botón con el ID "btnguardar". Cuando
se hace clic en el botón, recupera los valores de dos campos de entrada con ID "txtpass" y
"txtpassconfirm". Luego verifica si ambos campos no están vacíos y si los valores de los dos campos
coinciden. Si pasa la validación, envía una solicitud POST a un script PHP con el ID de usuario y la
nueva contraseña como parámetros. Si la validación falla, muestra un mensaje de error utilizando la
biblioteca SweetAlert. */
var usu_id = $('#USU_IDx').val();


$(document).on("click","#btnguardar", function(){
    var pass = $("#txtpass").val();
    var newpass = $("#txtpassconfirm").val();
    /* TODO:Validar campos vacios de contraseña */
    if (pass.length== 0 || newpass.lenght == 0){
        swal.fire({
            title:'Error',
            text: 'Campos Vacios',
            icon: 'error'
        });
    }else{
        /* TODO: Validar campo de confirmar contraseña */
        if(pass == newpass){
            $.post("../../controller/usuario.php?op=actualizar",{usu_id:usu_id,usu_pass:newpass},function(data){

            });

            swal.fire({
                title:'Correcto!',
                text: 'Actualizado Correctamente',
                icon: 'success'
            });
        }else{
            swal.fire({
                title:'Error',
                text: 'La contraseña no coinciden',
                icon: 'error'
            });
        }
    }
});
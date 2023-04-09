var suc_id = $("#SUC_IDx").val();
//console.log(suc_id);
function init() {
  $("#mantenimiento_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function nuevoRegistro() {
  window.location.href = "/CLIMA/view/MntCalendario/";
}

$(document).ready(function () {
  /* TODO: Listar informacion en el datatable js */
  $("#table_data").DataTable({
    aProcessing: true,
    aServerSide: true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5"],
    ajax: {
      url: "../../controller/calendario.php?op=listar",
      type: "post",
      data: { suc_id: suc_id },
    },
    bDestroy: true,
    responsive: true,
    bInfo: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    rowCallback: function (row, data, index) {
      console.log(data[1]);
      if (data[1] === "1") {
          $(row).addClass("completed");
      }
    },
  });
});

function marcaComoCompletada(id) {
  try {
    $.ajax({
      url: "../../controller/calendario.php?op=completar",
      type: "POST",
      data: { id: id },
      success: function (data) {
        /* TODO: Mensaje de sweetalert */
        swal.fire({
          title: "Instalacion Completado",
          text: "Felicitaciones, la instalacion se ha completado con exito",
          icon: "success",
        });
      },
    });
  } catch (error) {
    /* TODO: Manejo de errores */
    console.error(error);
    swal.fire({
      title: "Error",
      text: "Ocurrió un error al completar la instalación",
      icon: "error",
    });
  }
}

init();

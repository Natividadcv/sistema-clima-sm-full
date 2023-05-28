/* Un código HTML para una ventana modal con el ID "modalpermiso". La ventana modal contiene un
encabezado con el título "Permisos" y un botón de cierre, un cuerpo con una tabla con el ID
"permisos_data" y dos columnas "Nombre" y una columna vacía, y un pie de página con un botón
"Cerrar". La ventana modal está oculta por defecto. */
<div id="modalpermiso" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Permisos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">
                <table id="permisos_data" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
/* Este es un código HTML para una ventana modal con el id "modalconsumo". Contiene un encabezado con
el título "Consumo" y un botón de cierre, un cuerpo con una tabla que tiene columnas para "Tipo",
"Doc.", "Fech.Crea." y "Cant", y un pie de página con un Botón "Cerrar". El modal está oculto de
forma predeterminada (style="display: none;") y se puede activar para que se muestre usando
JavaScript o jQuery. */
<div id="modalconsumo" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Consumo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">
                <table id="consumo_data" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tipo</th>
                            <th>Doc.</th>
                            <th>Fech.Crea.</th>
                            <th>Cant</th>
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
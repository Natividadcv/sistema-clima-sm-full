/* Este es un código HTML para una ventana modal con un formulario para fines de mantenimiento. La
ventana modal está oculta de forma predeterminada (`style="display: none;"`) y se puede activar para
que se muestre usando JavaScript o jQuery. El formulario dentro del modal tiene campos de entrada
para "Nombre" (nombre) y un campo de entrada oculto para "rol_id" (ID de rol). También hay dos
botones en la parte inferior del modal, uno para cerrar el modal y el otro para enviar el formulario
con un valor de "agregar" para el parámetro "acción". */
<div id="modalmantenimiento" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbltitulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <!-- TODO: Formulario de Mantenimiento -->
            <form method="post" id="mantenimiento_form">
                <div class="modal-body">
                    <input type="hidden" name="rol_id" id="rol_id"/>

                    <div class="row gy-2">
                        <div class="col-md-12">
                            <div>
                                <label for="valueInput" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="rol_nom" name="rol_nom" required/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-primary ">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
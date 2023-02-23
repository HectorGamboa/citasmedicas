<!-- Modal Eliminar -->
<div class="modal fade" id="eliminarTipoCampoModal" tabindex="-1" aria-labelledby="eliminarTipoCampoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarTipoCampoModalLabel">Crear tipo_campo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                ¿Realmente desea eliminar al tipo_campo <span class="font-weight-bold" id="campo"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" ng-click="delete(dato)">Eliminar</button>
            </div>
        </div>
    </div>
</div>
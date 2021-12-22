<div>
    <!-- Modal -->
    <div class="modal fade" id="deleteServicioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el servicio seleccionado?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" wire:click='destroy_servicio' wire:loading.remove wire:target='destroy_servicio' >Eliminar</button>
                    <div wire:loading wire:target='destroy_servicio'>Eliminando...</div>
                </div>
            </div>
        </div>
    </div>
</div>

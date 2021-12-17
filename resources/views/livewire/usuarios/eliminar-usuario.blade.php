<div>
    <!-- Modal -->
    <div class="modal fade" id="eliminarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar  usuario <input wire:model='usuario.email' class="border-0" disabled></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  ¿Desea eliminar el usuario seleccionado?
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" wire:click='destroy_usuario'>Eliminar</button>
          </div>
        </div>
      </div>
    </div>
</div>

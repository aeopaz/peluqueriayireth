<div>
    <!-- Modal -->
    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar al usuario <input wire:model='usuario.email' class="border-0"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <label for="">Nombre</label>
                  <input class="form-control" wire:model.defer='usuario.name'>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" wire:click='update_usuario'>Actualizar</button>
          </div>
        </div>
      </div>
    </div>
</div>

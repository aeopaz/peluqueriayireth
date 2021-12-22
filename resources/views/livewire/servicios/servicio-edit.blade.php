<div>
    <!-- Modal -->
    <div class="modal fade" id="editServicioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <input class="form-control @error ('servicio.nombre') is-invalid @enderror" wire:model.defer='servicio.nombre'>
                            @error('servicio.nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Costo</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control @error ('servicio.costo') is-invalid @enderror" wire:model.defer='servicio.costo'>
                            @error('servicio.costo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click='update_servicio' wire:loading.remove wire:target='update_servicio' >Actualizar</button>
                    <div wire:loading wire:target='update_servicio'>Guardando...</div>
                </div>
            </div>
        </div>
    </div>
</div>

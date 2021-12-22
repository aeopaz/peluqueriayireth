<div>
    <button class="btn btn-primary" wire:click='create_servicio'>Crear Nuevo Servicio</button>
    <!-- Modal -->
    <div class="modal fade" id="crearServicioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <input class="form-control @error ('nombre') is-invalid @enderror" wire:model.defer='nombre'>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Costo</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control @error ('costo') is-invalid @enderror" wire:model.defer='costo'>
                            @error('costo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click='store_servicio' wire:loading.remove wire:target='store_servicio' >Crear</button>
                    <div wire:loading wire:target='store_servicio'>Guardando...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <!-- Modal -->
    <div class="modal fade" id="crearTurnoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Solicitar Turno Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Fecha y Hora</label>
                        <div class="col-md-6">
                            {{ date(now()) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Seleccione los servicios</label>
                        <div class="col-md-6">
                            @foreach ($servicios as $servicio)
                                <div class="row">
                                    <div class="col">
                                        {{ $servicio->nombre }}
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" value="{{ $servicio->id }}">
                                    </div>

                                </div>

                            @endforeach
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
                    <button type="button" class="btn btn-primary" wire:click='store_servicio' wire:loading.remove
                        wire:target='store_servicio'>Crear</button>
                    <div wire:loading wire:target='store_servicio'>Guardando...</div>
                </div>
            </div>
        </div>
    </div>
</div>

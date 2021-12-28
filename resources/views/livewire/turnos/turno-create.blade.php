<div>
    <!-- Modal -->
    <div class="modal fade" id="crearTurnoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Solicitar Turno Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black;">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Fecha y Hora</label>
                        </div>
                        <div class="col-6">
                            {{ date(now()) }}
                        </div>
                    </div>
                    @if (Auth::guest())
                        <div class="row">
                            <div class="col">
                                <Label>Nombre:</Label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control @error('nombre_cliente') is-invalid @enderror" wire:model.defer='nombre_cliente'>
                                @error('nombre_cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <div class="row ml-0"><label for="">Seleccione Servicio:</label></div>
                    @if ($errors->any())
                        <b style="color:red">Debe seleccionar al menos un servicio</b>
                    @endif
                    @foreach ($servicios as $index => $servicio)
                        <div class="row">
                            <div class="col">
                                {{ $servicio->nombre }}
                            </div>
                            <div class="col">
                                <input type="checkbox" class="form-control @error('servicio') is-invalid @enderror"
                                    wire:model='servicio' value="{{ $servicio->id }}">
                            </div>
                        </div>
                    @endforeach
                    <br>
                    <b style="color:red">Importante:</b>
                    <br>
                    Si no se encuentra al momento de ser llamado, su turno será cerrado y tendrá que generar uno nuevo
                    {{-- <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Fecha y Hora</label>
                        <div class="col-md-6">

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
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click='store_turno' wire:loading.remove
                        wire:target='store_turno'>Crear</button>
                    <div wire:loading wire:target='store_turno'>Generando...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <!-- Modal -->
    @if(isset($detalle_turno[0]))
    <div class="modal fade" id="showTurnoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle Turno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container text-center">
                        <h1>Turno No. {{ $detalle_turno[0]->id_turno }}</h1>
                        <b>Fecha:</b> {{ date_format($detalle_turno[0]->created_at, 'Y-M-d') }}
                        <b>Hora:</b> {{ date_format($detalle_turno[0]->created_at, 'g:i:s') }}
                        <br>
                        <b>Estado: </b> {{ $detalle_turno[0]->estado }}
                        <br>
                        <b>Servicios Seleccionados</b>
                        @foreach ($detalle_turno as $detalle)
                            <div class="row justify-content-center">
                                    <li>{{ $detalle->nombre }}</li>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <b style="color:red">Importante:</b>
                    <br>
                    Si no se encuentra al momento de ser llamado, su turno será cerrado y tendrá que generar uno nuevo
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    {{-- <button type="button" class="btn btn-primary" wire:click='store_turno' wire:loading.remove
                        wire:target='store_turno'>Crear</button>
                    <div wire:loading wire:target='store_turno'>Guardando...</div> --}}
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

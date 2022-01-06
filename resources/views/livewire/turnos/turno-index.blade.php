<div>
    {{-- <img src="{{ asset('img/tiquete.png') }}" alt="" height="200px" width="200px"> --}}
    <div class="container">
        <div class="row justify-content-center">
            @if ($estado == 'A')
                @if ($turno_usuario_actual == null){{-- Valida si el usuario tiene un turno pendiente --}}
                    <div class="row">
                        <button class="btn btn-primary" wire:click='create_turno'>Solicitar turno</button>
                    </div>
                @endif
            @elseif($estado == 'C')
                <div class="alert alert-info"><b>No hay Servicio</b></div>
            @elseif($estado == 'S')
                <div class="alert alert-warning"><b>Vuelvo en seguida</b></div>
            @endif

        </div>
        {{-- Muestra los turnos en curso, en cola y el turno del usuario logueado --}}
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 table-dark">
                <div class="row justify-content-center"><b class="h1">Tu Turno</b></div>
                <div class="row justify-content-center">
                    @if ($turno_usuario_actual == null)
                        <h2>--</h2>
                    @else
                        <h2>{{ $turno_usuario_actual->id }}</h2>
                    @endif

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 table-info">
                <div class="row justify-content-center"><b>Turnos en Cola({{ count($pendientes) }})</b></div>
                @if (count($pendientes) == 0)
                    <div class="row justify-content-center">
                        --
                    </div>
                @else
                    <ul>
                        @foreach ($pendientes as $index=> $pendiente)
                            <div class="row justify-content-center">
                                <li>Turno No. {{ $pendiente->id }}</li>
                            </div>
                        @endforeach
                    </ul>
                @endif

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 table-warning">
                <div class="row justify-content-center"><b>Turnos en proceso ({{ count($en_proceso) }})</b></div>
                @if (count($en_proceso) == 0)
                    <div class="row justify-content-center">
                        --
                    </div>
                @else
                    <ul>
                        @foreach ($en_proceso as $proceso)
                            <div class="row justify-content-center">
                                <li>Turno No. {{ $proceso->id }}</li>
                            </div>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
    @if (Auth::user()->rol == 'admin' || Auth::user()->rol == 'peluquero')
        <input type="text" class="form-control mt-1" placeholder="Buscar" wire:model='buscar'>
        <b>Fecha Inicial</b>
        <input type="date" name="" id="" wire:model='fecha_inicial'>
        <b>Fecha Final</b>
        <input type="date" name="" id="" wire:model='fecha_final'>
        @if (count($turnos))
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th wire:click='ordenar("turnos.id")'>No. Turno</th>
                        <th wire:click='ordenar("name")'>Cliente</th>
                        <th wire:click='ordenar("created_at")'>Fecha</th>
                        <th wire:click='ordenar("created_at")'>Hora</th>
                        <th wire:click='ordenar("estado")'>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($turnos as $turno)
                        <tr {{-- Estable el color de la fila dependiendo del estado --}} @if ($turno->estado == 'Pendiente')
                            class="table-info"
                        @elseif ($turno->estado == 'En proceso')
                            class="table-warning"
                        @elseif ($turno->estado == 'Atendido')
                            class="table-success"
                        @elseif ($turno->estado == 'Cancelado')
                            class="table-danger"
                    @endif>
                    <td>{{ $turno->id_turno }}</td>
                    <td>{{ $turno->nombre_cliente . '-' . $turno->rol }}</td>
                    <td>{{ date_format($turno->created_at, 'Y-M-d') }}</td>
                    <td>{{ date_format($turno->created_at, 'g:i:s') }}</td>
                    <td>{{ $turno->estado }}</td>
                    <td>
                        <button class="btn btn-primary"
                            wire:click='show_detalle_turno({{ $turno }})'>Ver</button>
                        <button class="btn btn-light" wire:click='atender_turno({{ $turno }})'>
                            @if ($turno->estado == 'Pendiente')
                                Atender
                            @elseif ($turno->estado == 'En proceso')
                                Marcar como Atendido
                            @elseif ($turno->estado == 'Atendido')
                                Atendido
                            @elseif ($turno->estado == 'Cancelado')
                                Cancelado
                            @endif
                            {{-- Boton Cancelar el turno --}}
                            @if ($turno->estado == 'Pendiente')
                                <button class="btn btn-dark ml-1"
                                    wire:click='cancelar_turno({{ $turno->id_turno }})'>Cancelar
                                </button>
                            @endif
                        </button>
                        {{-- @if ($turno->estado == 'Pendiente')
                                <button class="btn btn-info"
                                    wire:click='atender_turno({{ $turno }})'>Atender</button>
                                <button class="btn btn-danger"
                                    wire:click='cancelar_turno({{ $turno->id_turno }})'>Cancelar</button>
                            @elseif ($turno->estado == 'En proceso')
                                <button class="btn btn-primary" wire:click='atender_turno({{ $turno->id_turno }})'>Marcar
                                    como
                                    Atendido</button>
                            @elseif ($turno->estado == 'Atendido')
                                <button class="btn btn-success">Atendido</button>
                            @endif --}}
                        </th>
                        </tr>
        @endforeach
        </tbody>
        </table>

    @else
        No se han encontrado resultados
    @endif
    @endif
</div>

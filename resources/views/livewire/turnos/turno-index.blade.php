<div>
    {{-- <img src="{{ asset('img/tiquete.png') }}" alt="" height="200px" width="200px"> --}}
    <div class="container">
        <div class="row justify-content-center">

            @if (isset($turno_usuario_actual)){{-- Valida si el usuario tiene un turno pendiente --}}
                <div class="turno-actual">
                    <a href="#" style="color: black" class="btn">Tu Turno es el No.
                        {{ $turno_usuario_actual->id }}</a>
                </div>
            @else
                <div class="solicitar-turno">
                    <a href="#" style="color: white" class="btn" wire:click='create_turno'>Solicitar turno</a>
                </div>
            @endif

            @if (isset($proximo_turno)){{-- Valida si el usuario tiene un turno pendiente --}}
                <div class="proximo-turno">
                    <a href="#" style="color: white" class="btn">Próximo Turno
                        {{ $proximo_turno->id }}</a>
                </div>
            @endif

        </div>
    </div>
    <input type="text" class="form-control mt-1" placeholder="Buscar" wire:model='buscar'>
    <table class="table table-hover">
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
                <tr>
                    <td>{{ $turno->id_turno }}</td>
                    <td>{{ $turno->nombre_usuario }}</td>
                    <td>{{ date_format($turno->created_at, 'Y-M-d') }}</td>
                    <td>{{ date_format($turno->created_at, 'g:i:s') }}</td>
                    <td>{{ $turno->estado }}</td>
                    <td>
                        @if ($turno->estado == 'Pendiente')
                            <button class="btn btn-info"
                                wire:click='atender_turno({{ $turno }})'>Atender</button>
                            <button class="btn btn-danger"
                                wire:click='cancelar_turno({{ $turno }})'>Cancelar</button>
                        @elseif ($turno->estado == 'En proceso')
                            <button class="btn btn-primary" wire:click='atender_turno({{ $turno }})'>Marcar como
                                Atendido</button>
                        @elseif ($turno->estado == 'Atendido')
                            <button class="btn btn-success">Atendido</button>
                        @endif

                        </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

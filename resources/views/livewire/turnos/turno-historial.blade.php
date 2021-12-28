<div>
    <input type="text" class="form-control mt-1" placeholder="Buscar" wire:model='buscar'>
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
                <tr>
                    <td>{{ $turno->id_turno }}</td>
                    <td>{{ $turno->nombre_usuario }}</td>
                    <td>{{ date_format($turno->created_at, 'Y-M-d') }}</td>
                    <td>{{ date_format($turno->created_at, 'g:i:s') }}</td>
                    <td>{{ $turno->estado }}</td>
                    <td><button class="btn btn-primary" wire:click='show_detalle_turno({{ $turno }})'>Ver</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

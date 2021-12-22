<div>
    <div class="container">
        @livewire('servicios.servicio-create')
        <input type="text" class="form-control mt-1" placeholder="Buscar" wire:model='buscar'>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th wire:click='ordenar("nombre")'>Nombre</th>
                    <th wire:click='ordenar("costo")'>Valor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{number_format($servicio->costo,0,'','.') }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click='edit_servicio({{ $servicio }})'>Editar</button>
                            <button class="btn btn-danger" wire:click='delete_servicio({{ $servicio }})'>Eliminar</button>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @livewire('servicios.servicio-edit')
    @livewire('servicios.servicio-delete')
</div>

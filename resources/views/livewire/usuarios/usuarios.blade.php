<div>
    <div class="container">
        <div class="card">
            <div class="card-header">Usuarios</div>
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Operaciones</th>
                        </tr>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Ver</a>
                                    <button class="btn btn-success" wire:click='editar_usuario({{$usuario}})'>Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('livewire.usuarios.edit-usuarios')
</div>

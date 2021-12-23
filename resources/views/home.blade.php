@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <br>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $mensaje->titulo }}</div>
                    <div class="card-body">
                        {{ $mensaje->cuerpo }}
                    </div>
                </div>
            </div>
        </div>
        @livewire('turnos.turno-index')
        @livewire('turnos.turno-create')
        @livewire('turnos.turno-show')
    </div>
@stop
@section('css')
    <style type="text/css">
        .turno {
            height: 100px;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            border: 1;
            background: green;
            color: white;
        }

    </style>
@stop
@section('js')
    {{-- Escucha el evento 'modal' y ejecuta el script --}}
    <script type="text/javascript">
        window.livewire.on('modal', (nombreModal, propiedad) => {
            $('#' + nombreModal).modal(propiedad);

        });
    </script>
@stop

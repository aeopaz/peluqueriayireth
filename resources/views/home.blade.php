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
                    <div class="card-header"><b><em> {{ $mensaje->titulo }}</em></b></div>
                    <div class="card-body">
                       <em> {{ $mensaje->cuerpo }}</em>
                    </div>
                    <div class="text-center">
                        <b><em> {{ $mensaje->cita }}</em></b>
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
        .turno-actual {
            height: 100px;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            border: 1px;
            border-color: black;
            background: rgb(156, 133, 133);
        }
        .proximo-turno {
            height: 100px;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            border: 1px;
            border-color: black;
            background: rgb(71, 70, 70);

        }
        .solicitar-turno {
            height: 100px;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            border: 1px;
            border-color: black;
            background: green;

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

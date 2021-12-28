@extends('adminlte::page')

@section('title', 'Historial')

@section('content_header')
    <h1>Mis Turnos</h1>
@stop

@section('content')
@livewire('turnos.turno-historial')
@livewire('turnos.turno-show')
@stop

@section('css')

@stop
@section('js')
    {{-- Escucha el evento 'modal' y ejecuta el script --}}
    <script type="text/javascript">
        window.livewire.on('modal', (nombreModal, propiedad) => {
            $('#' + nombreModal).modal(propiedad);

        });
    </script>
@stop

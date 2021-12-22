@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Parametrización de Servicios</h1>
@stop

@section('content')
    @livewire('servicios.servicio-index')
@stop

@section('css')

@stop

@section('js')
{{-- Escucha el evento 'modal' y ejecuta el script--}}
<script type="text/javascript">
    window.livewire.on('modal',(nombreModal,propiedad)=>{
        $('#'+nombreModal).modal(propiedad);

    });
</script>
@stop

@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1>Lista de Usuarios</h1>
@stop

@section('content')
@livewire('usuarios.usuarios')
@stop

@section('css')

@stop

@section('js')
{{-- Escucha el evento 'modal' y ejecuta el script--}}
<script type="text/javascript">
    window.livewire.on('modal',(nombreModal,propiedad)=>{
        $('#'+nombreModal).modal(propiedad);
        console.log('hola');

    });
</script>
@stop



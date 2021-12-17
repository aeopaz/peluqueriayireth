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
    <div>
        <button>Solicit</button>
    </div>
</div>
@stop
@section('css')

@stop

@section('js')

@stop

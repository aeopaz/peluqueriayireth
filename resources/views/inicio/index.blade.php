@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#crearTurnoModal">
            Solicitar Turno
        </button>
    </div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/fondo1.gif') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/fondo2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/fondo3.jpg') }}" alt="Third slide">
                </div>
            </div>
        </div>
        @livewireScripts
        @livewire('turnos.turno-create')
        @livewire('turnos.turno-show')
     
     {{-- Escucha el evento 'modal' y ejecuta el script --}}
    <script type="text/javascript">
        window.livewire.on('modal', (nombreModal, propiedad) => {
            $('#' + nombreModal).modal(propiedad);

        });
    </script>
@endsection
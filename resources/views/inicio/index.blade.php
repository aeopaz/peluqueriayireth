@extends('layouts.maestra')
@section('content')
   {{--  <div class="row justify-content-center">
        @if ($estado == 'A')
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#crearTurnoModal">
                Solicitar Turno
            </button>
        @elseif($estado == 'C')
            <div class="alert alert-info"><b>No hay Servicio</b></div>
        @elseif($estado == 'S')
            <div class="alert alert-warning"><b>Vuelvo en seguida</b></div>
        @endif
    </div> --}}
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div  id="boton_turno">
            @if ($estado == 'A')
                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal" data-target="#crearTurnoModal">
                    Solicitar Turno
                </button>
            @elseif($estado == 'C')
            <button type="button" class="btn btn-dark mb-2">No hay Servicio</button>
            @elseif($estado == 'S')
            <button type="button" class="btn btn-warning mb-2">Vuelvo en seguida</button>
            @endif
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block rounded" src="{{ secure_asset('img/cortes/corte1.jpg') }}" alt="First slide" width="500px"
                    height="500px">
            </div>
            <div class="carousel-item">
                <img class="d-block rounded" src="{{ secure_asset('img/cortes/corte2.jpg') }}" alt="Second slide" width="500px"
                    height="500px">
            </div>
            <div class="carousel-item">
                <img class="d-block rounded" src="{{ secure_asset('img/cortes/corte3.jpg') }}" alt="Third slide" width="500px"
                    height="500px">
            </div>
        </div>
    </div>
    @livewireScripts
    @livewire('turnos.turno-create')
    @livewire('turnos.turno-show')
    @include('local.cerrado')

    {{-- Escucha el evento 'modal' y ejecuta el script --}}
    <script type="text/javascript">
        window.livewire.on('modal', (nombreModal, propiedad) => {
            $('#' + nombreModal).modal(propiedad);

        });
    </script>

    <style type="text/css">
       

    </style>
@endsection

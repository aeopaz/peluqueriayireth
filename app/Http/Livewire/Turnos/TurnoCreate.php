<?php

namespace App\Http\Livewire\Turnos;

use App\Models\Servicio;
use Livewire\Component;

class TurnoCreate extends Component
{
    public function render()
    {
        $servicios=Servicio::all();
        return view('livewire.turnos.turno-create',compact('servicios'));
    }
}

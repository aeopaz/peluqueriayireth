<?php

namespace App\Http\Livewire\Turnos;

use Livewire\Component;

class TurnoIndex extends Component
{
    public function render()
    {
        return view('livewire.turnos.turno-index');
    }

    public function create_turno(){
        $this->emit('modal','crearTurnoModal','show');
        //dd('hola');
    }
}

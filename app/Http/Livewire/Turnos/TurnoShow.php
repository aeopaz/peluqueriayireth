<?php

namespace App\Http\Livewire\Turnos;

use App\Models\DetalleTurno;
use App\Models\Turno;
use Livewire\Component;

class TurnoShow extends Component
{
    protected $listeners=['turno_show'];
    public $id_turno=6;


    public function turno_show(Turno $turno){
        $this->id_turno=$turno->id;

    }
  /*  public function mount($turno){
        $this->id_turno=$turno;
    }*/

    public function render()
    {
        $detalle_turno=DetalleTurno::join('servicio','servicio.id','id_servicio')
        ->join('turnos','turnos.id','id_turno')
        ->where('id_turno',$this->id_turno)->get();
        return view('livewire.turnos.turno-show',compact('detalle_turno'));
    }


}

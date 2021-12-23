<?php

namespace App\Http\Livewire\Turnos;

use App\Models\DetalleTurno;
use App\Models\Servicio;
use App\Models\Turno;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TurnoCreate extends Component
{
    public $servicio=[];

    public function render()
    {
        $servicios=Servicio::all();
        return view('livewire.turnos.turno-create',compact('servicios'));
    }

    protected $rules=['servicio'=>'required'];

    public function store_turno(){
        $this->validate();
        //Crea el turno
        $turno=new Turno();
        $turno->id_cliente=Auth::user()->id;
        $turno->estado='Pendiente';
        $turno->save();
        //Obtiene el número de servicios selecionados por el usuario
        $num_servicios=count($this->servicio);
        //dd($this->servicio);

        //Por cada servicio seleccionado crea un registro en detalle turno
       for ($i=0; $i < $num_servicios ; $i++) {
        $detalle_turno=new DetalleTurno();
        $detalle_turno->id_turno=$turno->id;
        $detalle_turno->id_servicio=$this->servicio[$i];
        $detalle_turno->save();
       }
       $this->reset(['servicio']);
       $this->emit('modal','crearTurnoModal','hide');
       $this->emit('modal','showTurnoModal','show');
       $this->emit('turno_show',$turno->id);
       $this->emit('render');


    }
}

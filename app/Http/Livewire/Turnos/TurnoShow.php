<?php

namespace App\Http\Livewire\Turnos;

use App\Models\Calificar;
use App\Models\DetalleTurno;
use App\Models\Turno;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TurnoShow extends Component
{
    protected $listeners=['turno_show'];
    public $id_turno;
    public $puntaje;
    public $estado_usuario;


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
    
    public function calificar(){

        $this->estado_usuario = Auth::guest(); //Obtiene el valor boleano true si el usuario esta logueado, de lo contrario, obtendrá false
        if ($this->estado_usuario) {
            $id_usuario = 3; //Si el usuario no esta logueado, se creará el turno con el id del usuario invitado
        } else {
            $id_usuario = Auth::user()->id;
        }
        $calificacion=new Calificar();
        $calificacion->id_usuario=Auth::user()->id;

    }


}

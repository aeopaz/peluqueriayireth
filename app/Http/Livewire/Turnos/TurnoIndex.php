<?php

namespace App\Http\Livewire\Turnos;

use App\Models\Turno;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TurnoIndex extends Component
{
    protected $listeners=['render'=>'render'];//Oyente del evento
    public $buscar, $columna='turnos.id',$orden='asc';

    public function render()
    {
        $turnos=Turno::select(
        'turnos.id as id_turno',
        'name as nombre_usuario',
        'turnos.created_at',
        'turnos.estado')
        ->join('users','users.id','id_cliente')
        ->where('name','like','%'.$this->buscar.'%')//Buscar y ordenar
        ->orWhere('turnos.id','like','%'.$this->buscar.'%')
        ->orWhere('turnos.estado','like','%'.$this->buscar.'%')
        ->orderBy($this->columna,$this->orden)
        ->get();
            //Obtiene el turno actual del usuario si lo tiene
        $turno_usuario_actual=Turno::where(function ($query){$query->where('estado','Pendiente')
        ->orWhere('estado','En proceso');})
        ->where('id_cliente',Auth::user()->id)
        ->first();
        //Obtiene el proximo turno
        if($turno_usuario_actual){
            $proximo_turno=Turno::where(function ($query){$query->where('estado','Pendiente')
                ->orWhere('estado','En proceso');})
                ->where('id','<',$turno_usuario_actual->id)
                ->first();
        }else{//Modificar esta consulta
          $proximo_turno=Turno::latest('id')
           ->where('estado','pendiente')
           ->where('id_cliente','<>',Auth::user()->id)
           ->first();
        }

        return view('livewire.turnos.turno-index',compact('turnos','turno_usuario_actual','proximo_turno'));
    }

    public function create_turno(){
        $this->emit('modal','crearTurnoModal','show');
    }
    public function ordenar($columna){//Ordenar
        $this->columna=$columna;
        if($this->orden=='desc'){
            $this->orden='asc';
        }else{
            $this->orden='desc';
        }

    }

    public function atender_turno(Turno $turno){
        $turno=Turno::find($turno->id);
        if($turno->estado=='Pendiente'){
            $turno->estado='En proceso';
            $turno->save();
        }elseif($turno->estado=='En proceso'){
            $turno->estado='Atendido';
            $turno->save();
        }
    }
    public function cancelar_turno(Turno $turno){
        $turno=Turno::find($turno->id);
        if($turno->estado=='Pendiente'){
            $turno->estado='Cancelado';
            $turno->save();
        }
    }
}

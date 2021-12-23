<?php

namespace App\Http\Livewire\Turnos;

use App\Models\Turno;
use Livewire\Component;

class TurnoIndex extends Component
{
    protected $listeners=['render'=>'render'];//Oyente del evento
    public $buscar, $columna='name',$orden='desc';

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
        return view('livewire.turnos.turno-index',compact('turnos'));
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
}

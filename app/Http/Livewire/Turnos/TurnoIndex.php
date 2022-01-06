<?php

namespace App\Http\Livewire\Turnos;

use App\Models\Local;
use App\Models\Turno;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class TurnoIndex extends Component
{
    protected $listeners = ['render' => 'render']; //Oyente del evento
    public $buscar, $columna = 'turnos.id', $orden = 'asc';
    public $fecha_inicial,$fecha_final;

    public function render()
    {
        $this->fecha_inicial=date_format(now(), 'Y-m-d');
        $this->fecha_final=date_format(now(), 'Y-m-d');

        //Buscar y ordenar
        $turnos = Turno::select(
            'turnos.id as id_turno',
            'name as nombre_usuario',
            'nombre_cliente', //Este campo es para poder guardar el nombre cuando el cliente no ha iniciado sesión
            'rol',
            'num_turno',
            'turnos.created_at',
            'turnos.estado'
        )
            ->join('users', 'users.id', 'id_cliente')
            ->where(function ($query){$query->where('name', 'like', '%' . $this->buscar . '%')
            ->orWhere('turnos.id', 'like', '%' . $this->buscar . '%')
            ->orWhere('turnos.estado', 'like', '%' . $this->buscar . '%');})
            ->whereDate('turnos.created_at','>=',$this->fecha_inicial)
            ->whereDate('turnos.created_at','<=',$this->fecha_final)
            ->orderBy($this->columna, $this->orden)
            ->get();

            
        //Obtiene el turno actual del usuario si lo tiene
        $turno_usuario_actual = Turno::where(function ($query) {
            $query->where('estado', 'Pendiente')
                ->orWhere('estado', 'En proceso');
        })
            ->where('id_cliente', Auth::user()->id)
            ->first();
        //Obtiene los turnos en proceso
        $en_proceso = Turno::where('estado', 'En proceso')->get();
        //Obtiene los turnos pendientes o en cola
        $pendientes = Turno::where('estado', 'Pendiente')->get();
        /* if($turno_usuario_actual){
            $proximo_turno=Turno::where(function ($query){$query->where('estado','Pendiente')
                ->orWhere('estado','En proceso');})
                ->where('id','<',$turno_usuario_actual->id)
                ->first();
        }else{//Modificar esta consulta
          $proximo_turno=Turno::latest('id')
           ->where('estado','pendiente')
           ->where('id_cliente','<>',Auth::user()->id)
           ->first();
        }*/
        //Obtiene el estado del local, si esta cerrado, ausente o abierto
        $estado_local = Local::orderBy('created_at', 'desc')->first();
        if (isset($estado_local->estado)) {
            $estado = $estado_local->estado;
        } else {
            $estado = null;
        }

        return view('livewire.turnos.turno-index', compact('turnos', 'turno_usuario_actual', 'en_proceso', 'pendientes','estado'));
    }

    public function create_turno()
    {

        $this->emit('modal', 'crearTurnoModal', 'show');
    }
    public function ordenar($columna)
    { //Ordenar
        $this->columna = $columna;
        if ($this->orden == 'desc') {
            $this->orden = 'asc';
        } else {
            $this->orden = 'desc';
        }
    }

    public function atender_turno(Turno $turno)
    {
        //dd($turno->id);
        $turno = Turno::find($turno->id);
        if ($turno->estado == 'Pendiente') {
            $turno->estado = 'En proceso';
            $turno->save();
        } elseif ($turno->estado == 'En proceso') {
            $turno->estado = 'Atendido';
            $turno->save();
        }
    }
    public function cancelar_turno(Turno $turno)
    {
        //dd($turno->id);
        $turno = Turno::find($turno->id);
        if ($turno->estado == 'Pendiente') {
            $turno->estado = 'Cancelado';
            $turno->save();
        }
    }

    public function show_detalle_turno(Turno $turno)
    {
        $this->emit('modal', 'showTurnoModal', 'show');
        $this->emit('turno_show', $turno->id);
    }
}

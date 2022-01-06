<?php

namespace App\Http\Livewire\Turnos;

use App\Models\DetalleTurno;
use App\Models\Servicio;
use App\Models\Turno;
use App\Models\Local;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TurnoCreate extends Component
{
    public $servicio = [];
    public $nombre_cliente;
    public $estado_usuario;

    public function render()
    {
        $servicios = Servicio::all();
        return view('livewire.turnos.turno-create', compact('servicios'));
    }

    /* protected $rules = [
       
    ];*/

    public function store_turno()
    {
        $estado_local = Local::orderBy('created_at', 'desc')->first();
        if (isset($estado_local)) {
            if ($estado_local->estado == 'A') {
                $this->estado_usuario = Auth::guest(); //Obtiene el valor boleano true si el usuario esta logueado, de lo contrario, obtendrá false
                if ($this->estado_usuario) {
                    $id_usuario = 3; //Si el usuario no esta logueado, se creará el turno con el id del usuario invitado
                } else {
                    $id_usuario = Auth::user()->id;
                    $this->nombre_cliente = Auth::user()->name;
                }
                $this->validate([
                    'servicio' => 'required',
                    'nombre_cliente' => 'required',
                ]);

                $turnos=Turno::whereDate('created_at',date_format(now(), 'Y-m-d'))->get();//Obtiene los turnos que corresponden al día de hoy
                $cantidad_turnos=$turnos->count();//Cuenta la cantidad de turnos del día
                

                //Crea el turno
                $turno = new Turno();
                $turno->id_cliente = $id_usuario; //Auth::user()->id;//
                $turno->nombre_cliente = $this->nombre_cliente;
                $turno->estado = 'Pendiente';
                $turno->num_turno=$cantidad_turnos+1;//Asigna el número de turno que corresponde para el día
                $turno->save();
                //Obtiene el número de servicios selecionados por el usuario
                $num_servicios = count($this->servicio);


                //Por cada servicio seleccionado crea un registro en detalle turno
                for ($i = 0; $i < $num_servicios; $i++) {
                    $detalle_turno = new DetalleTurno();
                    $detalle_turno->id_turno = $turno->id;
                    $detalle_turno->id_servicio = $this->servicio[$i];
                    $detalle_turno->save();
                }
                $this->reset(['servicio', 'nombre_cliente']);
                $this->emit('modal', 'crearTurnoModal', 'hide');
                $this->emit('modal', 'showTurnoModal', 'show');
                $this->emit('turno_show', $turno->id);
                $this->emit('render');
            } else {
                $this->emit('modal', 'crearTurnoModal', 'hide');
                $this->emit('modal', 'cerradoModal', 'show');
            }
        }
    }
}

<?php

namespace App\Http\Livewire\Servicios;

use Livewire\Component;
use App\Models\Servicio;

class ServicioDelete extends Component
{
    public $servicio;
    protected $listeners=['servicio_delete'];
    public function render()
    {
        return view('livewire.servicios.servicio-delete');
    }

    public function servicio_delete(Servicio $servicio){
        $this->servicio=$servicio;
    }

    public function destroy_servicio(){
        $servicio=Servicio::find($this->servicio->id);
        $servicio->delete();
        $this->emit('modal','deleteServicioModal','hide');
        $this->emit('render');

    }
}

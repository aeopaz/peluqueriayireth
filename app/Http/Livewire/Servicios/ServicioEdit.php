<?php

namespace App\Http\Livewire\Servicios;

use Livewire\Component;
use App\Models\Servicio;

class ServicioEdit extends Component
{
    protected $listeners=['servicio_edit'];

    public $servicio;
    protected $rules=[
        'servicio.nombre'=>'required|max:255',
        'servicio.costo'=>'required|numeric',
    ];


    public function render()
    {

        return view('livewire.servicios.servicio-edit');
    }

    public function servicio_edit(Servicio $servicio){
        $this->servicio=$servicio;

    }


    public function update_servicio(){
        $this->validate();
        $servicio=Servicio::find($this->servicio->id);
        $servicio->nombre=$this->servicio->nombre;
        $servicio->costo=$this->servicio->costo;
        $servicio->save();
        $this->emit('modal','editServicioModal','hide');
        $this->emit('render');


    }
}

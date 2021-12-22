<?php

namespace App\Http\Livewire\Servicios;

use App\Models\Servicio;
use Livewire\Component;

class ServicioCreate extends Component
{
    public  $nombre, $costo;

protected $rules=[
    'nombre'=>'required|max:255',
    'costo'=>'numeric',
];
    public function render()
    {
        return view('livewire.servicios.servicio-create');
    }

    public function create_servicio(){

       $this->emit('modal','crearServicioModal','show');
    }

    public function store_servicio(){
        $this->validate();

        $servicio=new Servicio();
        $servicio->nombre=$this->nombre;
        $servicio->costo=$this->costo;
        $servicio->save();

        $this->reset(['nombre','costo']);

        $this->emit('render');
        $this->emit('modal','crearServicioModal','hide');
    }
}

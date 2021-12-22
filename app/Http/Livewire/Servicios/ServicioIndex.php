<?php

namespace App\Http\Livewire\Servicios;

use Livewire\Component;
use App\Models\Servicio;

class ServicioIndex extends Component
{
    protected $listeners= ['render'];
    public $buscar, $columna='nombre',$orden='desc';

    public function render()
    {
        $servicios=Servicio::where('nombre','like','%'.$this->buscar.'%')//Buscar y ordenar
        ->orWhere('costo','like','%'.$this->buscar.'%')
        ->orderBy($this->columna,$this->orden)
        ->get();
        return view('livewire.servicios.servicio-index', compact('servicios'));
    }

    public function ordenar($columna){//Ordenar
        $this->columna=$columna;
        if($this->orden=='desc'){
            $this->orden='asc';
        }else{
            $this->orden='desc';
        }

    }

    public function edit_servicio(Servicio $servicio){
        $this->emit('modal','editServicioModal','show');
        $this->emit('servicio_edit',$servicio);
    }

    public function delete_servicio(Servicio $servicio){
        $this->emit('modal','deleteServicioModal','show');
        $this->emit('servicio_delete',$servicio);

    }

}

<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User;

use Livewire\Component;

class Usuarios extends Component
{
    public $usuario;
    protected $rules = [ //Crea una regla de validaciones. Al crearla permite sincronizar el valor de los campos en la vista edit
        'usuario.name' => 'required|max:45',
        'usuario.email' => 'required|numeric',
    ];
    public function render()
    {
        $usuarios=User::all();
        return view('livewire.usuarios.usuarios',compact('usuarios'));
    }

    public function editar_usuario(User $usuario){
        $this->usuario=$usuario;
        $this->emit('modal','editarUsuarioModal','show');//Envia un evento el cual es escuchado por js en la vista index de usuarios


    }
}

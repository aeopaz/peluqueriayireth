<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User;

use Livewire\Component;

class Usuarios extends Component
{
    public $usuario;
    protected $rules = [ //Crea una regla de validaciones. Al crearla permite sincronizar el valor de los campos en la vista edit
        'usuario.name' => 'required|max:45',
        'usuario.email'=>'email',
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

    public function update_usuario(){
        $this->validate();
        $usuario=User::find($this->usuario->id);
        $usuario->name=$this->usuario->name;
        $usuario->save();

        $this->emit('modal','editarUsuarioModal','hide');//Envía un evento y cierra el modal
    }

    public function eliminar_usuario(User $usuario){
        $this->usuario=$usuario;
        $this->emit('modal','eliminarUsuarioModal','show');//Envia un evento el cual es escuchado por js en la vista index de usuarios

    }
    public function destroy_usuario(){
        $usuario=User::find($this->usuario->id);
        $usuario->delete();
        $this->emit('modal','eliminarUsuarioModal','hide');
    }
}

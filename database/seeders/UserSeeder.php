<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Alvaro Eduardo Ocampo Paz',
            'email'=>'aeopaz@gmail.com',
            'avatar'=>'foto',
            'rol'=>'admin',
            'password'=>Hash::make('12345678'),
        ]);
        User::create([
            'name'=>'Andrés Miguel Cortes Zambrano',
            'email'=>'andres@andres.com',
            'avatar'=>'foto',
            'rol'=>'peluquero',
            'password'=>Hash::make('12345678'),
        ]);
        User::create([
            'name'=>'Invitado',
            'email'=>'invitado@invitado.com',
            'avatar'=>'foto',
            'rol'=>'invitado',
            'password'=>Hash::make('12345678'),
        ]);
    }
}

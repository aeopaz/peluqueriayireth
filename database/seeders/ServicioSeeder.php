<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            'nombre'=>'Corte Americano Hombre',
            'costo'=>10000,
        ]);
        Servicio::create([
            'nombre'=>'Corte Americano Niño',
            'costo'=>5000,
        ]);
        Servicio::create([
            'nombre'=>'Corte Dama',
            'costo'=>10000,
        ]);
        Servicio::create([
            'nombre'=>'Marca',
            'costo'=>3000,
        ]);
        Servicio::create([
            'nombre'=>'Depilación Cejas',
            'costo'=>7000,
        ]);
    }
}

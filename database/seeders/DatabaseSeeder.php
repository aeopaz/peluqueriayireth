<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Database\Factories\MensajeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ServicioSeeder::class);
        \App\Models\User::factory(99)->create();
        Mensaje::factory(50)->create();
    }
}

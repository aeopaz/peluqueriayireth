<?php

namespace Database\Factories;

use App\Models\Mensaje;
use Illuminate\Database\Eloquent\Factories\Factory;

class MensajeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mensaje::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       // $titulo =$this->faker->unique()->sentence();

        return [
            'titulo'=>$this->faker->text(10),
            'cuerpo'=>$this->faker->text(200),
            'cita'=>$this->faker->text(20)
        ];
    }
}

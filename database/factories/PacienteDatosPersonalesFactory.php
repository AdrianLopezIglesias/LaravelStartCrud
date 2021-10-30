<?php

namespace Database\Factories;

use App\Models\PacienteDatosPersonales;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteDatosPersonalesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PacienteDatosPersonales::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'dni' => $this->faker->randomDigitNotNull,
        'fecha_nacimiento' => $this->faker->word,
        'domicilio' => $this->faker->word,
        'telefono_principal' => $this->faker->word,
        'telefono_emergencias' => $this->faker->word,
        'genero' => $this->faker->word,
        'pacientes_id' => $this->faker->randomDigitNotNull
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cita::class;

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
        'inicio' => $this->faker->word,
        'fin' => $this->faker->word,
        'asignacion_id' => $this->faker->randomDigitNotNull,
        'tratamiento_id' => $this->faker->randomDigitNotNull,
        'paciente_id' => $this->faker->randomDigitNotNull
        ];
    }
}

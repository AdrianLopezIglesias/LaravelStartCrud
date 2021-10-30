<?php

namespace Database\Factories;

use App\Models\SalonHorario;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalonHorarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalonHorario::class;

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
        'salon_id' => $this->faker->randomDigitNotNull,
        'dia' => $this->faker->word,
        'hora_inicio' => $this->faker->randomDigitNotNull,
        'hora_fin' => $this->faker->randomDigitNotNull
        ];
    }
}

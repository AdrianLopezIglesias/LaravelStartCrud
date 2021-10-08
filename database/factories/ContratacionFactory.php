<?php

namespace Database\Factories;

use App\Models\Contratacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contratacion::class;

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
        'tratamiento_id' => $this->faker->randomDigitNotNull,
        'paciente_id' => $this->faker->randomDigitNotNull,
        'valor_pagado' => $this->faker->randomDigitNotNull
        ];
    }
}

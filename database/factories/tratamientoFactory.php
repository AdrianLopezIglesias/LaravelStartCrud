<?php

namespace Database\Factories;

use App\Models\Tratamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class TratamientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tratamiento::class;

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
        'nombre' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'descripcion_corta' => $this->faker->word,
        'area' => $this->faker->word,
        'sesiones' => $this->faker->word,
        'valor' => $this->faker->word,
        'activo' => $this->faker->word,
        'profesional' => $this->faker->word,
        'equipamiento' => $this->faker->word,
        'imagen_principal' => $this->faker->word
        ];
    }
}

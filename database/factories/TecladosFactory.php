<?php

namespace Database\Factories;

use App\Models\Teclados;
use Illuminate\Database\Eloquent\Factories\Factory;

class TecladosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teclados::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'valor' => $this->faker->randomDigitNotNull,
        'nombre' => $this->faker->word
        ];
    }
}

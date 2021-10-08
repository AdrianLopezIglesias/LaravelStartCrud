<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    $faker = Faker::create();


    DB::table('users')->insert([
      'name' => 'Admin',
      'email' => 'admin@admin.com',
      'password' => Hash::make('sistema_ace'),
    ]);
    foreach (range(1, 5) as $index) {
      DB::table('tratamientos')->insert([
        'nombre' => $faker->catchPhrase,
        'descripcion' => $faker->text($maxNbChars = 600),
        'descripcion_corta' => $faker->text($maxNbChars = 200),
        'sesiones' => $faker->numberBetween($min = 1, $max = 4)* $faker->numberBetween($min = 1, $max = 4),
        'valor' => $faker->numberBetween($min = 1, $max = 30)*(pow(10,($faker->numberBetween($min = 1, $max = 3)))),
        'duracion' => $faker->numberBetween($min = 6, $max = 24)*5,
        'activo' => $faker->boolean,
        'imagen_principal' => $faker->numberBetween($min = 1, $max = 5) . ".jpg",       
      ]);
    }
    foreach (range(1, 50) as $index) {
      DB::table('pacientes')->insert([
        'nombre' => $faker->name . " " . $faker->lastName(),
      ]);
    }
  }
}

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


Route::middleware(['auth'])->group(function () {
    Route::get('/cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:cache');
        Artisan::call('route:clear');
        return "Cleared!";
    });
    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');


});

// Route::get('/{any_path?}', [
//     HomeController::class, 'index'
// ])->name('home');
Route::get('/', function () {
return redirect('/tratamientos');
})->name('home');






Route::resource('tratamientos', App\Http\Controllers\TratamientoController::class);


Route::post('contratacions/render', 'App\Http\Controllers\ContratacionController@render');
Route::resource('contratacions', App\Http\Controllers\ContratacionController::class);
    

Route::resource('clientes', App\Http\Controllers\ClienteController::class);


Route::resource('citas', App\Http\Controllers\CitaController::class);


Route::resource('pacientes', App\Http\Controllers\PacientesController::class);

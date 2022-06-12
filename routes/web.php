<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['auth:sanctum'])->group(function(){
	Route::get('/', [

		HomeController::class, 'index'
	]);
});
// Route::get('/restart', function () {
// 	Artisan::call('migrate:fresh --seed');
// 	return "database restarted";
// });

// Route::middleware(['auth'])->group(function () {
// 	Route::get('/cache', function () {
// 		Artisan::call('cache:clear');
// 		Artisan::call('config:cache');
// 		Artisan::call('view:clear');
// 		Artisan::call('route:cache');
// 		Artisan::call('route:clear');
// 		return "Cleared!";
// 	});
// 	Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

// 	Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

// 	Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

// 	Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

// 	Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

// 	Route::post(
// 		'generator_builder/generate-from-file',
// 		'\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
// 	)->name('io_generator_builder_generate_from_file');
// });

Auth::routes([
	'register' => false,   // Registration Routes...
	'reset'    => false,   // Password Reset Routes...
	'verify'   => false,   // Email Verification Routes...
]);





// Route::get('/{uri}', [
// 	HomeController::class, 'index'
// ])->where('uri', '.*');




// // Route::get('/{any_path?}', [
// //     HomeController::class, 'index'
// // ])->name('home');








// Route::resource('tratamientos', App\Http\Controllers\TratamientoController::class);


// Route::post('paciente/transmutar', 'App\Http\Controllers\PacientesController@transmutar');

// Route::post('contratacion/ver/{vista}', 'App\Http\Controllers\ContratacionController@ver');

// Route::post('tratamiento/transmutar/{id}/{vista}', 'App\Http\Controllers\TratamientoController@transmutar');
// Route::post('tratamiento/ver/{vista}', 'App\Http\Controllers\TratamientoController@ver');

// Route::post('paciente/render', 'App\Http\Controllers\PacientesController@render');
// Route::post('salon/render', 'App\Http\Controllers\SalonController@render');
// Route::post('profesional/render', 'App\Http\Controllers\ProfesionalController@render');
// Route::post('contratacions/render', 'App\Http\Controllers\ContratacionController@render');
// Route::post('profesionalTratamientos/render', 'App\Http\Controllers\ProfesionalTratamientoController@render');
// Route::post('profesionalHorarios/render', 'App\Http\Controllers\ProfesionalHorarioController@render');
// Route::resource('contratacions', App\Http\Controllers\ContratacionController::class);

// Route::resource('pacientes', App\Http\Controllers\PacientesController::class);

// Route::resource('clientes', App\Http\Controllers\ClienteController::class);


// Route::resource('citas', App\Http\Controllers\CitaController::class);




// Route::resource('profesionals', App\Http\Controllers\ProfesionalController::class);


// Route::resource('salons', App\Http\Controllers\SalonController::class);


// Route::resource('salonHorarios', App\Http\Controllers\SalonHorarioController::class);


// Route::resource('profesionalHorarios', App\Http\Controllers\ProfesionalHorarioController::class);


// Route::resource('instalacions', App\Http\Controllers\InstalacionController::class);


// Route::resource('profesionalTratamientos', App\Http\Controllers\ProfesionalTratamientoController::class);


// Route::resource('pacienteDatosPersonales', App\Http\Controllers\PacienteDatosPersonalesController::class);


// Route::resource('areas', App\Http\Controllers\areaController::class);


// Route::resource('pensamientos', App\Http\Controllers\PensamientoController::class);

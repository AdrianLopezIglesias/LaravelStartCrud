<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth'])->group(
	function () {

		Route::middleware('auth:api')->get('/user', function (Request $request) {
			return $request->user();
		});
	}
);

Route::middleware(['auth:sanctum'])->group(function(){

	Route::resource('tratamientos', tratamientoAPIController::class);

	Route::post('citas/disponibilidad', 'CitaAPIController@disponibilidad');

	Route::resource('contratacions', ContratacionAPIController::class);


	Route::resource('clientes', ClienteAPIController::class);


	Route::resource('citas', CitaAPIController::class);


	Route::resource('pacientes', PacientesAPIController::class);


	Route::resource('profesionals', App\Http\Controllers\API\ProfesionalAPIController::class);


	Route::resource('salons', App\Http\Controllers\API\SalonAPIController::class);


	Route::resource('salon_horarios', App\Http\Controllers\API\SalonHorarioAPIController::class);


	Route::resource('profesional_horarios', App\Http\Controllers\API\ProfesionalHorarioAPIController::class);


	Route::resource('instalacions', App\Http\Controllers\API\InstalacionAPIController::class);


	Route::resource('profesional_tratamientos', App\Http\Controllers\API\ProfesionalTratamientoAPIController::class);


	Route::resource('paciente_datos_personales', App\Http\Controllers\API\PacienteDatosPersonalesAPIController::class);


	Route::resource('areas', areaAPIController::class);


	Route::resource('pensamientos', PensamientoAPIController::class);
	Route::post('pensamientos/edit-selected', 'PensamientoAPIController@editSelected');
	Route::post('pensamientos/delete', 'PensamientoAPIController@destroy');
});
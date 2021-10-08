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


Route::resource('tratamientos', tratamientoAPIController::class);

Route::post('citas/disponibilidad', 'CitaAPIController@disponibilidad');

Route::resource('contratacions', ContratacionAPIController::class);


Route::resource('clientes', ClienteAPIController::class);


Route::resource('citas', CitaAPIController::class);


Route::resource('pacientes', PacientesAPIController::class);

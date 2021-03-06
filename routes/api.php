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


Route::resource('teclados', TecladosAPIController::class);


Route::resource('mice', MouseAPIController::class);


Route::resource('i_m_e_i_s', App\Http\Controllers\API\IMEIAPIController::class);


Route::resource('projects', ProjectAPIController::class);
  }
);

Route::resource('mensajes', MensajeAPIController::class)->only([
  'store'
]);



Route::group(['prefix' => 'adm'], function () {
    Route::resource('textos', Adm\TextoAPIController::class);
    Route::resource('tecnologias', Adm\TecnologiaAPIController::class);
});




Route::group(['prefix' => 'adm'], function () {
    Route::resource('projectimages', App\Http\Controllers\API\Adm\ProjectimageAPIController::class);
});

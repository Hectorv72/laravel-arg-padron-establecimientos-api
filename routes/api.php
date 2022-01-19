<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PadronEstablecimientosController;
use App\Http\Controllers\DatosExtraController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/establecimientos', [PadronEstablecimientosController::class, 'index'] );
Route::get('/establecimientos/{id}', [PadronEstablecimientosController::class, 'show'] );
Route::get('/sectores', [DatosExtraController::class, 'listSectores'] );
Route::get('/jurisdicciones', [DatosExtraController::class, 'listJurisdicciones'] );
Route::get('/departamentos/{jurisdiccion}', [DatosExtraController::class, 'listDepartamentos'] );
Route::get('/localidades/{departamento}', [DatosExtraController::class, 'listLocalidades'] );

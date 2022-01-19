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

Route::get('/establecimientos',             [PadronEstablecimientosController::class, 'index'] );
Route::get('/establecimiento/{id}',         [PadronEstablecimientosController::class, 'show'] );
Route::get('/sectores',                     [DatosExtraController::class, 'listSectores'] );
Route::get('/ambitos',                      [DatosExtraController::class, 'listAmbitos'] );
Route::get('/modalidades',                  [DatosExtraController::class, 'listModalidades'] );
Route::get('/jurisdicciones',               [DatosExtraController::class, 'listJurisdicciones'] );
Route::get('/departamentos',                [DatosExtraController::class, 'indexDepartamentos'] );
Route::get('/departamentos/{jurisdiccion}', [DatosExtraController::class, 'listDepartamentos'] );
Route::get('/departamento/{id}',            [DatosExtraController::class, 'showDepartamento'] );
Route::get('/localidades',                  [DatosExtraController::class, 'indexLocalidades'] );
Route::get('/localidades/{departamento}',   [DatosExtraController::class, 'listLocalidades'] );
Route::get('/localidad/{id}',               [DatosExtraController::class, 'showLocalidad'] );

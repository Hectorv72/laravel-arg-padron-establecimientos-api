<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PadronEstablecimientosModel;
use Illuminate\Support\Facades\DB;

class DatosExtraController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function listJurisdicciones()
  {
    // return response()->json(PadronEstablecimientosModel::select('jurisdiccion')->groupBy('jurisdiccion')->orderBy('jurisdiccion')->get(),400);
    return response()->json(PadronEstablecimientosModel::select('jurisdiccion')->groupBy('jurisdiccion')->orderBy('jurisdiccion')->get(),200);
  }

  public function listDepartamentos($jurisdiccion)
  {
    $jurisdiccion = mb_strtolower(urldecode($jurisdiccion), 'UTF-8');

    // return new DepartamentoCollection(PadronEstablecimientosModel::select('departamento','cod_departamento')->where(DB::raw('lower(jurisdiccion)'),$jurisdiccion)->groupBy('departamento','cod_departamento')->orderBy('departamento')->get());
    return response()->json(PadronEstablecimientosModel::select('departamento','cod_departamento AS codigo')->where(DB::raw('lower(jurisdiccion)'),$jurisdiccion)->groupBy('departamento','cod_departamento')->orderBy('departamento')->get(),200);
  }

  public function listLocalidades($departamento)
  {
    $departamento = mb_strtolower(urldecode($departamento), 'UTF-8');

    return response()->json(PadronEstablecimientosModel::select('localidad','cod_localidad AS codigo')->where(DB::raw('lower(departamento)'),$departamento)->groupBy('localidad','cod_localidad')->orderBy('localidad')->get(),200);
    // return new LocalidadCollection(PadronEstablecimientosModel::select('localidad','cod_localidad')->where(DB::raw('lower(departamento)'),$departamento)->groupBy('localidad','cod_localidad')->orderBy('localidad')->get());
  }

  public function listSectores()
  {
    return response()->json(PadronEstablecimientosModel::select('sector')->groupBy('sector')->orderBy('sector')->get(),200);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }
}

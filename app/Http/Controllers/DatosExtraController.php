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
  // AYUDAS
  public function indexDepartamentos(Request $request)
  {
    $jurisdicciones = PadronEstablecimientosModel::select('jurisdiccion')
      ->groupBy('jurisdiccion')
      ->orderBy('jurisdiccion')
      ->get()
      ->toArray();

    $array = array_map(function($registro){
      return $registro['jurisdiccion'];
    },$jurisdicciones);

    return response()->json([
      'mensaje' => 'Para obtener los departamentos utilice la url y reemplace {jurisdiccion} por alguna de ellas',
      'url' => $request->getHttpHost().'/api/departamentos/{jurisdiccion}',
      'jurisdicciones' => $array
    ],200);
  }

  public function indexLocalidades(Request $request)
  {
    $departamentos = PadronEstablecimientosModel::select('departamento')
      ->groupBy('departamento')
      ->orderBy('departamento')
      ->get()
      ->toArray();

    $array = array_map(function($registro){
      return $registro['departamento'];
    },$departamentos);

    return response()->json([
      'mensaje' => 'Para obtener las localidades utilice la url y reemplace {departamento} por alguna de ellas',
      'url' => $request->getHttpHost().'/api/localidades/{departamento}',
      'departamentos' => $array
    ],200);
  }

  // LISTA DE DATOS

  public function listJurisdicciones()
  {
    $jurisdicciones = PadronEstablecimientosModel::select('jurisdiccion')
      ->groupBy('jurisdiccion')
      ->orderBy('jurisdiccion')
      ->get();
    return response()->json($jurisdicciones,200);
  }

  public function listDepartamentos($jurisdiccion)
  {
    $jurisdiccion  = mb_strtolower(urldecode($jurisdiccion), 'UTF-8');
    $departamentos = PadronEstablecimientosModel::select('departamento','cod_departamento AS codigo')
      ->where(DB::raw('lower(jurisdiccion)'),$jurisdiccion)
      ->groupBy('departamento','cod_departamento')
      ->orderBy('departamento')
      ->get();
    return response()->json($departamentos,200);
  }

  public function listLocalidades($departamento)
  {
    $departamento = mb_strtolower(urldecode($departamento), 'UTF-8');
    $localidades  = PadronEstablecimientosModel::select('localidad','cod_localidad AS codigo')
      ->where(DB::raw('lower(departamento)'),$departamento)
      ->groupBy('localidad','cod_localidad')
      ->orderBy('localidad')
      ->get();
    return response()->json($localidades,200);
  }

  public function listSectores()
  {
    $sectores = PadronEstablecimientosModel::select('sector')
      ->groupBy('sector')
      ->orderBy('sector')
      ->get();
    return response()->json($sectores,200);
  }

  public function listAmbitos()
  {
    $ambitos = PadronEstablecimientosModel::select('ambito')
      ->groupBy('ambito')
      ->orderBy('ambito')
      ->get();
    return response()->json($ambitos,200);
  }

  public function listModalidades()
  {
    $modalidades = [
      'educacion_comun',
      'educacion_especial',
      'educacion_jovenes_y_adultos',
      'educacion_artistica',
      'educacion_hospitalaria_domiciliaria',
      'educacion_intercultural_bilingue',
      'educacion_contexto_encierro',
    ];

    $array = array_map(function($key){
      return ['modalidad' => $key];
    },$modalidades);
    // return print_r(array_keys($modalidades));
    return response()->json($array,200);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function showDepartamento($id)
  {
    $departamento = PadronEstablecimientosModel::select('departamento','jurisdiccion')
      ->where('cod_departamento',$id)
      ->groupBy('departamento','jurisdiccion')
      ->get();
    return response()->json($departamento[0],200);
  }

  public function showLocalidad($id)
  {
    $localidad = PadronEstablecimientosModel::select('localidad','jurisdiccion','departamento','cod_departamento AS codigo_departamento')
      ->where('cod_localidad',$id)
      ->groupBy('localidad','jurisdiccion','departamento','cod_departamento')
      ->get();
    return response()->json($localidad[0],200);
  }
}

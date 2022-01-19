<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PadronEstablecimientosModel;
use App\Http\Resources\PadronEstablecimientosResource;
use App\Http\Resources\PadronEstablecimientosCollection;
use Illuminate\Support\Facades\DB;
class PadronEstablecimientosController extends Controller
{

  private function search($model,$request){

    $data = $model;
    $condition = [];

    // GENERAL

    if($request->query('cue') !== null){
      array_push($condition,['cue',$request->query('cue')]);
    }

    if($request->query('cueanexo') !== null){
      array_push($condition,['cueanexo',$request->query('cueanexo')]);
    }

    if($request->query('nombre') !== null){
      $nombre = mb_strtolower((urldecode(($request->query('nombre')))), 'UTF-8');
      array_push($condition,[DB::raw('lower(nombre)'),'LIKE','%'.$nombre.'%' ]);
    }

    // LOCALIZACION

    if($request->query('jurisdiccion') !== null){
      $jurisdiccion = mb_strtolower((urldecode(($request->query('jurisdiccion')))), 'UTF-8');
      array_push($condition,[DB::raw('lower(jurisdiccion)'),$jurisdiccion]);
    }

    if($request->query('sector') !== null){
      array_push($condition,[DB::raw('lower(sector)'),strtolower($request->query('sector'))]);
    }

    if($request->query('ambito') !== null){
      array_push($condition,[DB::raw('lower(ambito)'),strtolower($request->query('ambito'))]);
    }

    if($request->query('departamento') !== null){
      $departamento = mb_strtolower((urldecode(($request->query('departamento')))), 'UTF-8');
      array_push($condition,[DB::raw('lower(departamento)'),$departamento]);
    }

    if($request->query('cod_departamento') !== null){
      array_push($condition,['cod_departamento',$request->query('cod_departamento')]);
    }

    if($request->query('localidad') !== null){
      $localidad = mb_strtolower((urldecode(($request->query('localidad')))), 'UTF-8');
      array_push($condition,[DB::raw('lower(localidad)'),$localidad]);
    }

    if($request->query('cod_localidad') !== null){
      array_push($condition,['cod_localidad',$request->query('cod_localidad')]);
    }

    if($request->query('domicilio') !== null){
      $domicilio = mb_strtolower((urldecode(($request->query('domicilio')))), 'UTF-8');
      array_push($condition,[DB::raw('lower(domicilio)'),'LIKE','%'.$domicilio.'%' ]);
    }

    if($request->query('cod_postal') !== null){
      array_push($condition,[DB::raw('lower(cod_postal)'),strtolower($request->query('cod_postal'))]);
    }

    // MODALIDADES

    if($request->query('educacion_comun') == 1){
      array_push($condition,['ed_comun',1]);
    }

    if($request->query('educacion_especial') == 1){
      array_push($condition,['ed_especial',1]);
    }

    if($request->query('educacion_jovenes_y_adultos') == 1){
      array_push($condition,['ed_jovenes_adultos',1]);
    }

    if($request->query('educacion_artistica') == 1){
      array_push($condition,['ed_artistica',1]);
    }

    if($request->query('educacion_hospitalaria_domiciliaria') == 1){
      array_push($condition,['ed_hospitalaria_domiciliaria',1]);
    }

    if($request->query('educacion_intercultural_bilingue') == 1){
      array_push($condition,['ed_intercultural_bilingue',1]);
    }

    if($request->query('educacion_contexto_encierro') == 1){
      array_push($condition,['ed_contexto_encierro',1]);
    }


    $data = $data->where($condition);

    // LIMIT Y OFFSET

    if($request->query('offset') !== null){
      $offset = intval($request->query('offset'));
      $data = $data->offset($offset);
    }

    if($request->query('limit') !== null){
      $limit = intval($request->query('limit'));
      // if($limit <= 300){
      //   $data = $data->limit($limit);
      // }
      $data = $data->limit($limit);
    } else {
      $data = $data->limit(300);
    }

    $data = $data->get();
      return $data;

    try {
      $data = $data->get();
      return $data;
    } catch (\Throwable $th) {
      return [];
      //throw $th;
    }

  }

    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $data = $this->search(new PadronEstablecimientosModel,$request);
    return new PadronEstablecimientosCollection($data);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return new PadronEstablecimientosResource(PadronEstablecimientosModel::find($id));
  }
}

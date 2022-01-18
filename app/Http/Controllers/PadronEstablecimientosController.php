<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PadronEstablecimientosModel;
use App\Http\Resources\PadronEstablecimientosResource;
use App\Http\Resources\PadronEstablecimientosCollection;

class PadronEstablecimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return response()->json(PadronEstablecimientosModel::take(100),200);
        // return response()->json(PadronEstablecimientosModel::find(1),200);
        // $data = PadronEstablecimientosModel::take(100)->simplePaginate(100);
        $data = PadronEstablecimientosModel::limit(100)->get();
        return new PadronEstablecimientosCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return response()->json(PadronEstablecimientosModel::find($id),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

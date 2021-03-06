<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetalleSalida;
use Illuminate\Http\Request;

class DetalleSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'CANTIDAD' => 'required',
            'ID_ESTADO' => 'required',
            'ID_PRODUCTO' => 'required',
            'ID_SALIDA' => 'required',
        ]);
        $input = $request->all();
        $detalle = DetalleSalida::create($input);
        return redirect()->route('salidas.show', [$detalle->ID_SALIDA])->with('success', 'Detalle de Salida Creada Exitosamente!!');
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
        $detalle = DetalleSalida::find($id);
        $salidaID = $detalle->ID_SALIDA;
        $detalle->delete();
        return redirect()->route('salidas.show', $salidaID)->with('success', 'Detalle de Salida Eliminado Exitosamente!!');
    }
}

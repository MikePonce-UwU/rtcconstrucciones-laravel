<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetalleEntrada;
use Illuminate\Http\Request;

class DetalleEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($id)
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
            'ESTADO_DESC' => 'required',
            'CANTIDAD' => 'required',
            'ID_PRODUCTO' => 'required',
            'ID_ENTRADA' => 'required',
        ]);
        $input = $request->all();
        $detalle = DetalleEntrada::create($input);
        return redirect()->route('entradas.show', [$detalle->ID_ENTRADA])->with('success', 'Detalle de entrada registrada satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $detalle = DetalleEntrada::find($id);
        $entradaID = $detalle->ID_ENTRADA;
        $detalle->delete();
        return redirect()->route('entradas.show', $entradaID)->with('success', 'Detalle de entrada eliminada!');
    }
}

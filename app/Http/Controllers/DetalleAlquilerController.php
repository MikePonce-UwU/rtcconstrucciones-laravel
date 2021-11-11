<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alquiler;
use App\Models\DetalleAlquiler;
use Illuminate\Http\Request;

class DetalleAlquilerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:alquiler-list|alquiler-create|alquiler-edit|alquiler-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:alquiler-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:alquiler-edit', ['only' => ['edit', 'update']]);
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
            'NOMBRE' => 'required',
            'CANTIDAD' => 'required',
            'HORAS_ALQUILER' => 'required',
            'HORAS_EXCEDIDAS' => 'required',
            'PAGO_HORA' => 'required',
            'PAGO_EXCEDIDO' => 'required',
            'SUBTOTAL' => 'required',
            'ID_BODEGA_PROYECTO' => 'required',
            'ID_ALQUILER' => 'required',
        ]);
        $input = $request->all();
        DetalleAlquiler::create($input);
        return redirect()->route('alquileres.show', $input['ID_ALQUILER'])->with('success', 'Entrega de alquiler registrada satisfactoriamente!!');
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
        $this->validate($request, [
            'NOMBRE' => 'required',
            'CANTIDAD' => 'required',
            'HORAS_ALQUILER' => 'required',
            'HORAS_EXCEDIDAS' => 'required',
            'PAGO_HORA' => 'required',
            'PAGO_EXCEDIDO' => 'required',
            'SUBTOTAL' => 'required',
            'ID_BODEGA_PROYECTO' => 'required',
            'ID_ALQUILER' => 'required',
        ]);
        $input = $request->all();
        $entrega = DetalleAlquiler::find($id);
        $entrega->update($input);
        return redirect()->route('detalle-alquileres.index')->with('success', 'Entrega de alquiler modificada satisfactoriamente!!');
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
        $entrega = DetalleAlquiler::find($id);
        $detalleID = $entrega->alquiler->ID_ALQUILER;
        $entrega->delete();
        return redirect()->route('alquileres.show', $detalleID)->with('success', 'Entrega de alquiler eliminada satisfactoriamente!!');
    }
}

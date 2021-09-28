<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Bodega;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:alquiler-list|alquiler-create|alquiler-edit|alquiler-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:alquiler-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:alquiler-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bodega-list', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alquileres = Alquiler::all();
        return view('alquileres.index', compact('alquileres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bodegas = Bodega::pluck('NOMBRE_BODEGA', 'ID_BODEGA_PROYECTO');
        return view('alquileres.create', compact('bodegas'));
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
            'NOMBRE' => 'required|max:50',
            'CANTIDAD' => 'required|numeric',
            'FECHA_ALQUILER' => 'required|date',
            'HORAS_ALQUILER' => 'required|numeric',
            'PAGO_HORA' => 'required',
        ]);
        $input = $request->all();
        Alquiler::create($input);
        return redirect()->route('alquileres.index')->with('success', 'Alquiler registrado exitosamente!!');
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
        $alquiler = Alquiler::find($id);
        return view('alquileres.show', compact('alquiler'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alquiler = Alquiler::find($id);
        $bodegas = Bodega::pluck('NOMBRE_BODEGA', 'ID_BODEGA_PROYECTO');
        return view('alquileres.edit', compact('alquiler', 'bodegas'));
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
            'NOMBRE' => 'required|max:50',
            'CANTIDAD' => 'required|numeric',
            'FECHA_ALQUILER' => 'required|date',
            'HORAS_ALQUILER' => 'required|numeric',
            'PAGO_HORA' => 'required',
        ]);
        $input = $request->all();
        $alquiler = Alquiler::find($id);
        $alquiler->update($input);
        return redirect()->route('alquileres.index')->with('success', 'Alquiler modificado exitosamente!!');
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
        $alquiler = Alquiler::find($id)->delete();
        return redirect()->route('alquileres.index')->with('success', 'Alquiler eliminado exitosamente!!');
    }
}

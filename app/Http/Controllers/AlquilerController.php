<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Bodega;
use App\Models\EntregaAlquiler;
use App\Models\Estado;
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
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO');
        return view('alquileres.create', compact('estados'));
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
            'NOMBRE_EMPRESA' => 'required|max:75',
            'DIRECCION' => 'required|max:256',
            'TELEFONO' => 'required',
            'FECHA_ALQUILER' => 'required|date',
            'TOTAL_PAGAR' => 'required',
            'ID_ESTADO' => 'required',
        ]);
        $input = $request->all();
        Alquiler::create($input);
        return redirect()->route('alquileres.index')->with('success', 'Alquiler Creado Exitosamente!!');
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
        $bodegas = Bodega::pluck('NOMBRE_BODEGA', 'ID_BODEGA_PROYECTO');
        return view('alquileres.show', compact('alquiler', 'bodegas'));
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
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO');
        return view('alquileres.edit', compact('alquiler', 'estados'));
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
            'NOMBRE_EMPRESA' => 'required|max:75',
            'DIRECCION' => 'required|max:256',
            'TELEFONO' => 'required',
            'FECHA_ALQUILER' => 'required|date',
            'TOTAL_PAGAR' => 'required',
            'ID_ESTADO' => 'required',
        ]);
        $input = $request->all();
        $alquiler = Alquiler::find($id);
        $alquiler->update($input);
        return redirect()->route('alquileres.index')->with('success', 'Alquiler Actualizado Exitosamente!!');
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
        return redirect()->route('alquileres.index')->with('success', 'Alquiler Eliminado Exitosamente!!');
    }
}

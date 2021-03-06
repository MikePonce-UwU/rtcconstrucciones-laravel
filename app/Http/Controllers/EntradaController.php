<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bodega;
use App\Models\DetalleEntrada;
use App\Models\Entrada;
use App\Models\Estado;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntradaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:entrada-list|entrada-create|entrada-edit|entrada-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:entrada-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:entrada-edit', ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entradas = Entrada::all();
        return view('entradas.index', compact('entradas'));
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
        return view('entradas.create', compact('bodegas'));
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
            'DESCRIPCION_ENTRADA' => 'required',
            'FECHA_ENTRADA' => 'required|date',
            'ID_BODEGA_PROYECTO' => 'required',
            'ID_USUARIO' => 'required',
        ]);
        $input = $request->all();
        $entrada = Entrada::create($input);
        return redirect()->route('entradas.show', [$entrada->ID_ENTRADA])->with('success', 'Entrada Creada Exitosamente!!');
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
        $entrada = Entrada::find($id);
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO');
        return view('entradas.show', compact(
            'entrada',
            'estados'
        ));
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
        $entrada = Entrada::find($id);
        $bodegas = Bodega::pluck('NOMBRE_BODEGA', 'ID_BODEGA_PROYECTO');
        return view('entradas.edit', compact('entrada', 'bodegas'));
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
            'DESCRIPCION_ENTRADA' => 'required',
            'FECHA_ENTRADA' => 'required|date',
            'ID_BODEGA_PROYECTO' => 'required',
            'ID_USUARIO' => 'required',
        ]);
        $input = $request->all();
        $entrada = Entrada::find($id);
        $entrada->update($input);
        return redirect()->route('entradas.show', [$entrada->ID_ENTRADA])->with('success', 'Entrada Actualizada Exitosamente!!');
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
        $entrada = Entrada::find($id)->delete();
        return redirect()->route('entradas.index')->with('success', 'Entrada Eliminada Exitosamente!!');
    }
}

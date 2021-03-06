<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Estado;
use App\Models\Und_Medida;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:compra-list|compra-create|compra-edit|compra-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:compra-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:compra-edit', ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $compras = Compra::all();
        return view('compras.index', compact('compras'));
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
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO');
        return view('compras.create', compact('bodegas', 'estados'));
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
            'DESCRIPCION' => 'required',
            'FECHA_COMPRA' => 'required|date',
            'ID_BODEGA_PROYECTO' => 'required',
        ]);
        $input = $request->all();

        $compra = Compra::create($input);
        $compraID = $compra->ID_COMPRA;
        return redirect()->route('compras.show', [$compraID])->with('success', 'Compra Creada Exitosamente!!');
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
        $compra = Compra::find($id);
        $categorias = Categoria::pluck('NOMBRE', 'ID_CATEGORIA');
        $und_medida = Und_Medida::pluck('ABREVIACION', 'ID_UND_MEDIDA');
        return view('compras.show', compact('compra', 'und_medida', 'categorias'));
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
        $compra = Compra::find($id);
        $bodegas = Bodega::pluck('NOMBRE_BODEGA', 'ID_BODEGA_PROYECTO');
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO');
        return view('compras.edit', compact('compra',  'bodegas', 'estados'));
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
            'DESCRIPCION' => 'required',
            'FECHA_COMPRA' => 'required|date',
            'ID_BODEGA_PROYECTO' => 'required',
        ]);
        $input = $request->all();
        $compra = Compra::find($id);
        $compra->update($input);
        return redirect()->route('compras.index')->with('success', 'Compra Actualizado Exitosamente!!');
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
        $compra = Compra::find($id)->delete();
        return redirect()->route('compras.index')->with('success', 'Compra Eliminado Exitosamente!!');
    }
}

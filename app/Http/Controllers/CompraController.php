<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Compra;
use App\Models\DetalleCompra;
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
        return view('compras.create', compact('bodegas'));
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
            'GASTO_TOTAL' => '',
            'ID_BODEGA_PROYECTO' => 'required',
        ]);
        $input = $request->all();
        $compra = Compra::create($input);
        $compraID = $compra->ID_COMPRA;
        return redirect()->route('detalle-compras.create', [$compraID])->with('success', 'Compra realizada satisfactoriamente!');
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
        $bodega = Bodega::find($compra->ID_BODEGA_PROYECTO);
        $detalles = DetalleCompra::where('ID_COMPRA', $id)->get();
        return view('compras.show', compact('compra', 'bodega', 'detalles', 'categorias'));
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
        $detalles = DetalleCompra::all()->where('ID_COMPRA', $compra->ID_COMPRA);
        return view('compras.edit', compact('compra', 'bodegas', 'detalles'));
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
            'GASTO_TOTAL' => 'required',
            'ID_BODEGA_PROYECTO' => 'required',
        ]);
        $input = $request->all();
        $compra = Compra::find($id);
        $compra->update($input);
        return redirect()->route('entrega-alquileres.index')->with('success', 'Compra modificada exitosamente!!');
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
        return redirect()->route('compras.index')->with('success', 'Compra eliminada exitosamente!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Compra;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
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
    public function crear($id)
    {
        //
        $compra = Compra::find($id);
        $categorias = Categoria::pluck('NOMBRE', 'ID_CATEGORIA');
        return view('compras.detalle-compras.create', compact('compra', 'categorias'));
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
            'ID_COMPRA' => 'required',
            'NOMBRE' => 'required',
            'CANTIDAD' => 'required',
            'PRECIO' => 'required',
            'ID_CATEGORIA' => 'required',
        ]);
        $input = $request->all();
        $detalle = DetalleCompra::create($input);
        return redirect()->route('compras.show', $detalle->ID_COMPRA)->with('success', 'Detalles de compra registradas satisfactoriamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     public function show($id)
     {
         //
        }
     */

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
        $detalle = DetalleCompra::find($id);
        $compraID = $detalle->ID_COMPRA;
        $detalle->delete();
        return redirect()->route('compras.show', $compraID)->with('success', 'Detalle de compra eliminada satisfactoriamente!!');
    }
}

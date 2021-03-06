<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Producto;
use App\Models\Und_Medida;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:producto-list|producto-create|producto-edit', ['only' => ['index', 'store']]);
        $this->middleware('permission:producto-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:producto-edit', ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidadMedida = Und_Medida::pluck('ABREVIACION', 'ID_UND_MEDIDA');
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO');
        $categorias = Categoria::pluck('NOMBRE', 'ID_CATEGORIA');
        return view('productos.create', compact('estados', 'categorias', 'unidadMedida'));
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
            'CANTIDAD' => 'required|numeric',
            'ID_ESTADO' => 'required',
            'ID_CATEGORIA' => 'required',
            'ID_UND_MEDIDA' => 'required',
        ]);
        $input = $request->all();
        Producto::create($input);
        return redirect()->route('productos.index')->with('succcess', 'Producto Creado Exitosamente!!');
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
        $producto = Producto::find($id);
        return view('productos.show', compact('producto'));
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
        $unidadMedida = Und_Medida::pluck('ABREVIACION', 'ID_UND_MEDIDA');
        $producto = Producto::find($id);
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO');
        $categorias = Categoria::pluck('NOMBRE', 'ID_CATEGORIA');
        return view('productos.edit', compact('producto', 'estados', 'categorias', 'unidadMedida'));
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
            'CANTIDAD' => 'required|numeric',
            'ID_ESTADO' => 'required',
            'ID_CATEGORIA' => 'required',
            'ID_UND_MEDIDA' => 'required',
        ]);
        $input = $request->all();
        $producto = Producto::find($id);
        $producto->update($input);
        return redirect()->route('productos.index')->with('success', 'Producto Actualizado Exitosamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::find($id)->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto Eliminado Exitosamente!!');
    }
}

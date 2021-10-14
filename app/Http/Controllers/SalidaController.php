<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bodega;
use App\Models\DetalleSalida;
use App\Models\Producto;
use App\Models\Salida;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salidas = Salida::all();
        return view('salidas.index', compact('salidas'));
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
        return view('salidas.create', compact('bodegas'));
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
            'DESCRIPCION_SALIDA' => 'required',
            'FECHA_SALIDA' => 'required|date',
            'ID_BODEGA_PROYECTO' => 'required',
            'ID_USUARIO' => 'required',
        ]);
        $input = $request->all();
        $salida = Salida::create($input);
        return redirect()->route('salidas.show', $salida->ID_SALIDA)->with('success', 'Salida registrada satisfactoriamente');
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
        $productos = Producto::pluck('NOMBRE', 'ID_PRODUCTO');
        $salida = Salida::find($id);
        $bodegas = Bodega::pluck('NOMBRE_BODEGA', 'ID_BODEGA_PROYECTO');
        $bodega = bodega::find($salida->ID_BODEGA_PROYECTO);
        $usuario = null;
        $detalles = DetalleSalida::where('ID_SALIDA', $id)->get();
        $producto = Producto::all();
        if ($salida->ID_USUARIO === Auth::user()->id) {
            $usuario = Auth::user();
        } else {
            $usuario = User::find($salida->ID_USUARIO);
        }
        return view('salidas.show', compact('salida', 'detalles', 'bodegas', 'bodega', 'productos', 'producto', 'usuario'));
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
        $salida = Salida::find($id);
        $bodegas = Bodega::pluck('NOMBRE_BODEGA', 'ID_BODEGA_PROYECTO');
        return view('salidas.edit', compact('salida', 'bodegas'));
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
            'DESCRIPCION_SALIDA' => 'required',
            'FECHA_SALIDA' => 'required|date',
            'ID_BODEGA_PROYECTO' => 'required',
            'ID_USUARIO' => 'required',
        ]);
        $input = $request->all();
        $salida = Salida::find($id);
        $salida->update($input);
        return redirect()->route('salidas.show', [$salida->ID_SALIDA])->with('success', 'Salida registrada satisfactoriamente');
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
        $salida = Salida::find($id)->delete();
        return redirect()->route('salidas.index')->with('success', 'Salida eliminada!');
    }
}
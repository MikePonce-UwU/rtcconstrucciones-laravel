<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Estado;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BodegaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:bodega-list|bodega-create|bodega-edit|bodega-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:bodega-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:bodega-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:proyecto-list', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $bodegas = Bodega::where('ID_ESTADO', 1)->get();
        return view('bodegas.index', compact('bodegas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proyectos = Proyecto::pluck('NOMBRE', 'ID_PROYECTO')->all();
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO')->all();
        return view('bodegas.create', compact('proyectos', 'estados'));
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
            'NOMBRE_BODEGA' => 'required|max:50',
            'DIRECCION' => 'required|max:50',
            'FECHA_CREACION' => 'required|date',
            'FECHA_CIERRE' => 'required|date|after:FECHA_CREACION',
            'CAPACIDAD' => 'required|max:50',
            'CAPACIDAD_DISPONIBLE' => 'required|max:50',
            'ID_PROYECTO' => 'required',
            'ID_ESTADO' => 'required',
        ]);
        $input = $request->all();
        $input['ID_USUARIO'] = Auth::id();
        Bodega::create($input);

        return redirect()->route('bodegas.index')->with('success', 'Bodega creada exitosamente!');
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
        $bodega = Bodega::find($id);
        $proyecto = Proyecto::find($bodega->ID_PROYECTO)->NOMBRE;
        return view('bodegas.show', compact('bodega', 'proyecto'));
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
        $bodega = Bodega::find($id);
        $proyectos = Proyecto::pluck('NOMBRE', 'ID_PROYECTO')->all();
        $estados = Estado::pluck('NOMBRE', 'ID_ESTADO')->all();
        return view('bodegas.edit', compact('bodega', 'proyectos', 'estados'));
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
            'NOMBRE_BODEGA' => 'required|max:50',
            'DIRECCION' => 'required|max:50',
            'FECHA_CREACION' => 'required|date',
            'FECHA_CIERRE' => 'required|date|after:FECHA_CREACION',
            'CAPACIDAD' => 'required|max:50',
            'CAPACIDAD_DISPONIBLE' => 'required|max:50',
            'ID_PROYECTO' => 'required',
            'ID_ESTADO' => 'required',
        ]);

        $input = $request->all();
        $bodega = Bodega::find($id);
        $bodega->update($input);
        return redirect()->route('bodegas.index')->with('success', 'Bodega editada exitosamente!!');
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
        Bodega::find($id)->delete();
        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega borrada successfully');
    }
}

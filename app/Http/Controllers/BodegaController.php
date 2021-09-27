<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Proyecto;
use Illuminate\Http\Request;

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
        $data = Bodega::orderBy('id', 'asc')->paginate(5);
        return view('bodegas.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proyectos = Proyecto::pluck('NOMBRE', 'id')->all();
        return view('bodegas.create', compact('proyectos'));
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
            'NOMBRE_ENCARGADO' => 'required|max:50',
            'FECHA_CREACION' => 'required|date',
            'FECHA_CIERRE' => 'required|date',
            'CAPACIDAD' => 'required|max:50',
            'ID_PROYECTO' => 'required',
        ]);
        $input = $request->all();
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
        $proyectos = Proyecto::pluck('NOMBRE', 'id')->all();
        return view('bodegas.edit', compact('bodega', 'proyectos'));
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
            'NOMBRE_ENCARGADO' => 'required|max:50',
            'FECHA_CREACION' => 'required|date',
            'FECHA_CIERRE' => 'required|date',
            'CAPACIDAD' => 'required|max:50',
            'ID_PROYECTO' => 'required',
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

<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:proyecto-list|proyecto-create|proyecto-edit|proyecto-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:proyecto-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:proyecto-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bodega-list', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proyectos.create');
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
            'FECHA_INICIO' => 'required',
            'FECHA_FINALIZACION' => 'required',
            'DESCRIPCION' => 'required',
            'DIRECCION' => 'required|max:50',
            'TIPO' => 'required|max:50',
        ]);
        $input = $request->all();
        Proyecto::create($input);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado satisfactoriamente!');
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
        $proyecto = Proyecto::find($id);
        return view('proyectos.show', compact('proyecto'));
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
        $proyecto = Proyecto::find($id);
        return view('proyectos.edit', compact('proyecto'));
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
            'FECHA_INICIO' => 'required',
            'FECHA_FINALIZACION' => 'required',
            'DESCRIPCION' => 'required',
            'DIRECCION' => 'required',
            'TIPO' => 'required',
        ]);
        $input = $request->all();

        $proyecto = Proyecto::find($id);
        $proyecto->update($input);
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado satisfactoriamente!');
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
        Proyecto::find($id)->delete();
        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto borrado satisfactoriamente');
    }
}

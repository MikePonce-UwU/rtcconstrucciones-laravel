<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alquiler;
use App\Models\EntregaAlquiler;
use Illuminate\Http\Request;

class EntregaAlquilerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:alquiler-list|alquiler-create|alquiler-edit|alquiler-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:alquiler-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:alquiler-edit', ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entregas = EntregaAlquiler::all();
        return view('alquileres.entrega_alquileres.index', compact('entregas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $alquileres = Alquiler::pluck('NOMBRE', 'ID_ALQUILER');
        return view('alquileres.entrega_alquileres.create', compact('alquileres'));
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
            'HORAS_EXCEDIDAS' => 'required',
            'PAGO_EXCEDIDO' => 'required',
            'ID_ALQUILER' => 'required',
        ]);
        $input = $request->all();
        EntregaAlquiler::create($input);
        return redirect()->route('entrega-alquileres.index')->with('success', 'Entrega de alquiler registrada satisfactoriamente!!');
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
        $entrega = EntregaAlquiler::find($id);
        $alquiler = Alquiler::find($entrega->ID_ALQUILER);
        return view('alquileres.entrega_alquileres.show', compact('entrega', 'alquiler'));
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
        $entrega = EntregaAlquiler::find($id);
        $alquileres = Alquiler::pluck('NOMBRE', 'ID_ALQUILER');
        return view('alquileres.entrega_alquileres.edit', compact('entrega', 'alquileres'));
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
            'HORAS_EXCEDIDAS' => 'required',
            'PAGO_EXCEDIDO' => 'required',
            'ID_ALQUILER' => 'required',
        ]);
        $input = $request->all();
        $entrega = EntregaAlquiler::find($id);
        $entrega->update($input);
        return redirect()->route('entrega-alquileres.index')->with('success', 'Entrega de alquiler modificada satisfactoriamente!!');
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
        $entrega = EntregaAlquiler::find($id)->delete();
        return redirect()->route('entrega-alquileres.index')->with('success', 'Entrega de alquiler eliminada satisfactoriamente!!');
    }
}

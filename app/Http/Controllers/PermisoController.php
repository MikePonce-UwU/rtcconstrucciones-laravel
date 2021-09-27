<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    function __construct()
    {
        $this->middleware(
            'permission:permission-list|permission-create|permission-delete',
            ['only' => ['index', 'store']]
        );
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $permisos = Permission::all();
        return view('permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('permisos.create');
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
            'name' => 'required|unique:permissions,name'
        ]);
        $input = $request->all();
        Permission::create($input);
        return redirect()->route('permisos.index')->with('success', 'Permiso creado satisfactoriamente!');
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
        $permiso = Permission::find($id);
        return view('permisos.show', compact('permiso'));
    }

    /* No es posible editar un permiso, solo se puede mostrar y borrar un permiso */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $permiso = Permission::find($id)->delete();
        return redirect()->route('permisos.index')->with('success', 'Permiso eliminado satisfactoriamente!');
    }
}

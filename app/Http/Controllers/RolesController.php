<?php

namespace App\Http\Controllers;

use App\Rol;
use Session;
use App\Permiso;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permiso::all()->pluck('name', 'id');
        return view('roles.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $rol = new Rol();
        $rol->name = $request->name;
        $rol->created_at = now();
        $rol->updated_at = now();
        $rol->save();
        $rol->permisos()->sync($request->permisos);
        Session::flash('save', 'Se ha guardado correctamente');
        return redirect()->action('RolesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::find($id);
        $rol->load('permisos');
        return view('roles.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Rol::find($id);
        $permissions = Permiso::all()->pluck('name', 'id');
        $role->load('permisos');
        return view('roles.edit', compact('role', 'permissions'));
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
        dd($request,$id);
        $rol = Rol::find($id);
        $rol->update(['name' => $request->name]);
        $rol->permisos()->sync($request->permissions);
        Session::flash('update', 'Se ha actualizado correctamente');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session::flash('delete', 'Se ha eliminado correctamente');
        return redirect()->route('roles.index');
    }
}

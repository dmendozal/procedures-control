<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoTramite;
class TipoTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_tramite = TipoTramite::all();
        return view('tipo_tramites.index',compact('tipo_tramite')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('tipo_tramites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_tramites = TipoTramite::create($request->all());
     
        return redirect()->route('tipo_tramites.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_tramite = TipoTramite::find($id);
        return view('tipo_tramites.edit',compact('tipo_tramite'));
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
        $tipo_tramite = TipoTramite::find($id);
        $tipo_tramite->update($request->all());
        return redirect()->route('tipo_tramites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_tramite = TipoTramite::find($id);
        $tipo_tramite->delete();
        return redirect()->route('tipo_tramites.index');
    }
}

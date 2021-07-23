<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Tecnico;
use App\TipoTramite;
use App\Tramite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
/*****************************************/

use Illuminate\Support\Str;
use App\Models\Post;

/****************************************/
class TramiteController extends Controller
{
    public function index()
    {
        $tramites = Tramite::all();
        return view('tramite.index', compact('tramites'));
    }

    public function create()
    {
        $tipoTramites = TipoTramite::all();
        $estudiantes = Estudiante::all();
        $tecnicos = Tecnico::all();
        return view('tramite.create', compact('tipoTramites', 'estudiantes', 'tecnicos'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            /*****************************************/

                

            /*****************************************/
            $rutaCartaInicial = Storage::disk('public')->put('images', $request->file('carta_inicial'));
            $rutaCartaFinal = Storage::disk('public')->put('images', $request->file('carta_final'));
            $data = $request->all();
            $data["carta_inicial"] = $rutaCartaInicial;
            $data["carta_final"] = $rutaCartaFinal;
            $data["fkiduser"] = Auth::id();
            Tramite::create($data);
            DB::commit();
            return redirect()->route('tramite.index');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect()->route('tramite.index');
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tramite = Tramite::find($id);
        $tecnicos = Tecnico::all();
        $estudiantes = Estudiante::all();
        $tipoTramites = TipoTramite::all();
        return view('tramite.edit', compact('tramite', 'tecnicos', 'estudiantes', 'tipoTramites'));
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $tramite = Tramite::find($id);
            $data = $request->all();
            $data["fkiduser"] = Auth::id();
            $rutaCartaInicial = $request->file('carta_inicial');
            $rutaCartaFinal = $request->file('carta_final');

            if ($rutaCartaFinal != null) {
                $rutaCartaFinal = Storage::disk('public')->put('images', $rutaCartaFinal);
                $data["carta_final"] = $rutaCartaFinal;
            }

            if ($rutaCartaInicial != null) {
                $rutaCartaInicial = Storage::disk('public')->put('images', $rutaCartaInicial);
                $data["carta_inicial"] = $rutaCartaInicial;
            }

            $tramite->update($data);
            DB::commit();
            return redirect()->route('tramite.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('tramite.index');
        }
    }


    public function destroy($id)
    {
        $tramite = Tramite::find($id);
        $tramite->delete();
        return redirect()->route('tramite.index');
    }
}

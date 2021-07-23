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
           
            $rutaCartaInicial = Storage::disk('storage')->put('images', $request->file('carta_inicial'));
            $data = $request->all();
            $data ["fecha_inicio"]=date('y-m-d h:i:s', time());
            $data["carta_inicial"] = $rutaCartaInicial;

            $data["estado"]="EP";
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
       
        $tramite = Tramite::find($id);
        return view('tramite.show', compact('tramite'));
    }


    public function edit($id)
    {
        $tramite = Tramite::find($id);
        return view('tramite.edit', compact('tramite'));
    }
    public function entregar($id)
    {
        $tramite = Tramite::find($id);
        $datos = ['estado' => "FR"];
        $tramite->update($datos);
        return redirect()->route('tramite.index');

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $tramite = Tramite::find($id);
            $data = $request->all();
            $data["fecha_final"] = date('y-m-d h:i:s', time());

                $rutaCartaFinal = $request->file('carta_final');
                
                $rutaCartaFinal = Storage::disk('storage')->put('images', $request->file('carta_final'));
                $data["carta_final"] = $rutaCartaFinal;
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

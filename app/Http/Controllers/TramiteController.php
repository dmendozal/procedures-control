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
            //$rutaCartaFinal = Storage::disk('storage')->put('images', $request->file('carta_final'));
            $data = $request->all();
            /***********/
            $data ["fecha_inicio"]=date('y-m-d h:i:s', time());
            /* final_final */
            /***********/
            $data["carta_inicial"] = $rutaCartaInicial;
            //$data["carta_final"] = $rutaCartaFinal;
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
        //
    }


    public function edit($id)
    {
        $tramite = Tramite::find($id);
        return view('tramite.edit', compact('tramite',));
    }
    public function entregar($id)
    {
        
        return redirect()->route('tramite.index');

    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $tramite = Tramite::find($id);
            $data = $request->all();
            $data["carta_inicial"]=$tramite->carta_inicial;
            $data["fecha_inicio"]=$tramite->fecha_inicio;
            $data["fecha_final"] = date('y-m-d h:i:s', time());
            $data["fkidtipo_tramite"]=$tramite->fkidtipo_tramite;
            $data["fkiduser"]=$tramite->fkiduser;
            $data["fkidtecnico"]=$tramite->fkidtecnico;
            $data["fkidestudiante"]=$tramite->fkidestudiante;
            $rutaCartaFinal = $request->file('carta_final');

            if ($rutaCartaFinal != null) {
                $rutaCartaFinal = Storage::disk('public')->put('images', $rutaCartaFinal);
                $data["carta_final"] = $rutaCartaFinal;
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

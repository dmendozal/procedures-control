<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Session;
use App\User;
use App\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');;
        return view('usuarios.create', compact('roles'));
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
        $user = User::create($request->all());
        Session::flash('save', 'Se ha guardado correctamente');
        
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('usuarios.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Rol::all()->pluck('name', 'id');
        $user->load('roles');
        return view('usuarios.edit', compact('user', 'roles'));
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
        $user = User::find($id);
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/images/avatar';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $user->update(['name' => $request->name, 'email' => $request->email, 'apellido' => $request->apellido, 'direccion' => $request->direccion, 'telefono' => $request->telefono, 'foto' => 'assets/images/avatar/' . $fileName]);
        } else {
            $user->update(['name' => $request->name, 'email' => $request->email, 'apellido' => $request->apellido, 'direccion' => $request->direccion, 'telefono' => $request->telefono]);
        }
        $user->roles()->sync($request->roles);
        Session::flash('update', 'Se ha actualizado correctamente');
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        Session::flash('delete', 'Se ha eliminado correctamente');
        return redirect()->route('usuarios.index');
    }
}

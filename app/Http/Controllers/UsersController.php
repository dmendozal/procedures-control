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

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');;
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        Session::flash('save', 'Se ha guardado correctamente');

        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('usuarios.show', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Rol::all()->pluck('name', 'id');
        $user->load('roles');
        return view('usuarios.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        Session::flash('save', 'Se ha guardado correctamente');

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        Session::flash('delete', 'Se ha eliminado correctamente');
        return redirect()->route('usuarios.index');
    }
}

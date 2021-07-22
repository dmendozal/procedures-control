@extends('layouts.app')
@section('title', 'Detalle de Usuario')
@section('content')
<div class="col-lg-12 col-12 mb-20">
    <div class="card">
        <div class="card-header">
            Mi Perfil
            <a class="button button-success button-sm float-right" href="{{route('usuarios.edit',$users->id)}}">Editar
                Perfil</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <td>
                            {{ $users->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Apellido
                        </th>
                        <td>
                            {{ $users->apellido }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Direccion
                        </th>
                        <td>
                            {{ $users->direccion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Telefono
                        </th>
                        <td>
                            {{ $users->telefono }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Foto
                        </th>
                        <td>
                            <img src="{{ asset($users->foto)}}" height="200px" width="auto" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a class="button button-danger button-sm" href="{{ url('/home') }}">Cancelar</a> </div>
        </div>
    </div>
</div>
</div>
@endsection
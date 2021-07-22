@extends('layouts.app')
@section('title', 'Gestion de Roles')

@section('content')
<div class="col-lg-12 col-12 mb-20">
    <div class="card">
        <div class="card-header">
            Detalle del Estado
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Nro
                        </th>
                        <td>
                            {{ $rol->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <td>
                            {{ $rol->name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Estado
                        </th>
                        <td>
                            @foreach($rol->permisos as $id => $permissions)
                            <span class="label label-info label-many">{{ $permissions->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a class="button button-danger button-sm" href="{{ route("roles.index") }}">Cancelar</a>
            </div>
        </div>
    </div>
</div>

@endsection
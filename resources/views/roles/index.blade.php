@extends('layouts.app')
@section('title', 'Gestion de Roles')

@section('content')
@include('partials.messages')
<a href="{{route('roles.create')}}" class="button button-success button-sm">Registar Rol</a>
<div class="col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h3 class="title">Lista de Roles</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped data-table data-table-default">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de Creacion</th>
                        <th>Permisos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name}}</td>
                        <td>{{ $role->created_at}}</td>
                        <td>
                            @foreach($role->permisos as $key => $permiso)
                            <span class="badge badge-info">{{ $permiso->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{route('roles.show',$role->id)}}" class="button button-sm button-info">Detalle</a>
                            <a href="{{route('roles.edit',$role->id)}}"
                                class="button button-sm button-primary">Editar</a>
                            <form action="{{ route('permisos.destroy', $role->id) }}" method="POST"
                                onsubmit="return confirm('¿Está seguro?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="button button-danger button-sm" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de Creacion</th>
                        <th>Permisos</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>


<script>
    function Editar(id, nombre) {
        document.getElementById('id1').value=id;
        document.getElementById('nombre1').value=nombre;
    }
</script>
@endsection
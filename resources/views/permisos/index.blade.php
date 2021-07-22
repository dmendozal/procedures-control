@extends('layouts.app')
@section('title', 'Gestion de Permisos')

@section('content')
@include('permisos.modal_update')
@include('permisos.modal_insert')
@include('partials.messages')
<div class="col-12 mb-30">
    <div class="box">
    <button class="button button-success button-sm" data-toggle="modal" data-target="#exampleModal5" data-whatever="@mdo">Registar Permiso</button>
        <div class="col-12 mb-30">
            <div class="box">
        <div class="box-head">
            <h3 class="title">Lista de Permisos</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <h6>Por favor corrige los errores debajo:</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        </div>
        <div class="box-body">
            <table class="table table-bordered data-table data-table-default">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de Creacion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permisos as $item)
                    <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                            <button class="button button-primary button-sm" data-toggle="modal" data-target="#exampleModal3" onclick="Editar('{{$item->id}}','{{$item->name}}')" >Editar</button>
                            <form action="{{ route('permisos.destroy', $item->id) }}"
                                method="POST" onsubmit="return confirm('¿Está seguro?');"
                                style="display: inline-block;">
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
                        <th>Opciones</th>
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

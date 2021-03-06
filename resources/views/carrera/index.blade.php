@extends('layouts.app')
@section('content')
<a href="{{route('carrera.create')}}" class="button button-success button-sm">
    Registrar Carrera
</a>
<div class="col-12 mb-30">
    <div class="box-head">
        <h3 class="title">Lista de Carreras</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table data-table-export">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Codigo de Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $key => $carrera)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $carrera->nombre }}</td>
                    <td>{{ $carrera->codigo_carrera }}</td>
                    <td>
                        <a class="button button-info button-sm"
                            href="{{ route('carrera.edit', $carrera->idcarrera) }}">
                            Editar
                        </a>
                        <form action="{{ route('carrera.destroy', $carrera->idcarrera) }}" method="POST"
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
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Codigo de Carrera</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection
@extends('layouts.app')
@section('content')
<a href="{{route('estudiante.create')}}" class="button button-success button-sm">
    Registrar estudiante
</a>
<div class="col-12 mb-30">
    <div class="box-head">
        <h3 class="title">Lista de estudiantes</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table data-table-export">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>CI</th>
                    <th>Matricula</th>
                    <th>Estado</th>
                    <th>Telefono</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $key => $estudiante)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->ci }}</td>
                    <td>{{ $estudiante->matricula }}</td>
                    <td style="background-color: {{ ($estudiante->estado == "E") ? "yellow" : "aqua" }}" class="circle" >
                        {{ ($estudiante->estado == "E") ? "En curso" : "Terminado"  }}
                    </td>
                    <td>{{ $estudiante->telefono }}</td>
                    <td>{{ $estudiante->carrera->nombre }}</td>
                    <td>
                        <a class="button button-info button-sm"
                            href="{{ route('estudiante.edit', $estudiante->idestudiante) }}">
                            Editar
                        </a>
                        <form action="{{ route('estudiante.destroy', $estudiante->idestudiante) }}" method="POST"
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
                    <th>CI</th>
                    <th>Matricula</th>
                    <th>Estado</th>
                    <th>Telefono</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection

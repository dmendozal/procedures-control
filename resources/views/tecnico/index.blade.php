@extends('layouts.app')
@section('content')
<a href="{{route('tecnico.create')}}" class="button button-success button-sm">
    Registrar Tecnico
</a>
<div class="col-12 mb-30">
    <div class="box-head">
        <h3 class="title">Lista de Tecnicos</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table data-table-export">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tecnicos as $key => $tecnico)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $tecnico->nombre }}</td>
                    <td>{{ $tecnico->telefono }}</td>
                    <td>
                        <a class="button button-info button-sm"
                            href="{{ route('tecnico.edit', $tecnico->idtecnico) }}">
                            Editar
                        </a>
                        <form action="{{ route('tecnico.destroy', $tecnico->idtecnico) }}" method="POST"
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
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection
@extends('layouts.app')
@section('content')
<a href="{{route('tipo_tramites.create')}}" class="button button-success button-sm">
    Registrar Tipo de Tramite
</a>
<div class="col-12 mb-30">
    <div class="box-head">
        <h3 class="title">Lista de Tipo de Tramite</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table data-table-export">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipo_tramite as $key => $tipo_tramites)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $tipo_tramites->nombre }}</td>
                    <td>
                        <a class="button button-info button-sm"
                            href="{{ route('tipo_tramites.edit', $tipo_tramites->idtipo_tramite) }}">
                            Editar
                        </a>
                        <form action="{{ route('tipo_tramites.destroy', $tipo_tramites->idtipo_tramite) }}" method="POST"
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
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection
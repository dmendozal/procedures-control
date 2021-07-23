@extends('layouts.app')
@section('content')
<a href="{{route('tramite.create')}}" class="button button-success button-sm">
    Registrar Tramite
</a>
<div class="col-12 mb-30">
    <div class="box-head">
        <h3 class="title">Lista de Tramites</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table data-table-export">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Carta Inicial</th>
                    <th>Carta Final</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Estado</th>
                    <th>Tipo de Tramite</th>
                    <th>Atendido Por</th>
                    <th>Tecnico</th>
                    <th>Estudiante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tramites as $key => $tramite)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                   {{storage_patch()}}
                    <td><img src="{{ asset('storage/app/public/'.$tramite->carta_inicial) }}" alt=""></td>
                    <td><img src="{{ asset("storage/".$tramite->carta_final) }}" alt=""></td>
                    <td>{{ $tramite->fecha_inicio }}</td>
                    <td>{{ $tramite->fecha_final }}</td>
                    <td>{{ $tramite->estadoTramite($tramite->estado) }}</td>
                    <td>{{ $tramite->tipoTramite->nombre }}</td>
                    <td>{{ $tramite->user->name }}</td>
                    <td>{{ $tramite->tecnico->nombre }}</td>
                    <td>{{ $tramite->estudiante->nombre }}</td>
                    <td>
                        <a class="button button-info button-sm"
                            href="{{ route('tramite.edit', $tramite->idtramite) }}">
                            Editar
                        </a>
                        <form action="{{ route('tramite.destroy', $tramite->idtramite) }}" method="POST"
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
                    <th>Carta Inicial</th>
                    <th>Carta Final</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Estado</th>
                    <th>Tipo de Tramite</th>
                    <th>Atendido Por</th>
                    <th>Tecnico</th>
                    <th>Estudiante</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection

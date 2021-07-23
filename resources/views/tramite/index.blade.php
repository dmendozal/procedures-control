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
                    <th>Tipo de Tramite</th>
                    <th>Fecha Inicio</th>
                    <th>Estudiante</th>
                    <th>Tecnico</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tramites as $key => $tramite)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $tramite->tipoTramite->nombre }}</td>
                    <td>{{ $tramite->fecha_inicio }}</td>
                    <td>{{ $tramite->estudiante->nombre }}</td>
                    <td>{{ $tramite->tecnico->nombre }}</td>
                    <td>{{ $tramite->estadoTramite($tramite->estado) }}</td>
                    <td>
                        <a class="button button-info button-sm"
                            href="{{($tramite->estado=='EP')?route('tramite.edit', $tramite->idtramite):route('tramite.entregar', $tramite->idtramite) }}"
                            onsubmit="{{($tramite->estado!='EP') ? "return confirm('¿Está seguro?');":""}}" style="display: inline-block;">
                            
                        >
                            {{($tramite->estado=='EP') ? "Actualizar":"Entregar"}}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nro</th>
                    <th>Tipo de Tramite</th>
                    <th>Fecha Inicio</th>
                    <th>Estudiante</th>
                    <th>Tecnico</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection

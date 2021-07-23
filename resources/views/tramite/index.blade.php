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
                        @if($tramite->estado!='FR')
                        <form action="{{($tramite->estado=='EP')?route('tramite.edit', $tramite->idtramite):route('tramite.entregar', $tramite->idtramite) }}" method="get"
                            onsubmit="return confirm('¿Se entregara la carta de respuesta?');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="{{($tramite->estado=='EP')? "button button-info button-sm" : "button button-danger button-sm"}}" value="{{($tramite->estado=='EP') ? "Actualizar":"Entregar"}}">
                        </form>
                        @endif
                        <a  class="button button-primary button-sm"
                        href="{{ route('tramite.show', $tramite->idtramite) }}">
                        Ver</a>
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

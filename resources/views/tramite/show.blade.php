@extends('layouts.app')
@section('title', 'Detalle Tramite')
@section('content')
<div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Numero de tramite
                        </th>
                        <td>
                            {{ $tramite->idtramite }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tipo de tramite
                        </th>
                        <td>
                        {{ $tramite->tipoTramite->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Estudiante
                        </th>
                        <td>
                        {{ $tramite->estudiante->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tecnico
                        </th>
                        <td>
                        {{ $tramite->tecnico->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Fecha de Inico del Tramite
                        </th>
                        <td>
                            {{ $tramite->fecha_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Secretaria que lo recepciono
                        </th>
                        <td>
                        {{ $tramite->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Carta Presentada por el estudiante
                        </th>
                        <td>
                        <img src="{{ asset('storage/'.$tramite->carta_inicial) }}"   height="300" width="auto" />
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Fecha de Entrega
                        </th>
                        <td>
                            {{ ($tramite->fecha_inicio=="null")? "Nose entrego todavia" : $tramite->fecha_inicio }}
                        </td>
                    </tr>

                    </tr>
                    <tr>
                        <th>
                            Secretaria que lo Entrego
                        </th>
                        <td>
                        {{ ($tramite->user->name==null)?"Nose entrego todavia":$tramite->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Carta Entregada al estudiante
                        </th>
                        <td>
                            @if ($tramite->carta_final==null)
                           Nose entrego todavia
                           
                           @endif
                           @if($tramite->carta_final!=null)
                           <img src="{{ asset('storage/'.$tramite->carta_final) }}"   height="300" width="auto" />
                        @endif
                        </td>
                </tbody>
            </table>
            <div>
                <a class="button button-danger button-sm" href="{{ url('/home') }}">Volver</a> </div>
        </div>
@endsection

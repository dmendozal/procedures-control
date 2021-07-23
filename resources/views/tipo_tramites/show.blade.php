@extends('layouts.app')
@section('title', 'Detalle Estado')
@section('content')
<div class="col-lg-12 col-12 mb-20">
    <div class="card">
        <div class="card-header">
            Detalle del Estado
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Nro
                        </th>
                        <td>
                            {{ $estado->idestado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sigla
                        </th>
                        <td>
                            {{ $estado->sigla }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <td>
                            {{ $estado->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Estado
                        </th>
                        <td>
                            {{ $estado->estado==1?'Activo':'Inactivo' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a class="button button-danger button-sm" href="{{ route('estado.index') }}">Cancelar</a> </div>
        </div>
    </div>
</div>
<h6>{{ Auth()->user()->showCounter(20)}}</h6>
@endsection

@extends('layouts.app')
@section('content')
<div class="col-lg-12 col-12 mb-20">
    <div class="card">
        <div class="card-header">
            Detalle del Deudor
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <td>
                            {{ $debtor->person->fullname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            CI
                        </th>
                        <td>
                            {{ $debtor->person->ci }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Numero
                        </th>
                        <td>
                            {{ $debtor->person->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Genero
                        </th>
                        <td>
                            {{ $debtor->person->gender == 1 ? "Femenino":"Masculino" }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Deuda
                        </th>
                        <td>
                            {{ $debtor->debt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Cancelado
                        </th>
                        <td>
                            {{ $debtor->sale->paid_out }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Estado de la deuda
                        </th>
                        <td style="{{ $debtor->state_debtor == 1 ? "background-color: red" : "background-color: white" }}">
                            <strong> {{ $debtor->state_debtor == 1 ? "DEUDOR":"NO DEUDOR" }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a class="button button-danger button-sm" href="{{ route('debtor.index') }}">Cancelar</a> </div>
        </div>
    </div>
</div>
<div class="card col-lg-12 col-12 mb-20">
    <div class="card-header">
        <h4>Detalles de la ventas </h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        Cantidad
                    </th>
                    <th>
                        Producto
                    </th>
                    <th>
                        Precio
                    </th>
                    <th>
                        Subtotal
                    </th>

                    {{-- <th>
                        &nbsp;
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($details as $key => $detail)
                <tr data-entry-id="{{ $key }}">
                    <td>
                        {{ $detail->amount }}
                    </td>
                    <td>
                        {{  $detail->product->name }}
                    </td>
                    <td>
                        {{ $detail->price }}
                    </td>
                    <td>
                        {{ $detail->subtotal }}
                    </td>
                    {{-- <td>
                        <a class="btn btn-xs btn-info"
                            href="{{ route('admin.ponderacion.edit',$ponderacion->idmoduloponderacion) }}">
                            {{ trans('global.edit') }}
                        </a>
                        <form action="{{ route('admin.ponderacion.destroy', $ponderacion->idmoduloponderacion) }}"
                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                            style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

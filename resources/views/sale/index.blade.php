@extends('layouts.app')
@section('content')
<a class="button button-success button-sm" href="{{route('sale.create')}}">
    Registrar Venta
</a>
<div class="col-12 mb-30">
    <div class="box-head">
        <h3 class="title">Ventas</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table data-table-export">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Total pagado</th>
                    <th>Persona</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $key => $sale)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ date("jS F, Y, H:i:s", strtotime( $sale->date)) }}</td>
                    <td>{{ "Bs.".$sale->total }}</td>
                    <td>{{ $sale->paid_out }}</td>
                    <td>{{ $sale->person->fullname ?? "" }}</td>
                    <td>
                        <a class="button button-info button-sm"
                            href="{{ route('sale.edit', $sale->idsale) }}">
                            Editar
                        </a>
                        <form action="{{ route('sale.destroy', $sale->idsale) }}" method="POST"
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
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Total pagado</th>
                    <th>Persona</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection

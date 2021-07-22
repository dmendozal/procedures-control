@extends('layouts.app')
@section('content')
{{-- <a class="button button-success button-sm" href="{{route('debtor.create')}}">
    Registrar Deudor
</a> --}}
<div class="col-12 mb-30">
    <div class="box-head">
        <h3 class="title">Lista de Deudores</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table data-table-export">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Persona</th>
                    <th>Deuda (Bs)</th>
                    <th>Fecha</th>
                    <th>Estado de Deudor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($debtors as $key => $debtor)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $debtor->person->fullname }}</td>
                    <td>{{ $debtor->debt }}</td>
                    <td>{{ $debtor->date }}</td>
                    <td>{{ ($debtor->state_debtor)? "DEUDOR":"NO DEUDOR" }}</td>
                    <td>
                        <a class="button button-android button-sm" href="{{ route('debtor.show', $debtor->iddebtor) }}">
                            Detalles
                        </a>
                        <a class="button button-info button-sm" href="{{ route('debtor.edit', $debtor->iddebtor) }}">
                            Editar
                        </a>
                        <form action="{{ route('debtor.destroy', $debtor->iddebtor) }}" method="POST"
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
                    <th>Persona</th>
                    <th>Deuda (Bs)</th>
                    <th>Fecha</th>
                    <th>Estado de Deudor</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection

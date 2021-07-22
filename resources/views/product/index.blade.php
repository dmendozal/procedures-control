@extends('layouts.app')
@section('content')
<a class="button button-success button-sm" href="{{route('product.create')}}">
    Registrar Producto
</a>
<div class="col-12 mb-30">
    <div class="box-head">
        <h3 class="title">Lista de Productos</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table data-table-export">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Description</th>
                    <th>Cantidad</th>
                    <th>Precio de Compra</th>
                    <th>Precio de Venta</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                <tr data-entry-id="{{ $key }}">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->sell_price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a class="button button-info button-sm"
                            href="{{ route('product.edit', $product->idproduct) }}">
                            Editar
                        </a>
                        <form action="{{ route('product.destroy', $product->idproduct) }}" method="POST"
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
                    <th>Description</th>
                    <th>Cantidad</th>
                    <th>Precio de Compra</th>
                    <th>Precio de Venta</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!-- Content Body End -->
@endsection

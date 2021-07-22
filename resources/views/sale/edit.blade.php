@extends('layouts.app')
@section('content')
<div class="col-lg-12 col-12 mb-20">
    @if ($errors->any())
    <div class="alert alert-danger">
        <h6>Por favor corrige los errores debajo:</h6>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h6 class="mb-15">Formulario de Edicion</h6>
    <form action="{{route('product.update',[$product->idproduct])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label>Nombre
                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label>Descripcion
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $product->description }}" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label>Cantidad
                    <input type="number" class="form-control" name="stock" id="stock" value="{{ $product->stock }}" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label>Precio de Compra
                    <input type="number" step="0.01" class="form-control" name="purchase_price" id="purchase_price"
                        value="{{ $product->purchase_price }}" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label>Precio de Venta
                    <input type="number" step="0.01" class="form-control" name="sell_price" id="sell_price"
                        value="{{ $product->sell_price }}" />
                </label>
            </div>

            <div class="col-6 mb-15">
                <label for="fkidcategory">Categoria
                    <select name="fkidcategory" id="fkidcategory" class="form-control select2" required>
                        <option value="{{ $product->fkidcategory }}">
                            {{ $product->category->name }}
                        </option>
                        @foreach($categories as $category)
                        <option value="{{ $category->idcategory }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <br>
                    <br>
            </div>
        </div>
        <button type="submit" class="button button-primary button-sm">Guardar Cambios</button>
        <a class="button button-danger button-sm" href="{{ route('product.index') }}">Cancelar</a>

    </form>
</div>
@endsection
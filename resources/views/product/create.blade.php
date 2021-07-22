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
    <h6 class="mb-15">Formulario de Registro</h6>
    <form action="{{ route('product.store')}}" method="POST">
        @csrf
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label>Nombre del Producto
                    <input type="text" class="form-control" placeholder="Ej: Zapatos" name="name" id="name" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label>Descripcion del Producto
                    <input type="text" class="form-control" placeholder="Ej: Marca Nike" name="description"
                        id="description" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label>Cantidad del Producto
                    <input type="number" class="form-control" name="stock" id="stock" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label>Precio de Compra
                    <input type="number" step="0.01" class="form-control" name="purchase_price" id="purchase_price" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label>Precio de Venta
                    <input type="number" step="0.01" class="form-control" name="sell_price" id="sell_price" />
                </label>
            </div>
            <div class="col-6 mb-15">
                <label for="fkidcategory">Categoria
                    <select name="fkidcategory" id="fkidcategory" class="form-control select2" required>
                        <option value="">
                            --SELECCIONAR--
                        </option>
                        @foreach($categories as $category)
                        <option value="{{ $category->idcategory }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
            </div>
        </div>
        <br>
        <button type="submit" class="button button-primary button-sm">Registrar Producto</button>
        <a class="button button-danger button-sm" href="{{ route('product.index') }}">Cancelar</a>
    </form>
</div>
@endsection
@extends('layouts.app')
@section('title', 'Formulario de Registro')

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
    <form action="{{ route('category.store')}}" method="POST">
        @csrf
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label>Nombre
                    <input type="text" class="form-control" placeholder="Ej: Abarrotes" name="name" id="name" />
                </label>
            </div>
        </div>
        <br>

        <button type="submit" class="button button-primary button-sm">Registrar Categoria</button>
        <a class="button button-danger button-sm" href="{{ route('category.index') }}">Cancelar</a>

    </form>
</div>
@endsection
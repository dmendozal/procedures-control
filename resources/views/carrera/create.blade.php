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
    <form action="{{ route('carrera.store')}}" method="POST">
        @csrf
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label> Nombre </label>
                    <input type="text" class="form-control" placeholder="Ej: Sistemas" name="nombre" id="nombre" />
            </div>
        </div>
        <br>
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label>Codigo de Carrera </label>
                    <input type="text" class="form-control" placeholder="Ej: SIS" name="codigo_carrera" id="codigo_carrera" />
            </div>
        </div>
        <br>

        <button type="submit" class="button button-primary button-sm">Registrar Carrera</button>
        <a class="button button-danger button-sm" href="{{ route('carrera.index') }}">Cancelar</a>

    </form>
</div>
@endsection
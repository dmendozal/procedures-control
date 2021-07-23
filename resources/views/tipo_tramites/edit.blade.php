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
    <form action="{{route('tipo_tramites.update',[$tipo_tramite->idtipo_tramite])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $tipo_tramite->nombre }}" />
            </div>
        </div>
        <button type="submit" class="button button-primary button-sm">Guardar Cambios</button>
        <a class="button button-danger button-sm" href="{{ route('tipo_tramites.index') }}">Cancelar</a>
    </form>
</div>
@endsection

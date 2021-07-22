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
    <form action="{{route('debtor.update',[$debtor->iddebtor])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label>Nombre</label>
                <input type="text" readonly class="form-control" name="name" id="name"
                    value="{{ $debtor->person->fullname }}" />
            </div>
            <div class="col-6 mb-15">
                <label>Deuda</label>
                <input type="number" class="form-control" name="debt" id="debt" value="{{ $debtor->debt }}" />
            </div>
            <div class="col-6 mb-15">
                <label>Estado de Deuda</label>
                <select name="state_debtor" id="state_debtor" class="form-control select2" required
                    style="align-items: flex-start">
                    <option value="{{ $debtor->state_debtor }}"> {{$debtor->state_debtor?"DEUDOR":"NO DEUDOR"}}
                    </option>
                    <option value="0">NO DEUDOR</option>
                    <option value="1">DEUDOR</option>
                </select>
                @if($errors->has('gender'))
                <em class="invalid-feedback">
                    {{ $errors->first('gender') }}
                </em>
                @endif
            </div>
        </div>
        <br>
        <div style="text-align: center">
            <button type="submit" class="button button-primary button-sm">Guardar Cambios</button>
            <a class="button button-danger button-sm" href="{{ route('category.index') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection

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
        <div class="col-6 mb-15">
            <label>Nombre</label>
            <input type="text" readonly class="form-control" name="name" id="name" />
        </div>
        <div class="col-6 mb-15">
            <label>Deuda</label>
            <input type="number" class="form-control" name="debt" id="debt" />
        </div>
        <div class="col-6 mb-15">
            <label>Estado de Deuda</label>
            <select name="state_debtor" id="state_debtor" class="form-control select2" required
                style="align-items: flex-start">
                <option> --SELECCIONAR--</option>
                <option value="0">NO DEUDOR</option>
                <option value="1">DEUDOR</option>
            </select>
            @if($errors->has('gender'))
            <em class="invalid-feedback">
                {{ $errors->first('gender') }}
            </em>
            @endif
        </div>
        <div class="col-6 mb-15" id="divPerson">
            <label for="fkidperson"> Persona </label>
            <select name="fkidperson" id="fkidperson" class="form-control select2">
                <option value="0">
                    --SELECCIONAR--
                </option>
                @foreach($persons as $person)
                <option value="{{$person->idperson}}">
                    {{ 'Nombre: '.$person->fullname.'; CI: '.$person->ci.'; Numero de Telefono: '.$person->number }}
                </option>
                @endforeach
            </select>
        </div>
        <br>

        <button type="submit" class="button button-primary button-sm">Registrar Deudor</button>
        <a class="button button-danger button-sm" href="{{ route('debtor.index') }}">Cancelar</a>

    </form>
</div>
@endsection

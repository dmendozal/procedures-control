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
        <form action="{{ route('estudiante.store') }}" method="POST">
            @csrf
            <div class="row mbn-15">
                <div class="col-6 mb-15">
                    <label> Nombre </label>
                    <input type="text" class="form-control" placeholder="Ej: Juan Perez" name="nombre" id="nombre" />
                </div>
            </div>
            <br>
            <div class="row mbn-15">
                <div class="col-6 mb-15">
                    <label>CI </label>
                    <input type="text" class="form-control" placeholder="Ej: 123123" name="ci" id="ci" />
                </div>
            </div>
            <br>
            <div class="row mbn-15">
                <div class="col-6 mb-15">
                    <label>Matricula </label>
                    <input type="text" class="form-control" placeholder="Ej: 12435" name="matricula" id="matricula" />
                </div>
            </div>
            <br>
            <div class="row mbn-15">
                <div class="col-6 mb-15">
                    <label>Telefono </label>
                    <input type="text" class="form-control" placeholder="Ej: 2145124" name="telefono" id="telefono" />
                </div>
            </div>
            <br>
            <div class="col-6 mb-15">
                <label for="fkidcarrera">Carrera </label>
                    <select name="fkidcarrera" id="fkidcarrera" class="form-control select2" required>
                        <option value="">
                            --SELECCIONAR--
                        </option>
                        @foreach ($carreras as $carrera)
                            <option value="{{ $carrera->idcarrera }}">
                                {{ $carrera->nombre }}
                            </option>
                        @endforeach
                    </select>
            </div>

            <div class="col-6 mb-15">
                <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control select2" required>
                        <option value="E">
                            En curso
                        </option>
                        <option value="T">
                            Terminado
                        </option>
                    </select>
            </div>
            <br>

            <button type="submit" class="button button-primary button-sm">Registrar Carrera</button>
            <a class="button button-danger button-sm" href="{{ route('carrera.index') }}">Cancelar</a>

        </form>
    </div>
@endsection

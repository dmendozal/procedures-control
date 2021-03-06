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
    <form action="{{route('usuarios.store')}}" method="POST" enctype="multipart/form-data" class="smart-form"
        role="form">
        @csrf
        {{ csrf_field() }}
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label for="name">Nombre de Usuario</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
                @endif
            </div>
            <div class="col-6 mb-15">
                <label for="email">Correo Electronico</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                <em class="invalid-feedback">
                    {{ $errors->first('email') }}
                </em>
                @endif
            </div>
            <div class="col-6 mb-15">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control"
                    value="{{ old('password', isset($user) ? $user->password : '') }}">
                @if($errors->has('password'))
                <em class="invalid-feedback">
                    {{ $errors->first('password') }}
                </em>
                @endif
            </div>
            <div class="col-6 mb-15">
                <label for="password_confirmation">Repetir Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    value="{{ old('password_confirmation', isset($user) ? $user->password : '') }}">
                @if($errors->has('password_confirmation'))
                <em class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </em>
                @endif
            </div>
            <div class="col-6 mb-15"><label>Nombre</label><input type="text" class="form-control" placeholder="Nombre"
                name="name" /></div>
            <div class="col-6 mb-15"><label>Apellido</label><input type="text" class="form-control" placeholder="Apellido"
                        name="apellido" /></div>
            <div class="col-6 mb-15"><label>Direccion</label><input type="text" class="form-control" placeholder="Direccion"
                        name="direccion" /></div>
            <div class="col-6 mb-15"><label>Telefono o Celular</label><input type="text" class="form-control"
                        placeholder="Telefono o Celular" name="telefono" /></div>
        <div style="text-align: center; padding-top: 5%">
            <button type="submit" class="button button-primary button-sm">Registrar Usuario</button>
            <a class="button button-danger button-sm" href="{{ route('usuarios.index') }}">Cancelar</a>
        </div>
    </form>

</div>



@endsection

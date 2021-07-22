@extends('layouts.app')
@section('title', 'Formulario de Edicion')

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
    <h6 class="mb-15">Formulario de Modificacion</h6>
    <form action="{{route('usuarios.update',[$user->id])}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
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
            <div class="col-6 mb-15"><label>Apellido<input type="text" class="form-control" placeholder="Apellido"
                        name="apellido" value="{{$user->apellido}}" /></label></div>
            <div class="col-6 mb-15"><label>Direccion<input type="text" class="form-control" placeholder="Direccion"
                        name="direccion" value="{{$user->direccion}}" /></label></div>
            <div class="col-6 mb-15"><label>Telefono o Celular<input type="text" class="form-control"
                        placeholder="Telefono o Celular" name="telefono" value="{{$user->telefono}}" /></label></div>

            <div class="col-6 mb-15">
                <label for="roles">Roles
                    <span class="btn btn-info btn-sm select-all" style="padding-top: 0%">Select all</span>
                    <span class="btn btn-info btn-sm deselect-all" style="padding-top: 0%">Deselect
                        all</span>
                </label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple">
                    @foreach($roles as $id => $roles)
                    <option value="{{ $id }}"
                        {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>
                        {{ $roles }}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                <em class="invalid-feedback">
                    {{ $errors->first('roles') }}
                </em>
                @endif
            </div>
        </div>
        <br>
        <center>
            <div class="col-6 mb-15"><label>Fotografia<input data-default-file="{{asset($user->foto)}}" type="file"
                        class="dropify" name="foto" /></label></div>
        </center>
        <div style="text-align: center; padding-top: 5%">
            <button type="submit" class="button button-primary button-sm">Guardar Cambios</button>
            <a class="button button-danger button-sm" href="{{ route('usuarios.index') }}">Cancelar</a>
        </div>
    </form>

</div>

<script>
    window.addEventListener('load', function() {
        document.querySelector('input[type="file"]').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var img = document.querySelector('img[id="fotoI"]');  // $('img')[0]
                img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                img.onload = imageIsLoaded;
            }
        });
      });
      
</script>

@endsection
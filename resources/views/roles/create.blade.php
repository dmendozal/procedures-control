@extends('layouts.app')
@section('title', 'Gestion de Roles')

@section('content')
<div class="col-12 mb-30">
    <div class="box">
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
        <div class="box-head">
            <h3 class="title">Registrar Nuevo Rol</h3>
        </div>
        <div class="col-12 mb-20">
            <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="padding-bottom: 1%">
                    <label for="name">Rol</label>
                    <input type="name" id="name" name="name" class="form-control"
                        value="{{ old('name', isset($role) ? $role->name : '') }}">
                    @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                    <label for="permissions">Permisos
                        <span class="btn btn-info btn-sm select-all" style="padding-top: 0%">Select all</span>
                        <span class="btn btn-info btn-sm deselect-all" style="padding-top: 0%">Deselect
                            all</span></label>
                    <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple">
                        @foreach($permisos as $id => $permiso)
                        <option value="{{ $id }}"
                            {{ (in_array($id, old('permisos', [])) || isset($role) && $role->permiso->contains($id)) ? 'selected' : '' }}>
                            {{ $permiso }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('permissions'))
                    <em class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </em>
                    @endif
                </div>
        </div>
        <div>
            <button type="submit" class="button button-primary button-sm">Registrar Rol</button>
            <a class="button button-danger button-sm" href="{{ route('roles.index') }}">Cancelar</a>
        </div>

        </form>
    </div>
</div>
</div>





@endsection
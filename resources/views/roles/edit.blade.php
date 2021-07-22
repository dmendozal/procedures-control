@extends('layouts.app')
@section('title', 'Gestion de Roles')

@section('content')
<div class="col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h3 class="title">Registrar Nuevo Rol</h3>
        </div>
        <div class="col-12 mb-20">
            <form action="{{route('roles.update',$role->id)}}" method="POST">
                @csrf
                @method('PUT')
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
                <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}" style="padding-bottom: 3%">
                    <label for="permissions">Permisos
                        <span class="btn btn-info btn-sm select-all" style="padding-top: 0%">Select all</span>
                        <span class="btn btn-info btn-sm deselect-all" style="padding-top: 0%">Deselect
                            all</span></label>
                    <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple">
                        @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}"
                            {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permisos->contains($id)) ? 'selected' : '' }}>
                            {{ $permissions }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="button button-primary button-sm">Guardar Cambios</button>
                    <a class="button button-danger button-sm" href="{{ route('roles.index') }}">Cancelar</a>
                </div>


            </form>
        </div>
    </div>
</div>





@endsection
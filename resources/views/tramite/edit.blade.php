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
    <form action="{{route('tramite.update',[$tramite->idtramite])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label> Carta Final </label>
                <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload_carta_inicial" src="{{asset("storage/".$tramite->carta_final)}}"
                         alt="preview image" style="max-height: 250px;">
                </div>
                <label for="nombre"></label><input type="file" class="form-control" name="carta_final" id="carta_final" value="{{ $tramite->carta_final }}"/>
            </div>
        </div>
        <br>
        <div class="col-6 mb-15">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control select2" required>
                <option value="EP">
                   Selecionar
                </option>
                <option value="R">
                    Rechazado
                </option>
                <option value="F">
                    Finalizado
                </option>
            </select>
        </div>
        <br>

        <button type="submit" class="button button-primary button-sm">Guardar Cambios</button>
        <a class="button button-danger button-sm" href="{{ route('tramite.index') }}">Cancelar</a>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $('#carta_final').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload_carta_final').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#carta_inicial').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload_carta_inicial').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection

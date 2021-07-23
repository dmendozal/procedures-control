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
    <form action="{{ route('tramite.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row mbn-15">
            <div class="col-6 mb-15">
                <label> Carta Inicial </label>
                <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload_carta_inicial" src=""
                         alt="preview image" style="max-height: 250px;">
                </div>
                <label for="nombre"></label><input type="file" class="form-control" name="carta_inicial" id="carta_inicial" />
            </div>
        </div>
        <br>
        <div class="col-6 mb-15">
            <label for="fkidtipo_tramite">Tipo de Tramite </label>
            <label for="fkidtipo_tramite"></label><select name="fkidtipo_tramite" id="fkidtipo_tramite" class="form-control select2" required>
                <option value="">
                    --SELECCIONAR--
                </option>
                @foreach ($tipoTramites as $tipoTramite)
                    <option value="{{ $tipoTramite->idtipo_tramite }}">
                        {{ $tipoTramite->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6 mb-15">
            <label for="fkidestudiante"> Estudiante </label>
            <label for="fkidestudiante"></label><select name="fkidestudiante" id="fkidestudiante" class="form-control select2" required>
                <option value="">
                    --SELECCIONAR--
                </option>
                @foreach ($estudiantes as $estudiante)
                    <option value="{{ $estudiante->idestudiante }}">
                        {{ $estudiante->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6 mb-15">
            <label for="fkidtecnico"> Tecnico </label>
            <label for="fkidtecnico"></label><select name="fkidtecnico" id="fkidtecnico" class="form-control select2" required>
                <option value="">
                    --SELECCIONAR--
                </option>
                @foreach ($tecnicos as $tecnico)
                    <option value="{{ $tecnico->idtecnico }}">
                        {{ $tecnico->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <button type="submit" class="button button-primary button-sm">Registrar Tramite</button>
        <a class="button button-danger button-sm" href="{{ route('tramite.index') }}">Cancelar</a>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
        console.log("HOlamundo")
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

<div class="modal fade" id="exampleModal5">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                


                <h5 class="modal-title">Formulario de Registro</h5>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form action="{{route('permisos.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre del Permiso:</label>
                        <input type="text" name="nombre" class="form-control" id="recipient-name" autofocus>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="button button-primary" type="submit">Registrar</button>
            </div>
           </form>

        </div>
    </div>
</div>
<div class="box-body">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal3">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulario de Modificacion</h5>
                    <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
         <form action="{{route('permisos.update','update')}}" method="POST">
             @method('PUT')
             @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre del Permiso:</label>
                        <input type="text" name="name" class="form-control" id="nombre1" autofocus>
                        <input type="hidden" name="id" id="id1">
                    </div>
                    <div class="modal-footer">
                            <button class="button button-primary">Guardar Cambios</button>
                        </div>
        </form>
                </div>
              
            </div>
        </div>
    </div>
</div>
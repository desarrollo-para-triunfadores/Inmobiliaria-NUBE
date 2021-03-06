<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar servicio</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form action="/admin/servicios" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input name="nombre" type="text" maxlength="50" class="form-control" title="nombre del servicio" placeholder="campo requerido" required>
                        <br>
                        <label>Descripcion:</label>
                        <input name="descripcion" type="text" maxlength="200" class="form-control" placeholder="campo opcional" title="breve descripción del servicio">
                    </div>
                    <br>

                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar servicio</button>
            </div>
        </div>          
    </div>
</div>
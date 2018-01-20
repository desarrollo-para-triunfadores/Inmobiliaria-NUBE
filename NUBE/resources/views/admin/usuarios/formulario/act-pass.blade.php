<div class="modal fade" id="modal-act-pass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar usuario</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form action="{{'/usuarios/actpass/'.Auth::user()->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del perfil</h3>
                    <br>                               
                    <div class="form-group">
                        <label>Password actual:</label>
                        <input name="password_actual" type="password" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                    <div class="form-group">
                        <label>Nuevo password:</label>
                        <input name="password" type="password" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmar nuevo password:</label>
                        <input name="password_confirmation" type="password" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                    <button id="boton_submit_update_pass" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="$('#boton_submit_update_pass').click()">actualizar usuario</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>
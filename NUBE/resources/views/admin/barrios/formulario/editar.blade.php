<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar barrio</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form id="form-update" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">                       
                        <label>Nombre:</label>
                        <input name="nombre" id="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>  
                    <div class="form-group">                       
                        <label>Localidad:</label>
                        <select name="localidad_id" id="localidad_id" type="select" maxlength="50" class="form-control" placeholder="campo requerido" required>
                            @foreach($localidades as $localidad)
                            <option value="{{$localidad->id}}" selected="selected">{{$localidad->nombre}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>¿Es un barrio privado?</label>&nbsp;
                        <input type="checkbox" data-toggle="toggle" name="privado" id="privado" data-on="<b>Si</b>" data-off="<b>No</b>">
                    </div>              
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="$('#boton_submit_update').click()">actualizar barrio</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>
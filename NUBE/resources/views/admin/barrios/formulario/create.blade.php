<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar barrio</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form action="/admin/localidades" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">                       
                        <label>Nombre:</label>
                        <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>  
                    <div class="form-group">                       
                        <label>Localidad:</label>
                        <select name="localidad_id" type="select" maxlength="50" class="form-control" placeholder="campo requerido" required>
                            @foreach($localidades as $localidad)
                            <option value="{{$localidad->id}}" selected="selected">{{$localidad->nombre}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>¿Es un barrio privado?</label>&nbsp;
                        <input type="checkbox" data-toggle="toggle" name="privado" data-on="<b>Si</b>" data-off="<b>No</b>">
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar barrio</button>
            </div>
        </div>          
    </div>
</div>
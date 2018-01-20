<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar Localidad</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form action="/admin/proyectos" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <select name="tipo_id" type="select" maxlength="50" class="form-control" placeholder="campo requerido" required>
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}" selected="selected">{{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label>Direccion:</label>
                        <input name="direccion" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                        <br>
                        <label>Descripciones:</label>
                        <textarea name="descripcion1" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required></textarea>
                        <textarea name="descripcion2" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required></textarea>
                        <br>
                        <label>Localidad:</label>
                        <select name="localidad_id" type="select" maxlength="50" class="form-control" placeholder="campo requerido" required>
                            @foreach($localidades as $localidad)
                                <option value="{{$localidad->id}}" selected="selected">{{$localidad->nombre}}</option>
                            @endforeach
                        </select>
                        <label>Imagen promocional:</label>
                        <input id="foto_presentacion" name="foto_presentacion" type="file" title="imagen que aparecerá en miniatura en index (440x330)" class="form-control" placeholder="Resolucion óptima 440x330" >
                    </div>
                    <br>

                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">Registrar Proyecto</button>
            </div>
        </div>          
    </div>
</div>
<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar localidad</h4>
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
                        <label>Provincia:</label>
                        <select style="width: 100%"  name="provincia_id" placeholder="campo requerido"  class="select2 form-control">
                            @foreach($provincias as $provincia)
                            <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>                                                    
                            @endforeach
                        </select> 
                    </div>  
                    <div class="form-group">
                        <label>Código postal:</label>
                        <input name="cod_postal" type="text" maxlength="5" class="form-control" placeholder="campo opcional">
                    </div>     
                    <br>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar localidad</button>
            </div>
        </div>          
    </div>
</div>
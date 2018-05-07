<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar evento</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form action="/admin/agenda_usuario" method="POST">
                    <input type="hidden"  id="token-create" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">
                        <label>Oportunidad vinculada:</label>
                        <select style="width: 100%"  name="oportunidad_id" placeholder="campo requerido"  class="select2 form-control" required>
                            <option value=""></option>
                            @foreach($oportunidades as $oportunidad)
                                <option value="{{$oportunidad->id}}">{{$oportunidad->nombre_interesado}} - {{$oportunidad->inmueble->direccion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Asunto:</label>
                        <input name="title" id="title" type="text" maxlength="50" class="form-control" placeholder="campo opcional" >
                    </div>                    
                    <div class="form-group">
                        <label>Inicio:</label>
                        <div class='input-group date datetimepicker' >                            
                            <input name="start" id="start" type="text" placeholder="campo requerido" class="form-control datepicker">                                              
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fin:</label>
                        <div class='input-group date datetimepicker' >
                            <input name="end" type="text" placeholder="campo opcional" class="form-control datepicker" required>                            
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>                   
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar evento</button>
            </div>
        </div>          
    </div>
</div>
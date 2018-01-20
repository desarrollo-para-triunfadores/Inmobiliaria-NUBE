<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar evento/visita</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form action="/admin/agenda" method="POST">
                    <input type="hidden"  id="token-create" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <!--Oportunidad Vinculada-->
                    <div class="form-group">
                        <label>Oportunidad vinculada:</label>
                        <select style="width: 100%"  name="oportunidad_id" id="oportunidad_id" placeholder="campo opcional"  class="select2 form-control">
                            <option value=""></option>
                            @foreach($oportunidades as $oportunidad)
                                <option value="{{$oportunidad->id}}">{{$oportunidad->nombre_interesado}} - {{$oportunidad->inmueble->direccion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--Datos de Evento (Visita en agenda)-->
                    <div class="form-group">
                        <label>Asunto:</label>
                        <input name="titulo" id="titulo" type="text" maxlength="50" class="form-control" placeholder="campo opcional" >
                    </div>                    
                    <div class="form-group">
                        <label>Inicio:</label>
                        <div class='input-group date datetimepicker' >
                            <input name="inicio" id="create-inicio" type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fin:</label>
                        <div class='input-group date datetimepicker' >
                            <input name="fin" type='text' placeholder="campo opcional" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Color:</label>
                        <div class="input-group my-colorpicker2 colorpicker-element">
                            <input name="color" placeholder="haga click en el recuadro de la derecha para seleccionar un color." class="form-control" required type="text">
                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div>
                    </div>

                    <br>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">Registrar evento/visita</button>
            </div>
        </div>          
    </div>
</div>
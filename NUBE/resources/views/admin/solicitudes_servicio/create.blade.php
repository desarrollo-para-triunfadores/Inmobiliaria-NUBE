<div class="modal fade" id="modal-nueva-peticion-servicio">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar evento/visita</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                
                <form action="/admin/solicitudes_servicio" method="POST">
                    <input type="hidden"  id="token-create" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <!--Rubro que requiere el servicio tecnico-->
                    <?php
                        $rubrosTecnicos = App\RubroTecnico::all();
                        $tecnicos = App\Tecnico::all();  
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">                                           
                                <label>Rubro:</label>
                                <select style="width: 100%"  name="rubrotecnico_id" id="rubrotecnico_id" placeholder="campo obligatorio"  class="select2 form-control">
                                    <option value=""></option>
                                    @foreach($rubrosTecnicos as $rubro)
                                        <option value="{{$rubro->id}}">{{$rubro->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                         <div class="col-md-8">
                            <div class="form-group">                                           
                                <label>¿Tiene preferencia por algun técnico?:</label>
                                <select style="width: 90%"  name="tecnico_id" id="tecnico_id" placeholder="campo obligatorio"  class="select2 form-control">
                                    <option value=""></option>
                                    @foreach($tecnicos as $tecnico)
                                        <option value="{{$tecnico->id}}"><b>{{$tecnico->persona->nombreCompleto}}</b>  |  {{$tecnico->persona->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                    </div>
                    
                    <!--Acerca del inmueble (contrato) de solicitud -->
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Inmueble:</label>
                                <select style="width: 100%"  name="contrato_id" id="contrato_id" placeholder="campo obligatorio"  class="select2 form-control">
                                    <option value=""></option>
                                    @foreach($contratos as $contrato)
                                        <option value="{{$contrato->id}}">{{$contrato->inmueble->direccion}} (Depto: {{$contrato->inmueble->piso}}-{{$contrato->inmueble->numDepto}})  ||   inquilino actual: {{ $contrato->inquilino->persona->nombreCompleto }}  </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                       
                    </div>
                    <!--Datos de Evento (Visita en agenda)-->                     
                    <div class="row">
                        <div class="col-md-4">       
                            <div class="form-group">
                                <label>Inicio:</label>
                                <div class='input-group date datetimepicker'>                            
                                    <input name="inicio" id="create-inicio" type="text" placeholder="campo requerido" class="form-control datepicker">                         
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                        <label>Fin:</label>
                        <div class='input-group date datetimepicker' >
                                <input name="fin" id="fin" type="text" placeholder="campo requerido" class="form-control datepicker disable">                            
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>       
            <div class="form-group">
                <label>Asunto:</label>
                <input name="titulo" id="titulo" type="text" maxlength="50" class="form-control" placeholder="campo opcional" >
            </div>    
            <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
        </form>    
    </div>
    <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">Registrar Visita</button>
     </div>
 </div>          
    </div>
</div>



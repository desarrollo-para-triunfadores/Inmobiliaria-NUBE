{{--
<div class="modal fade" id="modal-editar-ss">
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
                    'tecnico_id', 
                    'contrato_id',
                    'responsable', 
                    'rubrotecnico_id',
                    'liquidacionmensual_id',
                    'motivo',
                    'estado',
                    'monto_final',
                    'fecha_cierre'
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">                                           
                                <label>Rubro:</label>
                                <select style="width: 100%"  name="rubrotecnico_id" id="rubrotecnico_id" placeholder="campo obligatorio"  class="select2 form-control">
                                    <option value=""></option>
                                   
                                </select>
                            </div>
                         </div>
                         <div class="col-md-8">
                            <div class="form-group">                                           
                                <label>Asignada a:</label>
                                <select style="width: 90%"  name="tecnico_id" id="tecnico_id" placeholder="campo obligatorio"  class="select2 form-control">
                                    <option value=""></option>
                                    
                                </select>
                            </div>
                         </div>
                    </div>
                           
                    <hr>
                    <!--Estado de solicitud-->                     
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">                                           
                                <label>Estado actual:</label>
                                <select style="width: 90%"  name="estado" id="estado" placeholder="campo obligatorio"  class="select2 form-control">
                                    <option value="inicial">Inicial</option>
                                    <option value="tomada">Tomada</option>
                                    <option value="concluida">Concluida</option>
                                    <option value="finalizada">Finalizada</option>                                    
                                </select>
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
                    <hr>
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
--}}


<div class="modal fade" id="modal-show">
    <div class="modal-dialog modal-lg" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Detalle del evento</h4>
            </div>
            <div class="modal-body">
                <form id="form-update" action="" method="POST" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">                                                                                                                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asunto:</label>
                                <span id="show_asunto" class="form-control"></span>                                               
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Horario inicio</label>
                                <span id="show_horario_inicio" class="form-control"></span>                   
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Horario fin</label>
                                <span id="show_horario_fin" class="form-control"></span>                   
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Inmueble:</label>
                                <span id="show_inmueble" class="form-control"></span>                               
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Solicitante:</label>
                                <span id="show_solicitante" class="form-control"></span>                               
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Técnico:</label>
                                <span id="show_tecnico" class="form-control"></span>                
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado:</label>
                                <span id="show_estado" class="form-control"></span>                
                            </div>
                        </div>                    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Motivo inicial:</label>
                                <textarea id="show_motivo" class="form-control" rows="3" disabled></textarea>                                                           
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observaciones:</label>
                                <textarea id="observacion" name="observacion" class="form-control" rows="5" disabled></textarea>                                                           
                            </div>
                        </div>
                        <input name="realizada" id="realizada" value="" type="text" class="hide" disabled>  
                        <input name="confirmada" id="confirmada" value="1" type="text" class="hide" disabled>                                                                         
                    </div>
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>

                @if(is_null(Auth::user()->persona->tecnico))
                <button type="button" onclick="$('#boton_submit_update').click()" class="btn-actualizar btn btn-success pull-right">                    
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> confirmar cita
                </button>
                <button type="button" onclick="marcar_rechazo()" class="btn-actualizar btn btn-danger pull-right">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> rechazar cita
                </button>
                @else
                <button type="button" onclick="marcar_realizada(1)" class="btn-actualizar btn btn-success pull-right">
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> actualizar y marcar como realizada
                </button>
                <button type="button" onclick="marcar_realizada(0)" class="btn-actualizar btn btn-danger pull-right">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> actualizar y marcar como no realizada
                </button>
                <button type="button" onclick="$('#boton_submit_update').click()" class="btn-actualizar btn btn-warning pull-left">                    
                    <i class="fa fa-pencil" aria-hidden="true"></i> actualizar datos
                </button>
                @endif              
            </div>
        </div>
    </div>
</div>
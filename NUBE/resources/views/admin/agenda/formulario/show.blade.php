<div id="modal-show" class="modal fade">
    <div class="modal-dialog modal-info modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Detalle evento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asunto</label>
                            <p id="show-asunto" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <!-- parafo invisible con id de visita (no borrar) -->
                            <p id="visita_id" class="hide" style="margin-top: 10px;">
                            <input id="show-visita_id" value="show-visita_id" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Horario</label>
                            <p id="show-inicio" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">                              
                            </p>
                        </div>
                    </div>         
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Inmueble</label>
                            <p id="show-inmueble" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">                              
                            </p>
                        </div>
                    </div>                          
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Interesado</label>
                            <p id="show-interezado" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">                              
                            </p>
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <p id="show-telefono" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">                              
                            </p>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <p id="show-email" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">                              
                            </p>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mensaje inicial:</label>
                            <p id="show-mensaje" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">                              
                            </p>                   
                        </div>  
                    </div>
                    <div class="col-md-12" id="formulario-asistio">
                        <div class="form-group">
                            <label>El interesado asistió:</label>
                            <input type="checkbox" id="show-asistio" name="show-asistio"  data-toggle="toggle" data-on="Si" data-off="No" style="margin-top: 10px;">
                        </div>
                    </div>
                </div>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" id="btn-actualizar" class="btn btn-default pull-right" onclick="actualizarAsistencia($('#visita_id').text())">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
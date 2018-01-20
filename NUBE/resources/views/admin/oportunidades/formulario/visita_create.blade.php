<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Parámetros de búsqueda</h4>
            </div>
            <div class="modal-body">
                <form action="/buscar_turnos" method="GET">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                                              
                    <div class="form-group">
                        <label>Fecha de interés:</label>
                        <input name="fecha" type="text" placeholder="campo requerido" class="form-control pull-right datepicker">                                                                
                    </div>

                    <button id="boton_submit_crear" type="submit" class="btn hide btn-primary"></button>
                </form>
                <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">buscar</button>
            </div>
        </div>          
    </div>
</div>
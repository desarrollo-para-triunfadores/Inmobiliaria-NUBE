<div id="modal-borrar" class="modal fade modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Eliminar localidad</h4>
            </div>
            <div class="modal-body">
                <form id="form-borrar" action="" method="POST" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h4 class="box-heading">¡Alerta de acción permanente!</h4>
                    <p>Usted está a punto de proceder con la eliminación permanente del registro seleccionado. Si se encuentra completamente seguro prosiga con la acción.</p>
                    <button id="boton_submit_borrar" type="submit" class="btn btn-primary hide"></button>
                </form> 
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-outline" onclick="$('#boton_submit_borrar').click()">eliminar localidad</button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="boton-modal-borrar" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-borrar"></button>

<div id="modal-elemento-seleccionado" class="modal fade modal-warning">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">¡Atención!</h4>
            </div>
            <div class="modal-body">
                <form id="form-borrar" action="" method="POST" accept-charset="UTF-8">                  
                    <h4 class="box-heading">Elemento ya seleccionado</h4>
                    <p>El elemento que intenta agregar ya se encuentra seleccionado en su lista.</p>
                    <button id="boton_submit_borrar" type="submit" class="btn btn-primary hide"></button>
                </form> 
                <br>      
            </div>
            <div class="modal-footer">
                <button id="boton-cerrar-elemento-seleccionado" class="hide" data-dismiss="modal"></button>
                <button type="button" class="btn btn-outline" onclick="cerrar_modal_amarillo();" data-dismiss="modal">volver</button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="boton-modal-elemento-seleccionado" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-elemento-seleccionado"></button>

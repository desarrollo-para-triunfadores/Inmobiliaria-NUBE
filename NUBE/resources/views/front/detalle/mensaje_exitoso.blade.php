<div id="modal-mensaje-exitoso" class="modal fade modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Su mensaje fue enviado 👌🏻</h4>
            </div>
            <div class="modal-body">
                <form id="form-borrar" action="" method="POST" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h4 class="box-heading">Gracias</h4>
                    <p>Un agente de ventas contestara su mensaje a la brevedad, recuerde que puede ver éste y cualquier inmueble cuando lo desee.</p>
                    <button id="boton_submit_borrar" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Bien</button>
            </div>
        </div>
    </div>
</div>


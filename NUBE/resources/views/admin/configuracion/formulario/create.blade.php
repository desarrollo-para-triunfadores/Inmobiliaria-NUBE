<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar zona</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <h3>Detalles de la Zona</h3>
                <br>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input id="nombre" class="form-control" id="nombre"  type="text">
                </div>          
                <div class="form-group">
                    <label>Color:</label>
                    <div class="input-group my-colorpicker2 colorpicker-element">
                        <input id="color" placeholder="haga click en el recuadro de la derecha para seleccionar un color." class="form-control" type="text">
                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <textarea id="descripcion" class="form-control" rows="3" placeholder="breve descripción de no más de 140 caracteres."></textarea>
                </div>                                                                     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="enviar();">registrar zona</button>
            </div>
        </div>          
    </div>
</div>
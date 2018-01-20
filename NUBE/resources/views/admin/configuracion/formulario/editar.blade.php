<div class="modal fade" id="modal-editar-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar zona</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form id="form-update" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Detalles de la Zona</h3>
                    <br>             
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input name="nombre" id="nombre" class="form-control" type="text">
                    </div>          
                    <div class="form-group">
                        <label>Color:</label>
                        <div class="input-group my-colorpicker2 colorpicker-element">
                            <input name="color" id="color" placeholder="haga click en el recuadro de la derecha para seleccionar un color." class="form-control" type="text">
                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="breve descripción de no más de 140 caracteres."></textarea>
                    </div>   
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="$('#boton_submit_update').click()">actualizar zona</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>
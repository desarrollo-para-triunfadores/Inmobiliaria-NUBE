<div class="modal fade modal-danger" id="modal-enviar-email">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Enviar mensaje al interesado 📧</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form class="formarchivo form-horizontal" name="f_enviar_correo" method="POST" enctype="multipart/form-data" action="/admin/enviar_correo"  id="f_enviar_correo" >
                    <input type="hidden" name="_token" id="_token" value="<?= csrf_token(); ?>">

                    <div class="form-group">
                        <label class="control-label col-md-4" for="first_name">Firmar como:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="firma" name="firma" placeholder="Firma" value="Juan Rubio"/>
                        </div>
                    </div>
                    {{--
                    <div class="form-group">
                        <label class="control-label col-md-4" for="email">Tu correo electronico</label>
                        <div class="col-md-6 input-group">
                            <span class="input-group-addon">@</span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"/>
                        </div>
                    </div>
                    --}}
                    <div class="form-group">
                        <label class="control-label col-md-4" for="comment">Mensaje</label>
                        <div class="col-md-6">
                            <textarea rows="6" class="form-control" id="mensaje" name="mensaje" placeholder="Tu mensaje para el interesado"></textarea>
                        </div>
                        <label class="control-label col-md-4" for="comment">Adjuntar Archivo</label>
                        <div class="col-md-6">
                            <input type="file" class="email_archivo" id="file" name="file" placeholder="espacio para seleccionar un archivo adjunto al email"></input>
                        </div>
                        <div class="col-md-6" id="texto_notificacion">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="submit" id="btn-enviar-mail" value="Submit" class="btn btn-custom pull-right hide">Enviar</button>
                        </div>
                    </div>
                </form>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" id="email-cerrar" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="submit" class="btn btn-warning"><i class="fa fa-envelope-o"></i> Enviar</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>





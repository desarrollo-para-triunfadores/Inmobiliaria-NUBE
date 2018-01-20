<div id="modal-guardar-conf" class="modal fade modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Guardar configuración</h4>
            </div>
            <div class="modal-body">
                <form id="form-borrar" action="{{'/usuarios/actconf/'.Auth::user()->id}}" method="POST" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h4 class="box-heading">¡Atención!</h4>
                    <p>Está por registrar la configuración. Puede volver a este apartado y volver configurar cuando desee.</p>
                    <button id="boton_submit" type="submit" class="btn btn-primary hide"></button>              
                    <input id="latitud" type="hidden" name="latitud" value="{{ Auth::user()->configuracion->latitud }}">
                    <input id="longitud" type="hidden" name="longitud" value="{{ Auth::user()->configuracion->longitud }}">
                    <input id="zoom" type="hidden" name="zoom" value="{{ Auth::user()->configuracion->zoom }}">
                    <input id="color" type="hidden" name="color" value="{{ Auth::user()->configuracion->color }}">
                </form> 
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-outline" onclick="$('#boton_submit').click()">registrar configuración</button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="boton-modal-borrar" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-borrar"></button>

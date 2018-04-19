@if (isset($conversacion_abierta))
  <div class="box box-success direct-chat direct-chat-success">
    <div class="box-header with-border">
      <h3 class="box-title">{{$conversacion_abierta->obtener_usuario_restante()->user->name}}</h3>
      <div id="div_cabecera" class="box-tools pull-right">
        @include('admin.mensajes.secciones.cabecera_conversacion')           
      </div>
    </div>
    <div class="box-body" >
      <div id="div_chat" class="direct-chat-messages" style="height: 475px">
        @include('admin.mensajes.secciones.mensajes')
      </div>
    </div>
    <div class="box-footer">
        <div class="input-group">
          <input type="text" id="mensaje" onkeydown="cambiar_bandera_escritura(true)" placeholder="escribe un mensaje..." class="form-control">
            <span class="input-group-btn">
              <button type="button" onclick="enviar_mensaje()" class="btn btn-success btn-flat">enviar</button>              
            </span>
        </div>   
    </div>
  </div>
@else
  <br>
  <div class="col-md-12">
    <div class="alert alert-info alert-dismissible animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          Seleccione una conversación de la lista de conversaciones y aquí aparecerá.                                                           
    </div>
  </div>
@endif
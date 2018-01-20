<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar usuario</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form id="form-update" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input id="token-update" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Detalles de la Cuenta</h3>
                    <br>
                    <div class="form-group">
                        <label>Correo electrónico:</label>
                        <input id="update-email" name="email" type="email" maxlength="50" class="form-control" aria-describedby="emailHelp" placeholder="campo requerido" required>                            
                    </div>  
                    <div class="form-group">                        
                        <label>Rol de permisos</label>
                        <select name="rol_usuario" style="width: 100%" id="rol_usuario" class="select2 form-control form-control-sm">
                            @foreach($roles as $rol)                          
                            <option value="{{$rol->name}}">{{$rol->name}}</option>                                                         
                            @endforeach
                        </select> 
                        <p class="pull-left form-text text-muted"><strong>Información:</strong> el rol de permisos define que acciones podrá realizar este usuario en el sistema.</p>
                    </div>                      
                    <br>
                    <hr/>  
                    <br>                                         
                    <h3>Detalles del perfil</h3>
                    <br>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre completo:</label>
                        <input id="update-name" name="name" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>                                                            
                     <div class="form-group">
                       <label>Subir imagen de perfil:</label>
                        <div id="main-cropper_update" class="hide"></div>
                        <a class="button actionUpload-update">                   
                            <input type="file" id="imagen-update" value="Escoja una imagen" accept="image/*">
                        </a>                       
                        <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
                    </div>                     
                    <div class="form-group">
                        <label for="exampleInputFile">Tomar imagen de perfil desde la cámara:</label><br>
                        <div id="contenido_foto_update"></div> 
                        <button id="start_update"><i class="fa fa-camera-retro" aria-hidden="true"></i> &nbsp;Iniciar cámara</button> 
                        <video id="video_update" width="565" height="360" autoplay="true" class="hide"></video>
                        <canvas id="canvas_update" name="imagen2" type="file" width="1280" height="720" class="hide"></canvas>  
                                                   
                                
                        <button id="capture_update" class="hide"><i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;Capturar imágen</button>
                    </div>
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="mandar('update');">actualizar usuario</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>
<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar usuario</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form id="form-create" action="/admin/usuarios" method="POST" enctype="multipart/form-data">
                    <input id="token-create" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Detalles de la Cuenta</h3>
                    <br>
                    <div class="form-group">
                        <label>Correo electrónico:</label>
                        <input name="email" type="email" maxlength="50" class="form-control" aria-describedby="emailHelp" placeholder="campo requerido" required>                            
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input name="password"  type="password" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmar password:</label>
                        <input name="password_confirmation" type="password" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                    <div class="form-group">                        
                        <label>Rol de permisos</label>
                        <select name="rol_usuario" style="width: 100%" class="select2 form-control form-control-sm">
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
                        <input  name="name" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>                        
                    <div class="form-group">
                        <label>Subir imagen de perfil:</label>
                        <div id="main-cropper-imagen-nuevo" class="hide"></div>
                        <a class="button actionUpload-nuevo">                   
                            <input type="file" id="imagen-nuevo" value="Escoja una imagen" accept="image/*">
                        </a>                       
                        <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputFile">Tomar imagen de perfil desde la cámara:</label><br>
                        <div id="contenido_foto_nuevo"></div>       
                        <button id="start_nuevo"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; Iniciar cámara</button>   
                        <video id="video_nuevo" width="565" height="360" autoplay="true" class="hide"></video>
                        <canvas id="canvas_nuevo" name="imagen2" type="file" width="1280" height="720" class="hide"></canvas>  
                        <button id="capture_nuevo" class="hide"> <i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;Capturar imágen</button>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="mandar('create');">registrar usuario</button>
            </div>
        </div>          
    </div>
</div>


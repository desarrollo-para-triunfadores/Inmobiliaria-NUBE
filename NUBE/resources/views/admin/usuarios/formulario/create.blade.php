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
                    
                    @include('admin.usuarios.formulario.imagen_create')
                    
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


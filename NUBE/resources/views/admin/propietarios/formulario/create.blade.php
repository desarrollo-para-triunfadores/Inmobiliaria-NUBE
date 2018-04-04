<div class="modal fade" id="modal-crear">
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar propietario</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form id="form-create" action="/admin/propietarios" method="POST" enctype="multipart/form-data">
                    <input id="token-create" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">                                           
                        <div class="col-md-8">
                            <div class="control-group">
                                <label>Persona:</label>
                                <div class="controls">
                                    <select style="width: 100%"  name="persona_id" id="persona_id" class="select2 form-control" required>
                                        <option value="">-</option>
                                        @foreach($personas as $persona)
                                        <option value="{{$persona->id}}">{{$persona->NombreCompleto}}. DNI: {{$persona->dni}}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted"><strong>Información:</strong> si la persona aún no fue registrada puede hacerlo tildando la casilla: <b>Dar de alta a una persona</b> para habilitar el ingreso de datos para un nuevo registro.</small>
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-check">
                                <br>
                                <label class="form-check-label">
                                    <input type="checkbox" name="persona_nueva" onchange="mostrar_panel_persona()" id="garante_nuevo" class="form-check-input">
                                    Dar de alta a una persona
                                </label>
                            </div>
                        </div>  
                    </div>
                    <br>                                            
                    <div id="panel_persona_nueva" style="display: none;" class="row animated fadeIn">
                    <div class="col-md-7">
                        <h3>Información general</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Apellido/s:</label>
                                    <input name="apellido" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre/s</label>
                                    <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sexo:</label>
                                    <select style="width: 100%"  name="sexo"  placeholder="campo requerido"  class="select2 form-control">
                                        <option value="Femenino">Femenino</option>         
                                        <option value="Masculino">Masculino</option>   
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha de nacimiento:</label>
                                    <input name="fecha_nac" type="text" placeholder="campo requerido" class="form-control pull-right datepicker">                                                            
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Número de documento:</label>
                                    <input name="dni" type="number" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>País de origen:</label>
                                    <select style="width: 100%"  name="pais_id"  placeholder="campo requerido"  class="select2 form-control">
                                        @foreach($paises as $pais)
                                        <option value="{{$pais->id}}">{{$pais->nombre}}</option>                                                    
                                        @endforeach
                                    </select> 
                                </div>
                            </div>  
                        </div>                          
                        <br>
                        <hr/>  
                        <br>                                         
                        <h3>Contacto y dirección</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Teléfono:</label>
                                    <input name="telefono" type="tel" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Teléfono de contacto</label>
                                    <input name="telefono_contacto" type="tel" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                </div>
                            </div>   
                        </div>
                        <div class="row">      
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Localidad:</label>
                                    <select style="width: 100%"  name="localidad_id"  placeholder="campo requerido"  class="select2 form-control">
                                        @foreach($localidades as $localidad)
                                        <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>                                                    
                                        @endforeach
                                    </select> 
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input name="direccion" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                </div>
                            </div>                        
                        </div>  
                    </div>  
                    <div class="col-md-1">
                    </div>  
                    <div class="col-md-4">
                        @include('admin.propietarios.formulario.imagen_create') 
                    </div> 
                </div>
                <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
            </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="mandar('create');">registrar propietario</button>
            </div>
        </div>          
    </div>
</div>
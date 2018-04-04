<div class="modal fade" id="modal-update">
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar garante</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form id="form-update" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input id="token-update" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-7">
                            <h3>Información general</h3>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Apellido/s:</label>
                                        <input id="apellido" name="apellido"  type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre/s</label>
                                        <input id="nombre" name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sexo:</label>
                                        <select style="width: 100%"  id="sexo" name="sexo"  placeholder="campo requerido"  class="select2 form-control">
                                            <option value="Femenino">Femenino</option>         
                                            <option value="Masculino">Masculino</option>   
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento:</label>
                                        <input id="fecha_nac" name="fecha_nac" type="text" placeholder="campo requerido" class="form-control pull-right datepicker">                              
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número de documento:</label>
                                        <input id="dni" name="dni" type="number" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>País de origen:</label>
                                        <select style="width: 100%"  id="pais_id" name="pais_id" placeholder="campo requerido"  class="select2 form-control">
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
                                        <input name="telefono" id="telefono" type="tel" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Teléfono de contacto</label>
                                        <input id="telefono_contacto" name="telefono_contacto" type="tel" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" name="email" type="email" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Localidad:</label>
                                        <select style="width: 100%" id="localidad_id" name="localidad_id"  placeholder="campo requerido"  class="select2 form-control">
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
                                        <input id="direccion" name="direccion" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                                    </div>
                                </div>                        
                            </div>  
                        </div>  
                        <div class="col-md-1">
                        </div>  
                        <div class="col-md-4">
                            @include('admin.garantes.formulario.imagen_update')
                        </div> 
                    </div>
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="mandar('update');">actualizar garante</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>
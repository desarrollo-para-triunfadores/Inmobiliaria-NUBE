<legend>Garante</legend>
<div class="row">                                           
    <div class="col-md-8">
        <div class="control-group">
            <label>Garante del inmueble:</label>
            <div class="controls">
                <select style="width: 100%"  name="garante_id" id="garante_id" class="select2 form-control" required>
                    <option></option>
                    @foreach($garantes as $garante)
                        <option value="{{$garante->id}}">{{$garante->NombreCompleto}} | DNI: {{$garante->dni}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted"><strong>Información:</strong> si el garante aún no fue registrado puede hacerlo tildando la casilla: <b>Dar de alta a un garante</b> para habilitar el ingreso de datos para el nuevo garante.</small>
            </div>
        </div>
    </div>   
    <div class="col-md-4">
        <div class="form-check">
            <br>
            <label class="form-check-label">
                <input type="checkbox" name="garante_nuevo" onchange="mostrar_panel_garante()" id="garante_nuevo" class="form-check-input">
                Dar de alta a un garante
            </label>
        </div>
    </div>  
</div>
<br>
<div id="panel_garante_nuevo" style="display: none;" class="row animated fadeIn">
    <div class="col-md-7">
        <hr/>  
        <h3>Información general</h3>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label>Apellido/s:</label>
                    <div class="controls">
                        <input name="garante_apellido" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                </div>
            </div>  
            <div class="col-md-6">
                <div class="control-group">
                    <label>Nombre/s</label>
                    <div class="controls">
                        <input name="garante_nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label>Sexo:</label>
                    <div class="controls">
                        <select style="width: 100%"  name="garante_sexo"  placeholder="campo requerido"  class="select2 form-control">
                            <option value="Femenino">Femenino</option>         
                            <option value="Masculino">Masculino</option>   
                        </select> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="control-group">
                    <label>Fecha de nacimiento:</label>
                    <div class="controls">
                        <input name="garante_fecha_nac" type="text" placeholder="campo requerido" class="form-control pull-right datepicker"> 
                    </div>

                </div>
            </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label>Número de documento:</label>
                    <div class="controls">
                        <input name="garante_dni" type="number" maxlength="8" max="99999999" class="form-control" placeholder="campo requerido" required>                            
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="control-group">
                    <label>País de origen:</label>
                    <div class="controls">
                        <select style="width: 100%"  name="garante_pais_id"  placeholder="campo requerido"  class="select2 form-control">
                            @foreach($paises as $pais)
                            <option value="{{$pais->id}}">{{$pais->nombre}}</option>                                                    
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>  
        </div>                          
        <br>
        <hr/>  
        <h3>Contacto y dirección</h3>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label>Teléfono:</label>
                    <div class="controls">
                        <input name="garante_telefono" type="tel" maxlength="30" class="form-control" placeholder="campo requerido" required>
                    </div>

                </div>
            </div>  
            <div class="col-md-6">
                <div class="control-group">
                    <label>Teléfono de contacto</label>
                    <div class="controls">
                        <input name="garante_telefono_contacto" type="tel" maxlength="30" class="form-control" placeholder="campo requerido" required>                            
                    </div>

                </div>
            </div>   
        </div>
        <br>
        <div class="row">      
            <div class="col-md-6">
                <div class="control-group">
                    <label>Email</label>
                    <div class="controls">
                        <input name="garante_email" type="email" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                    </div>

                </div>
            </div> 
            <div class="col-md-6">
                <div class="control-group">
                    <label>Localidad:</label>
                    <div class="controls">
                        <select style="width: 100%"  name="garante_localidad_id"  placeholder="campo requerido"  class="select2 form-control">
                            @foreach($localidades as $localidad)
                            <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>                                                    
                            @endforeach
                        </select> 
                    </div>
                </div>
            </div>  
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label>Dirección</label>
                    <div class="controls">
                        <input name="garante_direccion" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                    </div>
                </div>
            </div>                        
        </div>
        <br>
    </div>  
    <div class="col-md-1">
    </div>  
    <div class="col-md-4">
        @include('admin.contratos.formulario.secciones_wizard.imagen_garante_create')
    </div> 
</div>    
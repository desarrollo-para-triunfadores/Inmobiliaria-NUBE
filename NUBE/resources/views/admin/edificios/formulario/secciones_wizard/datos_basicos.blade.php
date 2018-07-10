<legend>Datos básicos</legend>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="row">          
            <div class="col-md-12">
                <div class="control-group">
                    <label>Nombre del complejo:</label>
                    <div class="controls">
                        @if (isset($edificio))                                                                                                                                    
                        <input name="nombre" type="text" maxlength="50" value="{{$edificio->nombre}}" class="form-control" placeholder="campo requerido" required>                                                              
                        @else
                        <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                        @endif                        
                    </div>
                </div>
            </div>            
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label>Cant. pisos:</label>
                    <div class="controls">                                                    
                        @if (isset($edificio))                                                                                                                                                                
                        <input name="cant_pisos" type="number" value="{{$edificio->cant_pisos}}" max="50" min="0" class="form-control" data-toggle="tooltip" data-placement="bottom" title="cantidad de pisos en total que posee el edificio" placeholder="campo requerido" required>
                        @else
                        <input name="cant_pisos" type="number" max="50" min="0"  class="form-control" data-toggle="tooltip" data-placement="bottom" title="cantidad de pisos en total que posee el edificio" placeholder="campo requerido" required>
                        @endif                        
                    </div>
                </div>
            </div>  
            <div class="col-md-6">
                <div class="control-group">
                    <label>Cant. departamentos:</label>
                    <div class="controls">                                                    
                        @if (isset($edificio))                                                                                                                                                                
                        <input name="cant_deptos" type="number" value="{{$edificio->cant_deptos}}"  max="150" min="1"  class="form-control" data-toggle="tooltip" data-placement="bottom" title="cantidad de departamentos en total que posee el edificio" placeholder="campo requerido" required>
                        @else
                        <input name="cant_deptos" type="number"  max="150" min="1"  class="form-control" data-toggle="tooltip" data-placement="bottom" title="cantidad de departamentos en total que posee el edificio" placeholder="campo requerido" required>
                        @endif                        
                    </div>
                </div>
            </div>  
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label>Inauguración:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                                                                                                                                                    
                            @if (isset($edificio) && $edificio->fecha_habilitacion)                                                            
                            <input name="fecha_habilitacion" type="text" placeholder="campo opcional" value="{{$edificio->FechaHabilitacionFormateado}}" class="form-control pull-right datepicker">                                                           
                            @else
                            <input name="fecha_habilitacion" type="text" placeholder="campo opcional" class="form-control pull-right datepicker">
                            @endif                                                                                     
                        </div>
                    </div>
                </div>
            </div>                     
        </div>       
        <br><br>             
    </div>
    <div class="col-md-6">
        <div class="row">          
            <div class="col-md-12">            
                @if (isset($edificio))                                                                                                                                                                
                @include('admin.edificios.formulario.secciones_wizard.imagen_update')
                @else
                @include('admin.edificios.formulario.secciones_wizard.imagen_create')
                @endif
            </div>            
        </div>
        <br>                          
    </div>
</div>
<legend>
        Otros datos
</legend>
<div class="row">
    <div class="col-md-12">
        <label class="checkbox-inline"><input name="administrado_por_sistema" id="administrado_por_sistema" type="checkbox" value="1"><b>Edificio administrado por el sistema</b></label>
        <label class="checkbox-inline"><input name="posee_ascensores" id="posee_ascensores" onchange="desabilitar_input('posee_ascensores')" type="checkbox"><b>¿El complejo posee ascensores funcionales en su instalación?</b></label>                
    </div>
</div>
<br>
<div class="row posee_ascensores hide animated fadeIn">
    <div class="col-md-4">
            <div class="control-group">
                <label>Cantidad ascensores:</label>
                <div class="controls">                      
                @if (isset($edificio) && $edificio->cant_ascensores)                                                                                                                                  
                    <input name="cant_ascensores" type="number" max="50" min="1" class="form-control" value="{{$edificio->cant_ascensores}}" placeholder="escriba aquí la cantidad" required>                    
                @else
                    <input name="cant_ascensores" type="number" max="50" min="1" class="form-control" placeholder="escriba aquí la cantidad" required>                    
                @endif                                         
                </div>
            </div>
        </div>
    <div class="col-md-4">
        <div class="control-group">
            <label>Costo de mantenimiento de ascensores:</label>
            <div class="controls">                                           
                @if (isset($edificio) && $edificio->costo_mant_ascensores)                                                                                                                        
                    <input name="costo_mant_ascensores" type="number" max="1000000" min="0" value="{{$edificio->costo_mant_ascensores}}" class="form-control" placeholder="escriba aquí el monto" required>                    
                @else
                    <input name="costo_mant_ascensores" type="number" max="1000000" min="0" class="form-control" placeholder="escriba aquí el monto" required>                    
                @endif                 
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="control-group">
            <label>Valor ascensores:</label>
            <div class="controls">                
                @if (isset($edificio) && $edificio->valor_ascensores)                                                                                                                             
                    <input name="valor_ascensores" type="number" max="100000000" min="0" class="form-control" value="{{$edificio->valor_ascensores}}" placeholder="escriba aquí el monto" required>                    
                @else
                    <input name="valor_ascensores" type="number" max="100000000" min="0" class="form-control" placeholder="escriba aquí el monto" required>                    
                @endif            
            </div>
        </div>
    </div>       
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <div class="control-group">
            <label>Costo seguro:</label>
            <div class="controls">                                                                  
                <div class="input-group">
                    <span class="input-group-addon">                    
                        <input type="checkbox" id="costo_seguro" onchange="desabilitar_input('costo_seguro')">
                    </span>

                    @if (isset($edificio) && $edificio->costo_seguro)                                                                                                                
                        <input name="costo_seguro" type="number" max="100000000" min="1" value="{{$edificio->costo_seguro}}" class="form-control costo_seguro" placeholder="escriba aquí el monto" required disabled>                    
                    @else
                        <input name="costo_seguro" type="number" max="100000000" min="1" class="form-control costo_seguro" placeholder="escriba aquí el monto" required disabled>                    
                    @endif 

                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="control-group">
            <label>Costo limpieza:</label>
            <div class="controls">                                                                  
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" id="costo_limpieza" onchange="desabilitar_input('costo_limpieza')">
                    </span>
                    @if (isset($edificio) && $edificio->costo_limpieza) 
                        <input name="costo_limpieza" type="number" max="100000000" min="1" value="{{$edificio->costo_limpieza}}" class="form-control costo_limpieza" placeholder="escriba aquí el monto" required disabled>                    
                    @else
                        <input name="costo_limpieza" type="number" max="100000000" min="1" class="form-control costo_limpieza" placeholder="escriba aquí el monto" required disabled>                    
                    @endif                     
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="control-group">
            <label>Sueldo del personal:</label>
            <div class="controls">                                                                  
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" id="costo_sueldos_personal" onchange="desabilitar_input('costo_sueldos_personal')">
                    </span>
                    @if (isset($edificio) && $edificio->costo_sueldos_personal)                 
                        <input name="costo_sueldos_personal" value="{{$edificio->costo_sueldos_personal}}" type="number" max="100000000" min="1" class="form-control costo_sueldos_personal" placeholder="escriba aquí el monto" required disabled>                  
                    @else
                        <input name="costo_sueldos_personal" type="number" max="100000000" min="1" class="form-control costo_sueldos_personal" placeholder="escriba aquí el monto" required disabled>                  
                    @endif                       
                </div>
            </div>
        </div>
    </div>       
</div>
<br>
<div class="row">
    <div class="col-md-4">       
        <label class="checkbox-inline"><input name="cochera" id="cochera"  value="1" type="checkbox"><b>¿Posee cocheras?</b></label>                   
    </div>
</div>
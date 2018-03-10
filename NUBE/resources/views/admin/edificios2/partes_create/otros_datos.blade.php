<legend>
        Otros datos
</legend>
<div class="row">
    <div class="col-md-12">
        <label class="checkbox-inline"><input name="administrado_por_sistema" type="checkbox" value="1"><b>Edificio administrado por el sistema</b></label>
        <label class="checkbox-inline"><input name="sujeto_a_gastos_compartidos" type="checkbox"><b>Sujeto a gastos compartidos con los demás inquilinos del edificio</b></label>
        <label class="checkbox-inline"><input name="posee_ascensores" id="posee_ascensores" onchange="desabilitar_input('posee_ascensores', 'ascensor')" type="checkbox"><b>¿El complejo posee ascensores funcionales en su instalación?</b></label>                
    </div>
</div>
<br>
<div class="row ascensor hide animated fadeIn">
    <div class="col-md-4">
            <div class="control-group">
                <label>Cantidad ascensores:</label>
                <div class="controls">                                                                  
                    <input name="cant_ascensores" type="number" maxlength="50" class="form-control" placeholder="escriba aquí la cantidad" required>                    
                </div>
            </div>
        </div>
    <div class="col-md-4">
        <div class="control-group">
            <label>Costo de mantenimiento de ascensores:</label>
            <div class="controls">                                                                  
                <input name="costo_mant_ascensores" type="number" maxlength="50" class="form-control" placeholder="escriba aquí el monto" required>                    
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="control-group">
            <label>Valor ascensores:</label>
            <div class="controls">                                                                  
                <input name="valor_ascensores" type="number" maxlength="50" class="form-control" placeholder="escriba aquí el monto" required>                    
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
                        <input type="checkbox" id="costo_seguro" onchange="desabilitar_input('costo_seguro', 'costo_seguro')">
                    </span>
                    <input name="costo_seguro" type="number" maxlength="50" class="form-control costo_seguro" placeholder="escriba aquí el monto" required disabled>                    
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
                        <input type="checkbox" id="costo_limpieza" onchange="desabilitar_input('costo_limpieza', 'costo_limpieza')">
                    </span>
                    <input name="costo_limpieza" type="number" maxlength="50" class="form-control costo_limpieza" placeholder="escriba aquí el monto" required disabled>                    
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
                        <input type="checkbox" id="costo_sueldos_personal" onchange="desabilitar_input('costo_sueldos_personal', 'costo_sueldos_personal')">
                    </span>
                    <input name="costo_sueldos_personal" type="number" maxlength="50" class="form-control costo_sueldos_personal" placeholder="escriba aquí el monto" required disabled>                    
                </div>
            </div>
        </div>
    </div>       
</div>
<br>
<div class="row">
    <div class="col-md-4">       
        <label class="checkbox-inline"><input name="cochera" value="1" type="checkbox"><b>¿Posee cocheras?</b></label>                   
    </div>
</div>
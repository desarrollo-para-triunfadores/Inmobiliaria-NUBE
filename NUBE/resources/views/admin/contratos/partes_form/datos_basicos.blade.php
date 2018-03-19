<legend>Datos básicos</legend>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">             
                <div class="control-group">
                    <label>Inmueble:</label>
                    <div class="controls">
                        <select style="width: 100%"  name="inmueble_id" id="inmueble_id"  placeholder="campo requerido" class="select2 form-control">                            
                            <option></option>
                            @if (count($casas) > 0)
                                <optgroup label="Casas">
                                    @foreach($casas as $casa)
                                        <option objeto="{{$casa}}" value="{{$casa->id}}">Dirección: {{$casa->direccion}} ({{$casa->localidad->nombre}}, {{$casa->localidad->provincia->nombre}})</b></option>
                                    @endforeach
                                </optgroup>
                            @endif                            
                            @if (count($departamentos) > 0)
                                <optgroup label="Departamentos">
                                    @foreach($departamentos as $departamento)
                                        <option objeto="{{$departamento}}" edificio-sistema="{{$departamento->edificio->administrado_por_sistema}}" value="{{$departamento->id}}">Edificio: {{$departamento->edificio->nombre}} | Piso:{{$departamento->piso}} | Num.Depto.: {{$departamento->numDepto}} | Dirección:{{$departamento->direccion}} ({{$departamento->localidad->nombre}}, {{$departamento->localidad->provincia->nombre}})</b></option>
                                    @endforeach
                                </optgroup>	
                            @endif                           	                                                                                             
                        </select>
                    </div>
                </div>           
            </div>       
            <div class="col-md-2">
                <div class="control-group">
                    <label>En vigencia desde:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            @if (isset($contrato))
                                <input name="fecha_desde" id="fecha_desde" value="{{$contrato->fechadesdeformateado}}" type="text" placeholder="campo requerido" class="form-control datepicker_desde" required>
                            @else
                                <input name="fecha_desde" id="fecha_desde"type="text" placeholder="campo requerido"  class="form-control datepicker_desde" required>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="control-group">
                    <label>En vigencia hasta:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            @if (isset($contrato))
                                <input name="fecha_hasta" id="fecha_hasta" value="{{$contrato->fechahastaformateado}}" type="text" placeholder="campo requerido" class="form-control datepicker_hasta" required>
                            @else
                            <input name="fecha_hasta" id="fecha_hasta"type="text" placeholder="campo requerido" class="form-contro datepicker_hasta" required>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <div class="control-group">
                    <label>Comisión propietario:</label>
                    <div class="controls">
                        <div class="input-group">                            
                            @if (isset($contrato))
                            <input name="comision_propietario" id="comision_propietario" type="text" value="{{$contrato->comision_propietario}}" placeholder="campo requerido" class="form-control" required>
                            @else
                            <input name="comision_propietario" id="comision_propietario" type="text" placeholder="campo requerido" class="form-control" required>
                            @endif
                            <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-md-2">
                <div class="control-group">
                    <label>Comisión inquilino:</label>
                    <div class="controls">
                        <div class="input-group">                            
                            @if (isset($contrato))
                            <input name="comision_inquilino" id="comision_inquilino" type="text" value="{{$contrato->comision_inquilino}}" placeholder="campo requerido" class="form-control" required>
                            @else
                            <input name="comision_inquilino" id="comision_inquilino" type="text" placeholder="campo requerido" class="form-control" required>
                            @endif        
                            <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>                                
            <div class="col-md-2">
                <div class="control-group">
                    <label>Tipo de Renta:</label>
                    <div class="controls">
                        <select  style="width: 100%"  name="tipo_renta"  id="tipo_renta"  placeholder="campo requerido" class="select2 form-control">                          
                            <option value="fija">Fija</option>
                            <option value="creciente">Creciente</option>                           
                        </select>
                    </div>
                </div>
            </div>
         
            <div class="col-md-2">
                <div class="control-group">
                    <label>Valor para alquiler:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar" aria-hidden="true"></i></span>
                            @if (isset($contrato))
                            <input style="width: 100%" data-toggle="tooltip"  data-placement="bottom" title="monto base del alquiler" name="monto_basico" id="monto_basico" value="{{$contrato->monto_basico}}" onclick="cargar_monto_sugerido()" type="text" class="form-control">
                            @else
                            <input style="width: 100%" data-toggle="tooltip"  data-placement="bottom" title="monto base del alquiler" name="monto_basico" id="monto_basico" value="" type="text" placeholder="0" onclick="cargar_monto_sugerido()" class="form-control">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="control-group">
                    <label>P. Incremento:</label>
                    <div class="controls">
                        <div class="input-group">  
                            <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                            @if (isset($contrato))
                            <input name="periodos" id="periodos" data-toggle="tooltip" data-placement="bottom" title="cantidad de meses que deberán cumplirse para aplicarse tasa de incremento" max="999" min="1" type="number" value="{{$contrato->periodos}}" placeholder="campo requerido (en meses)" max="999999999" min="1" class="form-control" required>
                            @else
                            <input name="periodos" id="periodos" data-toggle="tooltip" data-placement="bottom" title="cantidad de meses que deberán cumplirse para aplicarse tasa de incremento" max="999" min="1" type="number" placeholder="campo requerido" class="form-control" required>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="control-group">
                    <label>Tasa de incremento:</label>
                    <div class="controls">
                        <div class="input-group">                              
                            @if (isset($contrato))
                            <input name="incremento" id="incremento" type="text" value="{{$contrato->incremento}}" placeholder="campo requerido" class="form-control" required>                                                                                   
                            @else
                            <input name="incremento" id="incremento" type="text" placeholder="campo requerido" class="form-control" required>                                                                                   
                            @endif
                            <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row"> 
            <div class="col-md-12">
                <a type="button" class="btn btn-info btn-sm" onclick="calcular_renta();"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> calcular resumen</a>
            </div>
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-6">
        <legend>Resumen mensual del alquiler</legend>
        <small id="info_cantidad_meses">Aún no se a establecido la vigencia del contrato.</small> <small id="info_valor_total"></small>
        <br><br>
        <div style="max-height: 350px; overflow: auto;">
            <table id="tabla-meses" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mes</th>
                        <th>Renta fija</th>
                        <th>Renta creciente</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr class="fila">
                        <td>0</td>
                        <td>$0</td>
                        <td>$0</td>
                    </tr>             
                </tbody>
                <tfoot>
                    <tr>
                        <th>Mes</th>
                        <th>Renta fija</th>
                        <th>Renta creciente</th> 
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

</div>



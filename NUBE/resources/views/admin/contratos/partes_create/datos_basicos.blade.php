<legend>Datos básicos</legend>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                @if (isset($contrato))
                    <div class="control-group">
                        <label>Inmueble:</label>
                        <div class="controls">
                            <select style="width: 100%"  name="inmueble_id" id="inmueble_id"  placeholder="campo requerido" class="select2 form-control">
                                <option></option>
                                @foreach($inmuebles as $inmueble)
                                @if ($inmueble->id === $contrato->inmueble_id)
                                <option objeto="{{$inmueble}}" selected value="{{$inmueble->id}}">{{$inmueble->direccion}} ({{$inmueble->localidad->nombre}}, {{$inmueble->localidad->provincia->nombre}}). Valor: ${{$inmueble->valorReal}}</option>
                                @else
                                <option objeto="{{$inmueble}}" value="{{$inmueble->id}}">{{$inmueble->direccion}} ({{$inmueble->localidad->nombre}}, {{$inmueble->localidad->provincia->nombre}}). Valor: ${{$inmueble->valorReal}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <div class="control-group">
                        <label>Inmueble:</label>
                        <div class="controls">
                            <select style="width: 100%"  name="inmueble_id" id="inmueble_id"  placeholder="campo requerido" class="select2 form-control">
                                <option></option>
                                @foreach($inmuebles as $inmueble)
                                    <option objeto="{{$inmueble}}" value="{{$inmueble->id}}">{{$inmueble->direccion}} ({{$inmueble->localidad->nombre}}, {{$inmueble->localidad->provincia->nombre}}) |  <b>Valor: ${{$inmueble->valorReal}} </b></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="control-group">
                    <label>En vigencia desde:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            @if (isset($contrato))
                                <input name="fecha_desde" id="fecha_desde" value="{{$contrato->fecha_desde}}" type="text" placeholder="campo requerido" class="form-control pull-right datepicker_desde" required>
                            @else
                            <input name="fecha_desde" id="fecha_desde"type="text" placeholder="campo requerido"  class="form-control pull-right datepicker_desde" required>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="control-group">
                    <label>En vigencia hasta:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            @if (isset($contrato))
                                <input name="fecha_hasta" id="fecha_hasta" value="{{$contrato->fecha_hasta}}" type="text" placeholder="campo requerido" class="form-control pull-right datepicker_hasta" required>
                            @else
                            <input name="fecha_hasta" id="fecha_hasta"type="text" placeholder="campo requerido" class="form-control pull-right datepicker_hasta" required>
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
                            <input name="comision_garante" max="999" min="1" id="comision_garante" type="number" value="{{$contrato->comisionPropietario}}" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>
                            @else
                            <input name="comision_garante" max="999" min="1" id="comision_garante" type="number" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>
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
                            <input name="comision_inquilino" max="999" min="1" id="comision_inquilino" type="number" value="{{$contrato->comisionInquilino}}" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>
                            @else
                            <input name="comision_inquilino" max="999" min="1" id="comision_inquilino" type="number" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>
                            @endif        
                            <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- --}}
            <div class="col-md-2 hide"> <!-- Se oculto -->
                <div class="control-group">
                    <label>Gastos administrativos:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            @if (isset($contrato))
                            <input style="width: 100%" max="999999999" min="1" name="gastos_administrativos" id="gastos_administrativos" type="number" value="{{$contrato->gastos_administrativos}}" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>
                            @else
                            <input style="width: 100%" name="gastos_administrativos" data-toggle="tooltip" title="Gastos administrativos mensuales, aproximadamente 2% del alquiler mensual" id="gastos_administrativos" type="number" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 hide"> <!-- Se oculto -->
                <div class="control-group">
                    <label>Tasa para gastos administrativos:</label>
                    <div class="controls">
                        <select  style="width: 100%"  name="tasa_gastos_admin"  id="tasa_gastos_admin" data-toggle="tooltip" title="Esta tasa aplica 4.20% al valor del inmueble o 3.15% en tasa 'amigo'" placeholder="campo requerido" class="select2 form-control" required>                            
                            <option value="4.20">Normal</option>
                            <option value="3.15">Amigos</option>
                        </select>
                    </div>
                </div>
            </div>
            {{-- /Fin campos ocultos --}}
            <div class="col-md-3">
                <div class="control-group">
                    <label>Tipo de Renta:</label>
                    <div class="controls">
                        <select  style="width: 100%"  name="tipo_renta"  id="tipo_renta"  placeholder="campo requerido" class="select2 form-control">
                            @if (isset($contrato) && $contrato->tipo_renta === "fija")
                            <option selected value="fija">Fija</option>
                            <option value="creciente">Creciente</option>
                            @else
                            <option value="fija">Fija</option>
                            <option value="creciente">Creciente</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">           
            <div class="col-md-2">
                <div class="control-group">
                    <label>Valor para alquiler:</label>
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar" aria-hidden="true"></i></span>
                            @if (isset($contrato))
                            <input style="width: 100%" max="999999999" data-toggle="tooltip" title="monto base del alquiler" min="1" name="monto_basico" id="monto_basico" value="{{$contrato->inmueble->valorAlquiler}}" type="text" class="form-control">
                            @else
                            <input style="width: 100%" max="999999999" data-toggle="tooltip" title="monto base del alquiler" min="1" name="monto_basico" id="monto_basico" value="" type="text" placeholder="campo requerido" class="form-control">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="control-group">
                    <label>Periodo de incremento:</label>
                    <div class="controls">
                        <div class="input-group">  
                            <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                            @if (isset($contrato))
                            <input name="periodos" id="periodos" data-toggle="tooltip" title="cantidad de meses que deberan cumplirse para aplicarse tasa de incremento" max="999" min="1" type="number" value="{{$contrato->periodos}}" placeholder="campo requerido (en meses)" max="999999999" min="1" class="form-control" required>
                            @else
                            <input name="periodos" id="periodos" data-toggle="tooltip" title="cantidad de meses que deberan cumplirse para aplicarse tasa de incremento" max="999" min="1" type="number" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>
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
                            <input name="incremento" id="incremento" max="999" min="1" type="number" value="{{$contrato->incremento}}" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>                                                                                   
                            @else
                            <input name="incremento" id="incremento" max="999" min="1" type="number" placeholder="campo requerido" max="999999999" min="1" class="form-control" required>                                                                                   
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



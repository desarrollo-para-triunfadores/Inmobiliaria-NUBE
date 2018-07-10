<legend>Ubicación</legend>
<div class="row">                                           
    <div class="col-md-3">
        <div class="control-group">
            <label>Pais:</label>
            <div class="controls">
                <select style="width: 100%"  id="pais_select" onchange="" class="select2 form-control">
                    <option></option>
                    @foreach($paises as $pais)
                    <option relacionados="{{$pais->provincias}}" value="{{$pais->id}}">{{$pais->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="control-group">
            <label>Provincia:</label>
            <div class="controls">
                <select style="width: 100%" id="provincia_select" onchange="" class="select2 form-control">
                    <option></option>
                    @foreach($provincias as $provincia)
                    <option relacionados="{{$provincia->localidades}}" value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="control-group">
            <label>Localidad:</label>
            <div class="controls">
                <select style="width: 100%"  id="localidad_select" name="ubicacion_localidad_id" required placeholder="campo requerido"  class="select2 form-control">                                                           
                    <option></option>
                    @foreach($localidades as $localidad)
                        <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="control-group">
            <label>Barrio:</label>
            <div class="controls">
                <select style="width: 100%"  id="barrio_id" name="barrio_id" placeholder="campo opcional" class="select2 form-control">                                        
                    <option></option>
                    <option value="sin_barrio">No se especifica barrio</option>
                    @foreach($barrios as $barrio)                   
                        <option value="{{$barrio->id}}">{{$barrio->nombre}}</option>                   
                    @endforeach
                </select>
            </div>
        </div>
    </div>  
</div>
<br>
<div class="row">                                           
    <div class="col-md-3">
        <div class="control-group">
            <label>Dirección</label>
            <div class="controls">
                <div class="input-group">                                                                                    
                    @if (isset($inmueble))
                    <input id="direccion" name="ubicacion_direccion" value="{{$inmueble->direccion}}" type="text" maxlength="50" class="form-control" required placeholder="campo requerido">      
                    @else
                    <input id="direccion" name="ubicacion_direccion" type="text" maxlength="50" class="form-control" required placeholder="campo requerido">      
                    @endif                  
                    <span class="input-group-addon"><i class="fa fa-map-o" aria-hidden="true"></i></span> 
                </div>   
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="control-group">
            <label>Edificio:</label>
            <div class="controls">
                <select style="width: 100%"  onchange="bloquear_datos_depto()" id="edificio_id" name="edificio_id" class="select2 form-control">
                    <option></option>
                    <option value="sin_edificio">No corresponde</option>
                    @foreach($edificios as $edificio)                 
                        <option value="{{$edificio->id}}">{{$edificio->nombre}}</option>                   
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="control-group">
            <label>Piso:</label>
            <div class="controls">
                @if (isset($inmueble))
                <input id="piso" name="piso" value="{{$inmueble->piso}}" type="number" min="0" max="99" class="form-control right" required placeholder="campo requerido">
                @else
                <input id="piso" name="piso" type="number" min="0" max="99" class="form-control right" required placeholder="campo requerido">
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="control-group">
            <label>Número de departamento:</label>
            <div class="controls">
                @if (isset($inmueble))
                <input id="numDepto" name="numDepto" value="{{$inmueble->numDepto}}" type="text" maxlength="4" class="form-control right" required placeholder="campo requerido">
                @else
                <input id="numDepto" name="numDepto" type="text" maxlength="4" class="form-control right" required placeholder="campo requerido">
                @endif
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">                                           
    <div class="col-md-12">
        <hr/>  
        <h3>Ubicación en el mapa</h3>
        <br>
        <div id="map" style="width:auto;height:350px;">
        </div>
        @if (isset($inmueble))
        <input name="longitud" value="{{$inmueble->longitud}}" class="hide" id="longitud" type="text">
        <input name="latitud" value="{{$inmueble->latitud}}" class="hide" id="latitud" type="text">
        @else
        <input name="longitud" class="hide" id="longitud" type="text" >
        <input name="latitud" class="hide" id="latitud" type="text" >
        @endif     
    </div>
</div>

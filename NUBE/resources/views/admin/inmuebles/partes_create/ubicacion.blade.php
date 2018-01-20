<legend>Ubicación</legend>
<div class="row">                                           
    <div class="col-md-3">
        <div class="control-group">
            <label>Pais:</label>
            <div class="controls">
                <select style="width: 100%"  id="pais_select" onchange="buscarProvincias()" class="select2 form-control">
                    @foreach($paises as $pais)
                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="control-group">
            <label>Provincia:</label>
            <div class="controls">
                <select style="width: 100%"  id="provincia_select" onchange="buscarLocalidades()" class="select2 form-control">
                    @foreach($provincias as $provincia)
                    <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
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
                    @foreach($localidades as $localidad)
                    @if (isset($inmueble)) && $inmueble->localidad_id)
                    <option selected value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                    @else
                    <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="control-group">
            <label>Barrio:</label>
            <div class="controls">
                <select style="width: 100%"  id="barrio_id" name="barrio_id" required placeholder="campo requerido"  class="select2 form-control">                                        
                    @foreach($barrios as $barrio)
                    @if (isset($inmueble)) && $inmueble->barrio_id)
                    <option selected value="{{$barrio->id}}">{{$barrio->nombre}}</option>
                    @else
                    <option value="{{$barrio->id}}">{{$barrio->nombre}}</option>
                    @endif
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
                    <input id="direccion" name="ubicacion_direccion" value="{{$inmueble->direccion}}" type="text" maxlength="50" class="form-control" placeholder="campo requerido" >      
                    @else
                    <input id="direccion" name="ubicacion_direccion" type="text" maxlength="50" class="form-control" placeholder="campo requerido" >      
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
                <select style="width: 100%"  id="edificio_id" name="edificio_id" class="select2 form-control">
                    <option value="">-</option>
                    @foreach($edificios as $edificio)
                    @if (isset($inmueble)) && $inmueble->edificio_id)
                    <option selected value="{{$edificio->id}}">{{$edificio->nombre}}</option>
                    @else
                    <option value="{{$edificio->id}}">{{$edificio->nombre}}</option>
                    @endif
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
                <input id="piso" name="piso" value="{{$inmueble->piso}}"  type="number" min="0" max="99" class="form-control right" >
                @else
                <input id="piso" name="piso" type="number" min="0" max="99" class="form-control right" >
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="control-group">
            <label>Número de departamento:</label>
            <div class="controls">
                @if (isset($inmueble))
                <input id="numDepto" name="numDepto" value="{{$inmueble->numDepto}}" type="number" min="0" max="200" class="form-control right" >
                @else
                <input id="numDepto" name="numDepto" type="number" min="0" max="200" class="form-control right" >
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
        <input name="longitud" value="{{$inmueble->longitud}}" class="hide" id="longitud" type="text" >
        <input name="latitud" value="{{$inmueble->latitud}}" class="hide" id="latitud" type="text" >
        @else
        <input name="longitud" class="hide" id="longitud" type="text" >
        <input name="latitud" class="hide" id="latitud" type="text" >
        @endif     
    </div>
</div>

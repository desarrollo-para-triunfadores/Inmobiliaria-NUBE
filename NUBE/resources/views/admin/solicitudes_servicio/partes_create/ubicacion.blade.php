<legend>Ubicación</legend>
<br>
<div class="row">
    <div class="col-md-6">     
        <div class="row">          
            <div class="col-md-6">
                <div class="control-group">
                    <label>Localidad:</label>
                    <div class="controls">
                        <select style="width: 100%"  name="localidad_id" id="localidad_id" placeholder="campo requerido" onchange="cargar_barrios()" class="select2 form-control" required>
                            @foreach($localidades as $localidad)
                                <option barrios="{{$localidad->barrios}}" value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>     
            <div class="col-md-6">
                <div class="control-group">
                    <label>Barrio:</label>
                    <div class="controls">
                        <select style="width: 100%"  name="barrio_id" id="barrio_id" placeholder="campo requerido"  class="select2 form-control" required>
                            @foreach($barrios as $barrio)
                                <option value="{{$barrio->id}}">{{$barrio->nombre}} ({{$barrio->localidad->nombre}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>        
        </div>
        <br>
        <div class="row">          
            <div class="col-md-12">
                <div class="control-group">
                    <label>Dirección:</label>
                    <div class="controls">
                        @if (isset($edificio))       
                        <input name="direccion" type="text" maxlength="50" value="{{$edificio->direccion}}" class="form-control" placeholder="campo requerido" required>                                                                                                                                                         
                        @else
                        <input name="direccion" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                        @endif                        
                    </div>
                </div>
            </div>            
        </div>
        <br>
       
    </div>

    <div class="col-md-6">
        <div id="map" style="width:auto;height:350px;"></div>        
        <input name="longitud" class="hide" id="longitud" type="text" >
        <input name="latitud" class="hide" id="latitud" type="text" >                  
    </div>
</div>





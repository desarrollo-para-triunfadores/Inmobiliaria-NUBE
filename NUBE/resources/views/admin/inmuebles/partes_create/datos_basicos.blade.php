<legend>Datos básicos</legend>
<div class="row">
    @if (isset($inmueble))
    <div class="col-md-2">
        <div class="control-group">
            <label>Tipo de inmueble:</label>
            <div class="controls">
                <select  style="width: 100%"  name="tipo_id"  id="tipo_id"  placeholder="campo requerido" class="select2 form-control">
                    @foreach($tipos as $tipo)
                    @if ($inmueble->tipo_id === $tipo->id)
                    <option selected value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                    @else
                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                    @endif
                    @endforeach
                </select> 
            </div>
        </div>
    </div>  
    <div class="col-md-2">
        <div class="control-group">
            <label>Disponible:</label>
            <div class="controls">
                <select  style="width: 100%"  name="disponible"  id="disponible"  placeholder="campo requerido" class="select2 form-control">
                    @if ($inmueble->disponible === "si")
                    <option selected value="si">Sí</option>
                    <option value="no">No</option>
                    @else
                    <option value="si">Sí</option>
                    <option selected value="no">No</option>
                    @endif

                </select> 
            </div>
        </div>
    </div>  
    @else
    <div class="col-md-4">
        <div class="control-group">
            <label>Tipo de inmueble:</label>
            <div class="controls">
                <select  style="width: 100%"  name="tipo_id"  id="tipo_id"  placeholder="campo requerido" class="select2 form-control">
                    @foreach($tipos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                    @endforeach
                </select> 
            </div>
        </div>
    </div>  
    @endif
    <div class="col-md-2">
        <div class="control-group">
            <label>Tipo de operación:</label>
            <div class="controls">
                @if (isset($inmueble))
                <select  style="width: 100%"  name="condicion"  id="condicion"  placeholder="campo requerido" class="select2 form-control" required>
                    @if ($inmueble->condicion === "Alquiler")
                    <option selected value="Alquiler">Alquiler</option>
                    <option value="Venta">Venta</option>
                    <option value="Venta/Alquiler">Alquiler/Venta</option>
                    @elseif ($inmueble->condicion === "Venta")
                    <option value="Alquiler">Alquiler</option>
                    <option selected value="Venta">Venta</option>
                    <option value="Venta/Alquiler">Alquiler/Venta</option>
                    @else
                    <option value="Alquiler">Alquiler</option>
                    <option value="Venta">Venta</option>
                    <option selected value="Venta/Alquiler">Alquiler/Venta</option>
                    @endif
                </select> 
                @else
                <select  style="width: 100%"  name="condicion"  id="condicion"  placeholder="campo requerido" class="select2 form-control" required>
                    <option value="Alquiler">Alquiler</option>
                    <option value="Venta">Venta</option>
                    <option value="Venta/Alquiler">Alquiler/Venta</option>
                </select> 
                @endif
            </div>
        </div>
    </div>  
    <div class="col-md-2">
        <div class="control-group">
            <label>Fecha de habilitación:</label>
            <div class="controls">
                @if (isset($inmueble))
                <input name="fechaHabilitacion" id="fechaHabilitacion" value="{{$inmueble->fechaHabilitacion}}" type="text" placeholder="campo requerido" class="form-control pull-right datepicker" required>
                @else
                <input name="fechaHabilitacion" id="fechaHabilitacion"type="text" placeholder="campo requerido" class="form-control pull-right datepicker" required>
                @endif

            </div>
        </div>
    </div>  
    <div class="col-md-2">
        <div class="control-group">
            <label>Valor para la venta:</label>
            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                    @if (isset($inmueble))
                    <input name="valorVenta" id="valorVenta" type="text" value="{{$inmueble->valorVenta}}" placeholder="campo requerido"  class="form-control" required>
                    @else
                    <input name="valorVenta" id="valorVenta" type="text" placeholder="campo requerido" class="form-control" required>
                    @endif
                </div>
            </div>
        </div>
    </div>  
    <div class="col-md-2">
        <div class="control-group">
            <label>Valor del inmueble:</label>
            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                    @if (isset($inmueble))
                    <input name="valorReal" id="valorReal" type="text" value="{{$inmueble->valorReal}}" placeholder="campo requerido" class="form-control" required>
                    @else
                    <input name="valorReal" id="valorReal" type="text" placeholder="campo requerido" class="form-control" required>
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
            <label>Valor para alquiler:</label>
            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                    @if (isset($inmueble))
                    <input name="valorAlquiler" id="valorAlquiler" type="text" value="{{$inmueble->valorAlquiler}}" placeholder="campo requerido" class="form-control">
                    @else
                    <input name="valorAlquiler" id="valorAlquiler" type="text" placeholder="campo requerido"class="form-control">
                    @endif
                </div>
            </div>
        </div>
    </div> 
    <div class="col-md-2">
        <div class="control-group">
            <label>Cant. de ambientes:</label>
            <div class="controls">
                <div class="input-group">  
                    @if (isset($inmueble))
                    <input name="cantidadAmbientes" id="cantidadAmbientes" type="number" value="{{$inmueble->cantidadAmbientes}}" placeholder="campo requerido" max="999999999" min="1" max="999" class="form-control" required>
                    @else
                    <input name="cantidadAmbientes" id="cantidadAmbientes" type="number" placeholder="campo requerido" max="999999999" min="1" max="999" class="form-control" required>
                    @endif
                    <span class="input-group-addon"><i class="fa fa-coffee"></i></span>
                </div>
            </div>
        </div>
    </div>                                                                                                                                                                 
    <div class="col-md-2">
        <div class="control-group">
            <label>Cant. de baños:</label>
            <div class="controls">
                <div class="input-group"> 
                    @if (isset($inmueble))
                    <input name="cantidadBaños" id="cantidadBaños" type="number" value="{{$inmueble->cantidadBaños}}" placeholder="campo requerido" max="999999999" min="1" max="999" class="form-control" required>                                                                                   
                    @else
                    <input name="cantidadBaños" id="cantidadBaños" type="number" placeholder="campo requerido" max="999999999" min="1" max="999" class="form-control" required>                                                                                   
                    @endif
                    <span class="input-group-addon"><i class="fa fa-bath"></i></span> 
                </div>
            </div>
        </div>
    </div>  

    <div class="col-md-2">
        <div class="control-group">
            <label>Cant. de garages:</label>
            <div class="controls">
                <div class="input-group">     
                    @if (isset($inmueble))
                    <input name="cantidadGarages" id="cantidadGarages" type="number" value="{{$inmueble->cantidadGarages}}" placeholder="campo requerido" max="999999999" min="1" max="999" class="form-control" required>    
                    @else
                    <input name="cantidadGarages" id="cantidadGarages" type="number" placeholder="campo requerido" max="999999999" min="1" max="999" class="form-control" required>    
                    @endif
                    <span class="input-group-addon"><i class="fa fa-car"></i></span> 
                </div>
            </div>
        </div>
    </div>  

    <div class="col-md-2">
        <div class="control-group">
            <label>Cant. de dormitorios:</label>
            <div class="controls">
                <div class="input-group">      
                    @if (isset($inmueble))
                    <input name="cantidadDormitorios" id="cantidadDormitorios" type="number" value="{{$inmueble->cantidadDormitorios}}" placeholder="campo requerido" max="999999999" min="1" max="999" class="form-control" required>      
                    @else
                    <input name="cantidadDormitorios" id="cantidadDormitorios" type="number" placeholder="campo requerido" max="999999999" min="1" max="999" class="form-control" required>      
                    @endif

                    <span class="input-group-addon"><i class="fa fa-bed"></i></span> 
                </div>
            </div>
        </div>
    </div>                                                                                                                                                                 
    <div class="col-md-2">
        <div class="control-group">
            <label>Superficie total:</label>
            <div class="controls">
                <div class="input-group">  
                    @if (isset($inmueble))
                    <input name="superficie" id="superficie" type="number" placeholder="campo requerido" value="{{$inmueble->superficie}}" max="999999999" min="1" max="99999" class="form-control" required>      
                    @else
                    <input name="superficie" id="superficie" type="number" placeholder="campo requerido" max="999999999" min="1" max="99999" class="form-control" required>      
                    @endif
                    <span class="input-group-addon"><b>M<sup>2</sup></b></span> 
                </div>
            </div>
        </div>
    </div>                                                                       
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="control-group">
            <label>Descripción de inmueble:</label>
            <div class="controls">
                @if (isset($inmueble))
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" value="{{$inmueble->descripcion}}" maxlength="500" placeholder="campo opcional (máximo 500 caracteres)"></textarea>   
                @else
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" maxlength="500" placeholder="campo opcional (máximo 500 caracteres)"></textarea>   
                @endif
            </div>
        </div>
    </div>
</div>

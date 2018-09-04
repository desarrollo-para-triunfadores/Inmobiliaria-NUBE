<section id="sidebar">
    <aside id="edit-search">

        <header><h3>Buscar Propiedades</h3></header>                
        <form role="form" id="form-sidebar" class="form-search" method="get" action="/propiedades">
            <input id="orden" type="text" name="orden" class="hide" value="mr"> 
            <div class="form-group">
                <select class="show-tick" id="provincia_id" name="provincia_id" data-live-search="true" data-header="Provincia" onchange="cargar_localidades({{$localidades}})">
                    @if(isset($parametros["provincia_id"]) && !$parametros["provincia_id"])                    
                    <option localidades="" value="">Cualquier Provincia</option>
                    @else
                    <option localidades="" selected value="">Cualquier Provincia</option>
                    @endif
                    @foreach($provincias as $provincia)
                    @if(isset($parametros["provincia_id"]) && $parametros["provincia_id"] == $provincia->id)
                    <option localidades="{{$provincia->localidades}}" selected value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                    @else
                    <option localidades="{{$provincia->localidades}}" value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="show-tick" data-live-search="true" id="localidad_id" name="localidad_id" data-header="Localidad" title="Choose one of the following...">>
                    @if(isset($parametros["localidad_id"]) && !$parametros["localidad_id"])
                    <option selected value="">Cualquier Localidad</option>
                    @else
                    <option value="">Cualquier Localidad</option>
                    @endif
                    @if(isset($parametros["provincia_seleccionada"]) && $parametros["provincia_seleccionada"])
                    @foreach($parametros["provincia_seleccionada"]->localidades as $localidad)
                    @if($parametros["localidad_id"] == $localidad->id)
                    <option selected value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                    @else
                    <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                    @endif
                    @endforeach
                    @else
                    @foreach($localidades as $localidad)
                    @if(isset($parametros["localidad_id"]) && $parametros["localidad_id"] == $localidad->id)
                    <option selected value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                    @else
                    <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <select class="show-tick" data-live-search="true" name="tipo_id" data-header="Tipo Inmueble">
                    @if(isset($parametros["tipo_id"]) &&  !$parametros["tipo_id"])
                    <option selected value="">Cualquier Tipo</option>
                    @else
                    <option value="">Cualquier Tipo</option>
                    @endif
                    @foreach($tipos_inmuebles as $tipo_inmueble)
                    @if(isset($parametros["tipo_id"]) &&  $parametros["tipo_id"] == $tipo_inmueble->id)
                    <option selected value="{{$tipo_inmueble->id}}">{{$tipo_inmueble->nombre}}</option>
                    @else
                    <option value="{{$tipo_inmueble->id}}">{{$tipo_inmueble->nombre}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="show-tick" data-live-search="true" id="condicion" data-header="Condición" name="condicion">
                    @if(isset($parametros["condicion"]) &&  $parametros["condicion"] == "alquiler")
                    <option rango="{{$rango_alquiler}}" selected value="alquiler">Alquiler</option>
                    <option rango="{{$rango_alquiler_venta}}" value="alquiler/venta">Alquiler / Venta</option>
                    <option rango="{{$rango_venta}}" value="venta">Venta</option>
                    @elseif(isset($parametros["condicion"]) &&  $parametros["condicion"] == "venta")
                    <option rango="{{$rango_alquiler}}" value="alquiler">Alquiler</option>
                    <option rango="{{$rango_alquiler_venta}}" value="alquiler/venta">Alquiler / Venta</option>
                    <option rango="{{$rango_venta}}" selected value="venta">Venta</option>
                    @elseif(isset($parametros["condicion"]) &&  $parametros["condicion"] == "alquiler/venta")
                    <option rango="{{$rango_alquiler}}" value="alquiler">Alquiler</option>
                    <option rango="{{$rango_alquiler_venta}}" selected value="alquiler/venta">Alquiler / Venta</option>
                    <option rango="{{$rango_venta}}" value="venta">Venta</option>
                    @else
                    <option rango="{{$rango_alquiler}}" value="alquiler">Alquiler</option>
                    <option rango="{{$rango_alquiler_venta}}" value="alquiler/venta">Alquiler / Venta</option>
                    <option rango="{{$rango_venta}}" value="venta">Venta</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <div  class="price-range">
                    <!--Este input se instancia en la sección script de esta página con el fin de setear el valor máximo con el valor máximo que se dispone para un inmueble-->       
                    @if(isset($parametros["rango_precio"]))
                    <input id="precio_range" type="text" name="rango_precio" value="{{$parametros["rango_precio"]}}"> 
                    @else
                    <input id="precio_range" type="text" name="rango_precio" value=""> 
                    @endif
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-busqueda">Buscar</button>
            </div>
        </form>
    </aside>
</section>



<section id="banner-busqueda">
    <div class="block center text-banner fondo-traslucido">
        <div class="container">
            <form role="form" id="form-sidebar" class="form-search" method="get" action="/propiedades">
                <input id="orden" type="text" name="orden" class="hide" value=""> 
                <div class="row">
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select id="provincia_id" data-live-search="true" name="provincia_id" data-header="Provincia" onchange="cargar_localidades({{$localidades}})">
                                <option localidades="" value="">Cualquier Provincia</option>
                                @foreach($provincias as $provincia)
                                <option localidades="{{$provincia->localidades}}" value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select data-live-search="true" id="localidad_id" name="localidad_id" data-header="Localidad">
                                <option value="">Cualquier Localidad</option>
                                @foreach($localidades as $localidad)
                                <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                  
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select data-live-search="true" name="tipo_id" data-header="Tipo Inmueble">

                                @foreach($tipos_inmuebles as $tipo_inmueble)
                                <option value="{{$tipo_inmueble->id}}">{{$tipo_inmueble->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select data-live-search="true" data-header="Condición" id="condicion" name="condicion">                                
                                <option rango="{{$rango_alquiler}}" value="alquiler">Alquiler</option>
                                <option rango="{{$rango_alquiler_venta}}" value="alquiler/venta">Alquiler / Venta</option>
                                <option rango="{{$rango_venta}}" value="venta">Venta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <div  class="price-range">
                                <!--Este input se instancia en la sección script de esta página con el fin de setear el valor máximo con el valor máximo que se dispone para un inmueble-->       
                                <input id="precio_range" type="text" name="rango_precio" value=""> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-busqueda">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

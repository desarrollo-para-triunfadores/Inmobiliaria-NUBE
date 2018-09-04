<section id="results">
    <header><h1>Listado de propiedades</h1></header>
    <section id="search-filter">
        <figure><h3><i class="fa fa-search"></i>Resultados de la búsqueda:</h3>
            <span class="search-count">{{$inmuebles->total()}}</span>
            <div class="sorting">
                <div class="form-group">
                    <select class="show-tick" id="select_order" name="sorting" style="display: none;">
                        @if($parametros["orden"] == "mc")
                        <option value="mr">Los más recientes</option>
                        <option value="mb">El precio más bajo primero</option>
                        <option selected value="mc">El precio más alto primero</option>
                        @elseif($parametros["orden"] == "mb")
                        <option value="mr">Los más recientes</option>
                        <option selected value="mb">El precio más bajo primero</option>
                        <option value="mc">El precio más alto primero</option>
                        @else
                        <option selected value="mr">Los más recientes</option>
                        <option value="mb">El precio más bajo primero</option>
                        <option value="mc">El precio más alto primero</option>
                        @endif
                    </select>
                </div>
            </div>
        </figure>
    </section>
    <section id="properties" class="animated fadeIn slower">
        <div class="row">
            @foreach($inmuebles as $inmueble)
            <div class="col-md-4 col-sm-4">
                <div class="property equal-height" style="height: 197px;">
                    <figure class="tag status">{{$inmueble->mostrar_condicion()}}</figure>
                    <figure class="type" title="{{$inmueble->tipo->nombre}}">
                        @if($inmueble->tipo_id === 1)
                        <img src="{{ asset('plantillas/zoner/assets/img/property-types/apartment.png')}}" alt="">
                        @elseif($inmueble->tipo_id === 2)
                        <img src="{{ asset('plantillas/zoner/assets/img/property-types/single-family.png')}}" alt="">
                        @elseif($inmueble->tipo_id === 4)
                        <img src="{{ asset('plantillas/zoner/assets/img/property-types/land.png')}}" alt="">
                        @endif
                    </figure>
                    <a href="{{ route('propiedades.show', $inmueble->id) }}">
                        <div class="property-image">
                            @if($inmueble->foto_portada())
                            <img alt="" src="{{ asset('imagenes/inmuebles/'.$inmueble->foto_portada())}}">
                            @else
                            <img alt="" src="{{ asset('plantillas/zoner/assets/img/properties/property-05.jpg')}}"> 
                            @endif
                        </div>
                        <div class="overlay">
                            <div class="info">
                                @if($inmueble->condicion === "alquiler")
                                <div class="tag price">${{$inmueble->valorAlquiler}}</div>
                                @elseif($inmueble->condicion === "venta")
                                <div class="tag price">${{$inmueble->valorVenta}}</div>
                                @else
                                <div class="tag price">${{$inmueble->valorAlquiler}} - {{$inmueble->valorVenta}}</div>
                                @endif
                                <h3>{{$inmueble->direccion}}</h3>
                                <figure>{{$inmueble->localidad->nombre}}, {{$inmueble->localidad->provincia->nombre}}</figure>
                            </div>
                            <ul class="additional-info">
                                <li>
                                    <header>Sup.:</header>
                                    <figure>{{$inmueble->superficie}}m<sup>2</sup></figure>
                                </li>
                                <li>
                                    <header>Dorm.:</header>
                                    <figure>{{$inmueble->cantidadDormitorios}}</figure>
                                </li>
                                <li>
                                    <header>Baños:</header>
                                    <figure>{{$inmueble->cantidadBaños}}</figure>
                                </li>
                                <li>
                                    <header>Garages:</header>
                                    <figure>{{$inmueble->cantidadGarages}}</figure>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        {{ $inmuebles->appends(Request::only(['orden', 'condicion', 'localidad_id', 'provincia_id', 'tipo_id', 'rango_precio']))->links() }}
    </section>
</section>
<section id="advertising">


    <a href="{{ route('contacto.index') }}">
        <div class="banner" style="background-color: #5ccdff; color: white;">
            <div class="wrapper" style="color: white">
                <span class="title" style="color: white; font-size: 30px; font-weight: 700">¿Sos Propietario?</span>
                <span class="submit" style="color: white;font-size: 19px; font-weight: 500">¡Registra tu Propiedad! <i class="fa fa-plus-square"></i></span>
            </div>
        </div><!-- /.banner-->
    </a>




</section><!-- /#adveritsing-->
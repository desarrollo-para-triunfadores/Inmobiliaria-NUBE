<section id="property-detail">
    <header class="property-title">
        <h1>{{$inmueble->direccion}}</h1>
        <figure>{{$inmueble->localidad->nombre}}, {{$inmueble->localidad->provincia->nombre}}</figure>
        <span class="actions">                       
            @if($inmueble->tipo_id === 1)
            <img src="{{ asset('plantillas/zoner/assets/img/property-types/apartment.png')}}" alt="">
            @elseif($inmueble->tipo_id === 2)
            <img src="{{ asset('plantillas/zoner/assets/img/property-types/single-family.png')}}" alt="">
            @elseif($inmueble->tipo_id === 4)
            <img src="{{ asset('plantillas/zoner/assets/img/property-types/land.png')}}" alt="">
            @endif            
        </span>
    </header>
    <section id="property-gallery">
        <div class="owl-carousel property-carousel owl-theme owl-loaded">
            <div class="owl-stage-outer owl-height" style="height: 428px;">
                <div class="owl-stage" style="width: 2544px; transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                    @foreach($inmueble->fotos as $foto)
                    <div class="owl-item active" style="width: 848px; margin-right: 0px;">
                        <div class="property-slide">
                            <a href="{{ asset('imagenes/inmuebles/'.$foto->nombre)}}" class="image-popup">
                                <div class="overlay"><h3>Front View</h3></div>
                                <img alt="" src="{{ asset('imagenes/inmuebles/'.$foto->nombre)}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="owl-controls">
                <div class="owl-nav">
                    <div class="owl-prev" style=""></div>
                    <div class="owl-next" style=""></div>                        
                </div>
                <div class="owl-dots" style="display: none;">
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <section id="quick-summary" class="clearfix">
                <header><h2>Sumario rápido</h2></header>
                <dl>
                    <dt>Localidad</dt>
                    <dd>{{$inmueble->localidad->nombre}}, {{$inmueble->localidad->provincia->nombre}}</dd>
                    @if($inmueble->edificio_id)
                    <dt>Edificio</dt>
                    <dd>{{$inmueble->edificio->nombre}}</dd>
                    @endif
                    <dt>Dirección</dt>
                    <dd>{{$inmueble->direccion}}</dd>
                    <dt>Precio</dt>
                    @if($inmueble->condicion === "alquiler")
                    <dd><span class="tag price">${{$inmueble->valorAlquiler}}</span></dd>
                    @elseif($inmueble->condicion === "venta")
                    <dd><span class="tag price">${{$inmueble->valorVenta}}</span></dd>                             
                    @else
                    <dd><span class="tag price">${{$inmueble->valorAlquiler}} - {{$inmueble->valorVenta}}</span></dd>                    
                    @endif
                    <dt>Tipo de propiedad:</dt>
                    <dd>{{$inmueble->tipo->nombre}}</dd>
                    <dt>Condición:</dt>
                    <dd>{{$inmueble->mostrar_condicion()}}</dd>
                    <dt>Superficie:</dt>
                    <dd>{{$inmueble->superficie}}m<sup>2</sup></dd>
                    <dt>Dormitorios:</dt>
                    <dd>{{$inmueble->cantidadDormitorios}}</dd>
                    <dt>Baños:</dt>
                    <dd>{{$inmueble->cantidadBaños}}</dd>
                    <dt>Garages:</dt>
                    <dd>{{$inmueble->cantidadGarages}}</dd>
                </dl>
            </section>
        </div>
        <div class="col-md-8 col-sm-12">
            <section id="description">
                <header><h2>Descripción de la propiedad</h2></header>
                <p>
                    {{$inmueble->descripcion}} 
                </p>               
            </section>
            @if($inmueble->caracteristicas->count()>0)
            <section id="property-features">
                <header><h2>Características de la propiedad</h2></header>
                <ul class="list-unstyled property-features-list">
                    @foreach($inmueble->caracteristicas as $caracteristica_inmueble)
                    <li>{{$caracteristica_inmueble->caracteristica->nombre}}</li>
                    @endforeach
                </ul>
            </section>
            @endif
            @if($inmueble->fotos_planos())
            <section id="floor-plans">
                <div class="floor-plans">
                    <header><h2>Planos de planta</h2></header>
                    @foreach($inmueble->fotos_planos() as $foto)
                    <a href="{{ asset('imagenes/inmuebles/'.$foto->nombre)}}" class="image-popup">
                        <img alt="" src="{{ asset('imagenes/inmuebles/'.$foto->nombre)}}">
                    </a>
                    @endforeach       
                </div>
            </section>
            @endif

            <section id="property-map">
                <header><h2>Ubicación en el mapa</h2></header>
                <div class="property-detail-map-wrapper">
                    <div  id="map" style="width:auto;height:350px;"></div>         
                </div>
            </section>

            <section id="video-presentation">
                <header><h2>Video Presentation</h2></header>
                <div class="video">
                    <div class="fluid-width-video-wrapper" style="padding-top: 56.2%;"><iframe src="//player.vimeo.com/video/34741214?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" id="fitvid944946"></iframe></div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-sm-12">                     
            <section id="contact-agent">
                <header><h2>Contacto</h2></header>
                <div class="row">
                    <section class="agent-form">                                               
                        <div class="agent-form">
                            <form role="form" id="form-contact-agent" action="/enviar_consulta" method="post" class="clearfix">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                <input type="hidden" name="inmueble_id" value="{{$inmueble->id}} ">     
                                <div class="col-md-12 form-group">
                                    <label for="form-contact-agent-name">Tu Nombre<em>*</em></label>
                                    <input type="text" class="form-control" id="form-contact-agent-name" name="nombre_interesado" required="">
                                </div>                                    
                                <div class="col-md-6 form-group">
                                    <label for="form-contact-agent-email">Tu Email<em>*</em></label>
                                    <input type="email" class="form-control" id="form-contact-agent-email" name="email" required="">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="form-contact-agent-email">Tu Teléfono<em>*</em></label>
                                    <input type="tel" class="form-control" id="form-contact-agent-email" name="telefono" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="form-contact-agent-message">Tu Mensaje<em>*</em></label>
                                    <textarea class="form-control" rows="5" id="form-contact-agent-message" rows="2" name="mensaje" required=""></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn pull-right btn-default" id="form-contact-agent-submit">Enviar Mensaje</button>
                                </div>
                                <div id="form-contact-agent-status"></div>
                            </form>
                        </div>

                    </section>
                </div>
            </section>      
            
            
             @if($inmuebles_similares->count()>0)
           <hr class="thick">
            <section id="similar-properties">
                <header><h2 class="no-border">Propiedades Similares</h2></header>
                <div class="row">                
                    @foreach($inmuebles_similares as $inmueble_similar)
                    <div class="col-md-4 col-sm-6">
                        <div class="property equal-height" style="height: 197px;">
                            <figure class="tag status">{{$inmueble_similar->mostrar_condicion()}}</figure>
                            <figure class="type" title="{{$inmueble_similar->tipo->nombre}}">
                                @if($inmueble->tipo_id === 1)
                                <img src="{{ asset('plantillas/zoner/assets/img/property-types/apartment.png')}}" alt="">
                                @elseif($inmueble->tipo_id === 2)
                                <img src="{{ asset('plantillas/zoner/assets/img/property-types/single-family.png')}}" alt="">
                                @elseif($inmueble->tipo_id === 4)
                                <img src="{{ asset('plantillas/zoner/assets/img/property-types/land.png')}}" alt="">
                                @endif
                            </figure>
                            <a href="{{ route('propiedades.show', $inmueble_similar->id) }}">
                                <div class="property-image">
                                    @if($inmueble_similar->foto_portada())
                                    <img alt="" src="{{ asset('imagenes/inmuebles/'.$inmueble_similar->foto_portada())}}">
                                    @else
                                    <img alt="" src="{{ asset('plantillas/zoner/assets/img/properties/property-05.jpg')}}"> 
                                    @endif
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        @if($inmueble_similar->condicion === "alquiler")
                                        <div class="tag price">${{$inmueble_similar->valorAlquiler}}</div>
                                        @elseif($inmueble_similar->condicion === "venta")
                                        <div class="tag price">${{$inmueble_similar->valorVenta}}</div>
                                        @else
                                        <div class="tag price">${{$inmueble_similar->valorAlquiler}} - {{$inmueble_similar->valorVenta}}</div>
                                        @endif
                                        <h3>{{$inmueble_similar->direccion}}</h3>
                                        <figure>{{$inmueble_similar->localidad->nombre}}, {{$inmueble_similar->localidad->provincia->nombre}}</figure>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            <header>Sup.:</header>
                                            <figure>{{$inmueble_similar->superficie}}m<sup>2</sup></figure>
                                        </li>
                                        <li>
                                            <header>Dorm.:</header>
                                            <figure>{{$inmueble_similar->cantidadDormitorios}}</figure>
                                        </li>
                                        <li>
                                            <header>Baños:</header>
                                            <figure>{{$inmueble_similar->cantidadBaños}}</figure>
                                        </li>
                                        <li>
                                            <header>Garages:</header>
                                            <figure>{{$inmueble_similar->cantidadGarages}}</figure>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
            
            
            
        </div>
    </div>
</section>



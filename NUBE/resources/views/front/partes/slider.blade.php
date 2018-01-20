<!-- Slider -->
<div id="slider" class="loading has-parallax">
    <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
    <div class="owl-carousel homepage-slider carousel-full-width">
        @foreach($imagenesInmuebles as $imagen)
            @if($imagen->seccion_imagen === 'slider' && is_null($imagen->proyecto_id))
                <div class="slide">
                    <div class="container">
                        <div class="overlay">
                            <div class="info">
                                @if($imagen->inmueble->valorVenta)
                                    <div class="tag price">$ {{ $imagen->inmueble->valorVenta }}</div>
                                @else
                                    <div class="tag price">$ {{ $imagen->inmueble->valorAlquiler }} x mes</div>
                                @endif
                                <h3>{{ $imagen->inmueble->direccion }}</h3>
                                <figure>{{ $imagen->inmueble->localidad->nombre }} {{ $imagen->inmueble->localidad->provincia->nombre }}</figure>
                            </div>
                            <hr>
                            <a href="{{ route('detalle.show', $imagen->inmueble->id) }}" class="link-arrow">Saber más</a>
                        </div>
                    </div>
                    <img alt="" src="{{ asset('imagenes/inmuebles/'.$imagen->nombre ) }}" >
                </div>
            @endif
        @endforeach
    </div>
</div>
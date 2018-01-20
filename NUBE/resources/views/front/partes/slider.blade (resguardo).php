<!-- Slider -->
<?php $imagenSlider = $imagenesInmuebles->where('seccion_imagen','slider')->first();  ?>

<div id="slider" class="loading has-parallax">
    <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
    <div class="owl-carousel homepage-slider carousel-full-width">
        @foreach($inmuebles as $inmueble)
            @if(\App\ImagenInmueble::where('inmueble_id', $inmueble->id)->where('seccion_imagen','slider')->first()->nombre  != null) {{-- verifica que exista una imagen de tipo "slider" para el inmueble, sino que no se muestre el inmueble en el slider --}}
                <div class="slide">
                    <div class="container">
                        <div class="overlay">
                            <div class="info">
                                @if($inmueble->valorVenta)
                                    <div class="tag price">$ {{ $inmueble->valorVenta }}</div>
                                @else
                                    <div class="tag price">$ {{ $inmueble->valorAlquiler }} x mes</div>
                                @endif
                                <h3>{{ $inmueble->direccion }}</h3>
                                <figure>{{ $inmueble->localidad->nombre }} {{ $inmueble->localidad->provincia->nombre }}</figure>
                            </div>
                            <hr>
                            <a href="{{ route('detalle.show', $inmueble->id) }}" class="link-arrow">Saber más</a>
                        </div>
                    </div>
                   {{-- <?php $imagen = $imagenSlider->where('inmueble_id',$inmueble->id)->first();  ?> --}}
                    <img alt="" src="{{ asset('imagenes/inmuebles/'.\App\ImagenInmueble::where('inmueble_id', $inmueble->id)->where('seccion_imagen','slider')->first()->nombre ) }}" >
                </div>
            @endif
        @endforeach
    </div>
</div>
<!-- Slider -->
<div id="proyectos_carusel" class="carousel slide" data-ride="carousel" data-interval="7000">
    <!-- Indicators -->
    {{--
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    --}}

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('imagenes/proyectos/INube_1495908901.jpg') }}" alt="Chania">
            <div class="carousel-caption">
                <h1>La oportunidad de tu vida está acá
                    <br>
                    Mirá nuestros proyectos recientes..
                </h1>

            </div>
        </div>
        @foreach($proyectos as $proyecto)
        <div class="item">
          
            <img src="{{ asset('imagenes/proyectos/'.$proyecto->foto_slider()->nombre) }}" alt="">
           
            <div class="carousel-caption">
                <h1 class="text-banner" style="font-size:300%; background-color:#4f6785">
                        <b>{{ $proyecto->tipo->nombre }}</b> en {{ $proyecto->localidad->nombre }} {{ $proyecto->localidad->provincia->nombre }}
                </h1>
                <h4 class="text-banner">{{ $proyecto->descripcion1}} </h4>
                <h4 class="text-banner">{{ $proyecto->descripcion2}} </h4>
                <p>Coutry privado</p>
                <div class="tag price">{{ $proyecto->valorVenta  }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#proyectos_carusel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#proyectos_carusel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>


{{--
<div id="slider_proyecto" class="loading has-parallax">
    <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
    <div class="owl-carousel homepage-slider carousel-full-width">
        @foreach($proyectos as $proyecto)
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            <div class="tag price">{{ $proyecto->valorVenta  }}</div>
                            <h3>{{ $proyecto->direccion }}</h3>
                            <figure>{{ $proyecto->localidad->nombre }} {{ $proyecto->localidad->provincia->nombre }}</figure>
                        </div>
                        <hr>
                        <a href="{{ route('detalle.show', $proyecto->id) }}" class="link-arrow">Saber más</a>
                    </div>
                </div>

                <img alt="" src="{{ asset('imagenes/proyectos/'.\App\ImagenInmueble::where('proyecto_id', $proyecto->id)->where('seccion_imagen','portada')->first()->nombre ) }}" >
            </div>
        @endforeach
    </div>
</div>
--}}
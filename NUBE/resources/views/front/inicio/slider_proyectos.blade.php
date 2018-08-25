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
            <img src="{{ asset('imagenes/proyectos/INube_1495908901.jpg') }}" alt="">
            <div class="col-lg-offset-5 col-lg-12" style="">
                <div class="carousel-caption" style="background-color: rgba(0,0,0,0.6); text-align: left;bottom: 0%">
                    <div class="container" style="padding-top: 100%; padding-bottom: 30%">
                        <h1 style="font-size:25px;">
                            <strong>Torre París</strong>
                        </h1>
                        <p>Julio A. Roca 1401</p>
                        <br>
                        <p>Suites de lujo, garage, acceso a zona centrica, salon de usos múltiples.</p>
                        <p>Departamentos de 45/55/65 y 70 metros cuadrados</p>
                        <a href="property-detail.html" class="link-arrow" style="color: white; text-decoration: blink">¡Me interesa!</a>
                    </div>
                </div>
            </div>
        </div>
        @foreach($proyectos as $proyecto)
        <div class="item">
          
            <img src="{{ asset('imagenes/proyectos/'.$proyecto->foto_slider()->nombre) }}" alt="">
            <div class="col-lg-offset-5 col-lg-12" style="">
                <div class="carousel-caption" style="background-color: rgba(0,0,0,0.5); text-align: left;bottom: 0%">
                    <div class="container" style="padding-top: 100%; padding-bottom: 30%">
                        <h1 style="font-size:25px;">
                            <strong>Torre París</strong>
                        </h1>
                        <p>Julio A. Roca 1401</p>
                        <br>
                        <p>Suites de lujo, garage, acceso a zona centrica, salon de usos múltiples.</p>
                        <p>Departamentos de 45/55/65 y 70 metros cuadrados</p>
                        <a href="property-detail.html" class="link-arrow" style="color: white; text-decoration: blink">¡Me interesa!</a>
                    </div>


                </div>
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
<div>
    <h1 style="margin-top: 5%; margin-left: 5%; margin-bottom: 5%; margin-right: 5%; font-size: 20px; font-weight: 500">Nuestros Proyectos</h1>
</div>

<!-- Slider de PROYECTOS -->
<div id="proyectos_carusel" class="carousel slide" data-ride="carousel" data-interval="" style="min-height: 250px;max-height: 300px;">
<!-- Wrapper for slides -->
    <div class="carousel-inner" style="min-height: 250px">
        <div class="item active" style=" min-height: 270px">
            <img src="{{ asset('imagenes/proyectos/INube_1495908901.jpg') }}" style="min-width: 200%; max-width: 200%;
    max-height: 100%; min-height: 200%; background-color: rgba(0,0,0,0.8); filter:brightness(0.6);">
            <div class="carousel-caption proyectos_mobile">
                <h1 style="font-size:25px;">
                    <strong>Torre París</strong>
                </h1>
                <p>Julio A. Roca 1401</p>
                <br>
                <p>Suites de lujo, garage, acceso a zona centrica, salon de usos múltiples.</p>
                <p>Departamentos de 45/55/65 y 70 metros cuadrados</p>
                <a href="property-detail.html" class="link-arrow" style="color: white; text-decoration: blink">Me interesa</a>
            </div>
        </div>
        @foreach($proyectos as $proyecto)
            <div class="item" style="background-color: rgba(0,0,0,0.8); filter:brightness(0.6); min-height: 270px">
                <img src="{{ asset('imagenes/proyectos/'.$proyecto->foto_slider()->nombre) }}"style="max-width: 100%;
    max-height: 100%; min-height: 200%">
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
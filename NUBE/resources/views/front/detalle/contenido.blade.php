<div id="page-content">
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li class="active">Detalle de la Propiedad</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->

    <div class="container">
        <div class="row">
            <!-- Property Detail Content -->
            <div class="col-md-9 col-sm-9">
                <section id="property-detail">
                    <header class="property-title">
                        <h1>{{  $inmueble->direccion }}</h1>
                        <figure>{{ $inmueble->localidad->nombre }}, {{$inmueble->localidad->provincia->nombre }} </figure>
                            <span class="actions">
                                <!--<a href="#" class="fa fa-print"></a>-->
                                <a href="#" class="bookmark" data-bookmark-state="empty"><span class="title-add">Me encanto!</span><span class="title-added"></span></a>
                            </span>
                    </header>

                    <section id="property-gallery">
                        <div class="owl-carousel property-carousel">
                            <?php $imagenes = $imagenesInmueble->where('seccion_imagen','detalle') ?>
                            @foreach($imagenes as $imagen)
                                <div class="property-slide">
                                    <a href="{{asset('imagenes/inmuebles/'.$imagen->nombre)}}" class="image-popup">
                                        <div class="overlay"><h3>Vista Frontal</h3></div>
                                        <img alt="" src="{{asset('imagenes/inmuebles/'.$imagen->nombre)}}" >
                                    </a>
                                </div>
                            @endforeach
                        </div><!-- /.property-carousel -->
                    </section>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            @include('front.detalle.especificaciones')
                        </div>

                        <div class="col-md-8 col-sm-12">
                            <section id="description">
                                <header><h2>Descripcion</h2></header>
                                <p>
                                    {{ $inmueble->descripcion }}
                                </p>
                                <p>
                                    {{-- $inmueble->descripcion2 --}}
                                </p>
                            </section><!-- /#description -->
                            <section id="property-features">
                                <header><h2>Ambientes</h2></header>
                                <ul class="list-unstyled property-features-list">
                                    {{--
                                    @foreach($caracteristicas as $caractetistica)
                                        <li>{{ $caracteristica->nombre }}</li>
                                    @endforeach
                                    --}}
                                    <li>Cuarto de lavado</li>
                                    <li>Pileta</li>
                                    <li>Terraza</li>
                                    <li>4 Habitaciones</li>
                                    <li>Garage para 2 coches</li>
                                    <li>Cuarto Familiar</li>
                                    <li>Piso de Parquet</li>
                                </ul>
                            </section><!-- /#property-features -->
                            <section id="floor-plans">
                                <div class="floor-plans">
                                    <header><h2>Planos</h2></header>
                                    @foreach($imagenesInmueble->where('seccion_imagen','planoMin') as $imagenInmueble)
                                        <a href="{{asset('imagenes/inmuebles/'.$imagenInmueble->nombre)}}" class="image-popup"><img alt="" src="{{asset('imagenes/inmuebles/'.$imagenInmueble->nombre)}}"></a>
                                    @endforeach
                                </div>
                            </section>
                            <!-- /Planos del inmueble -->
                            @include('front.detalle.mapa')
                            @include('front.detalle.video')
                        </div><!-- /.col-md-8 -->
                        @include('front.detalle.agenteVentas')
                    </div><!-- /.row -->
                </section><!-- /#property-detail -->
            </div><!-- /.col-md-9 -->
            <!-- end Property Detail Content -->

            <!-- sidebar -->

            <!-- end Sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
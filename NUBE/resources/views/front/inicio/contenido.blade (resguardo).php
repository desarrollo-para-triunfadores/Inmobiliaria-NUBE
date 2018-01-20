<div id="page-content">

    @include('front.partes.banner')


    <section id="our-services" class="block">
        <div class="container">
            <header class="section-title"><h2>Nuestros Servicios</h2></header>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-folder"></i></figure>
                        <aside class="description">
                            <header><h3>Amplio rango de prpiedades</h3></header>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            <a href="{{ route('listapropiedades.index') }}" class="link-arrow">Saber Más</a>
                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-users"></i></figure>
                        <aside class="description">
                            <header><h3>Tenemos agentes disponibles para asesorarlo</h3></header>
                            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>

                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-money"></i></figure>
                        <aside class="description">
                            <header><h3>Mejor calidad garantizada</h3></header>
                            <p>Phasellus non viverra tortor, id auctor leo. Suspendisse id nibh placerat</p>

                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /#our-services -->

    <section id="price-drop" class="block">
        <div class="container">
            <header class="section-title">
                <h2>Consultar</h2>
                <a href="{{ route('listapropiedades.index') }}" class="link-arrow">Todas las Propiedades</a>
            </header>
            <div class="row">
                @foreach($inmuebles->slice(0, 4) as $inmueble)
                    <div class="col-md-3 col-sm-6">
                        <div class="property">
                            <a href="{{ route('detalle.show', $inmueble->id) }}">
                                <div class="property-image">
                                    <img alt="" src="{{ asset('imagenes/inmuebles/'.\App\ImagenInmueble::where('inmueble_id', $inmueble->id)->where('seccion_imagen','portada')->first()->nombre ) }}" >
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        <div class="tag price">$ {{$inmueble->valorVenta}}</div>
                                        <h3>{{$inmueble->direccion}}</h3>
                                        <figure>{{$inmueble->localidad->nombre}}, {{$inmueble->localidad->provincia->nombre}}, {{$inmueble->localidad->provincia->pais->nombre}}</figure>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            <header>Superficie:</header>
                                            <figure>{{$inmueble->superficie}} m<sup>2</sup></figure>
                                        </li>
                                        <li>
                                            <header>Ambientes:</header>
                                            <figure>{{$inmueble->cantidadAmbientes}}</figure>
                                        </li>
                                        <li>
                                            <header>Condición:</header>
                                            <figure>{{$inmueble->condicion}}</figure>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
                @endforeach
            </div><!-- /.row-->
        </div><!-- /.container -->
    </section><!-- /#price-drop -->

    <!-- #adveritsing-->
    @include('front.partes.advertising')
    <!-- /#adveritsing-->

    <!-- #Nuestros Socios-->
    @include('front.partes.partners')
    {{----}}
    @include('front.partes.slider_proyectos')

</div>
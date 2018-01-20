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
            <!-- Results -->
            <div class="col-md-9 col-sm-9">
                <section id="results">
                    <header><h1>Listado de Propiedades</h1></header>
                    <section id="search-filter">
                        <figure><h3><i class="fa fa-search"></i>Resultados de Busqueda:</h3>
                            <span class="search-count">{{ $inmuebles->count() }}</span>
                            <div class="sorting">
                                <div class="form-group">
                                    <select name="sorting">
                                        <option value="">Agrupar por</option>
                                        <option value="1">Precio mas bajo primero</option>
                                        <option value="2">Precio mas alto primero</option>
                                        <option value="3">Fecha de inauguración</option>
                                    </select>
                                </div><!-- /.form-group -->
                            </div>
                        </figure>
                    </section>

                    <section id="properties">
                        @foreach($inmuebles as $inmueble)
                            <div class="grid">
                                <div class="property masonry">
                                    <div class="inner">
                                        <a href={{ route('detalle.show', $inmueble->id) }}>
                                            <div class="property-image">
                                                <figure class="tag status">{{ $inmueble->condicion }}</figure>
                                                <figure class="type" title="Apartment"><img src=""  alt=""></figure>
                                                <div class="overlay">
                                                    <div class="info">
                                                        @if($inmueble->valorVenta)
                                                            <div class="tag price">$ {{ $inmueble->valorVenta }}</div>
                                                        @else
                                                            <div class="tag price">$ {{ $inmueble->valorAlquiler }} x mes</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <img alt="" src="{{ asset('imagenes/inmuebles/'.\App\ImagenInmueble::where('inmueble_id', $inmueble->id)->where('seccion_imagen','portada')->first()->nombre ) }}">
                                            </div>
                                        </a>
                                        <aside>
                                            <header>
                                                <a href="property-detail.html"><h3>{{ $inmueble->direccion }}</h3></a>
                                                <figure>{{ $inmueble->localidad->nombre }}, {{ $inmueble->localidad->provincia->nombre }}</figure>
                                            </header>
                                            <p>{{ $inmueble->descripcion }}</p>
                                            <dl>
                                                <dt>Valor:</dt>
                                                @if($inmueble->conducion == 'Venta' || $inmueble->conducion == 'Venta/Alquiler')
                                                    <dd>{{$inmueble->valorVenta}}</dd>
                                                @elseif($inmueble->conducion == 'Alquiler' || $inmueble->conducion == 'Venta/Alquiler')
                                                    <dd>(alquiler ${{ $inmueble->valorAlquiler }})</dd>
                                                @endif
                                                    <dt>Superficie:</dt>
                                                <dd>{{ $inmueble->superficie }} m<sup>2</sup></dd>
                                                <dt>Hambientes:</dt>
                                                <dd>3</dd>
                                                <dt>Baños:</dt>
                                                <dd>2</dd>
                                            </dl>
                                            <a href="{{ route('detalle.show', $inmueble->id) }}" class="link-arrow">Ver más</a>
                                        </aside>
                                    </div>
                                </div><!-- /.property -->

                            </div><!-- /js-masonry-->
                        @endforeach
                        <!-- Pagination -->
                        {{--
                        <div class="center">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul><!-- /.pagination-->
                        </div><!-- /.center-->
                        --}}
                    </section><!-- /#properties-->
                </section><!-- /#results -->
            </div><!-- /.col-md-9 -->
            <!-- end Results -->

            <!-- sidebar -->
            <div class="col-md-3 col-sm-3">
                <section id="sidebar">
                    @include('front.listado.editsearch')

                    {{--
                    <aside id="featured-properties">
                        <header><h3>Featured Properties</h3></header>
                        <div class="property small">
                            <a href="property-detail.html">
                                <div class="property-image">
                                    <img alt="" src="assets/img/properties/property-06.jpg">
                                </div>
                            </a>
                            <div class="info">
                                <a href="property-detail.html"><h4>2186 Rinehart Road</h4></a>
                                <figure>Doral, FL 33178 </figure>
                                <div class="tag price">$ 72,000</div>
                            </div>
                        </div><!-- /.property -->
                        <div class="property small">
                            <a href="property-detail.html">
                                <div class="property-image">
                                    <img alt="" src="assets/img/properties/property-09.jpg">
                                </div>
                            </a>
                            <div class="info">
                                <a href="property-detail.html"><h4>2479 Murphy Court</h4></a>
                                <figure>Minneapolis, MN 55402</figure>
                                <div class="tag price">$ 36,000</div>
                            </div>
                        </div><!-- /.property -->
                        <div class="property small">
                            <a href="property-detail.html">
                                <div class="property-image">
                                    <img alt="" src="assets/img/properties/property-03.jpg">
                                </div>
                            </a>
                            <div class="info">
                                <a href="property-detail.html"><h4>1949 Tennessee Avenue</h4></a>
                                <figure>Minneapolis, MN 55402</figure>
                                <div class="tag price">$ 128,600</div>
                            </div>
                        </div><!-- /.property -->
                    </aside><!-- /#featured-properties -->
                    <aside id="our-guides">
                        <header><h3>Our Guides</h3></header>
                        <a href="#" class="universal-button">
                            <figure class="fa fa-home"></figure>
                            <span>Buying Guide</span>
                            <span class="arrow fa fa-angle-right"></span>
                        </a><!-- /.universal-button -->
                        <a href="#" class="universal-button">
                            <figure class="fa fa-umbrella"></figure>
                            <span>Right Insurance for You</span>
                            <span class="arrow fa fa-angle-right"></span>
                        </a><!-- /.universal-button -->
                    </aside><!-- /#our-guide -->
                    --}}
                </section><!-- /#sidebar -->
            </div><!-- /.col-md-3 -->
            <!-- end Sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
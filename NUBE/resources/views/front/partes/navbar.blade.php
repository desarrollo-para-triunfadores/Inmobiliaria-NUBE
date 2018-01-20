<div class="navigation">
    @include('front.partes.cabecera')
    <div class="container">
        <header class="navbar" id="top" role="banner">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand nav" id="brand">
                    <a href="{{ route('index') }}"><img src=" {{asset('imagenes/LOGO-NUBE-editado.png')}}" alt="brand"></a>
                </div>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                <ul class="nav navbar-nav">
                    <li class="active has-child"><a href="#">Inicio</a>
                        <ul class="child-navigation">
                            <li><a href="index-google-map-fullscreen.html">Google Map Full Screen</a></li>
                            <li><a href="index-google-map-fixed-height.html">Google Map Fixed Height</a></li>
                            <li><a href="index-google-map-fixed-navigation.html">Google Map Fixed Navigation</a></li>
                            <li><a href="index-osm.html">OpenStreetMap Full Screen</a></li>
                            <li><a href="index-osm-fixed-height.html">OpenStreetMap Fixed Height</a></li>
                            <li><a href="index-osm-fixed-navigation.html">OpenStreetMap Fixed Navigation</a></li>
                        </ul>
                    </li>
                    <li class="has-child"><a href="#">Propiedades</a>
                        <ul class="child-navigation">
                            <li><a href="{{ route('listapropiedades.index') }}">Listado de propiedades</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('nosotros.index') }}">Quienes Somos</a>
                    </li>

                    <li><a href="submit.html">Añadir tu propiedad</a></li>

                    <li><a href="{{ route('contacto.index') }}">Contacto</a></li>
                </ul>
            </nav><!-- /.navbar collapse-->
            <div class="add-your-property">
                <a href="submit.html" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">Añade tu propiedad</span></a>
            </div>
        </header><!-- /.navbar -->
    </div><!-- /.container -->
</div><!-- /.navigation -->
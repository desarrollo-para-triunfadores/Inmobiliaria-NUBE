<div id="page-content">
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li class="active">Contacto</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->

    <div class="container">
        <div class="row">
            <!-- Contact -->
            <div class="col-md-9 col-sm-9">
                <section id="agent-detail">
                    <header><h1>Contacto</h1></header>
                    <section id="contact-information">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <section id="address">
                                    <header><h3>Dirección</h3></header>
                                    <address>
                                        <strong>Inmobiliaria Nube</strong><br>
                                        Calle Falsa 123<br>
                                       Resistencia, Chaco, Argentina
                                    </address>
                                    +1 (734) 123-4567<br>
                                    <a href="#">info@inmobiliaria_nube.com</a><br>
                                    <strong>Skype: </strong>inmobiliaria.nube@skype.com
                                </section><!-- /#address -->
                                <section id="social">
                                    <header><h3>Social Profiles</h3></header>
                                    <div class="agent-social">
                                        <a href="#" class="fa fa-twitter btn btn-grey-dark"></a>
                                        <a href="#" class="fa fa-facebook btn btn-grey-dark"></a>
                                        <a href="#" class="fa fa-linkedin btn btn-grey-dark"></a>
                                    </div>
                                </section><!-- /#social -->
                            </div><!-- /.col-md-4 -->
                            <div class="col-md-8 col-sm-7">
                                <header><h3>Estamos Aquí</h3></header>
                                <div id="contact-map"></div>
                            </div><!-- /.col-md-8 -->
                        </div><!-- /.row -->
                    </section><!-- /#agent-info -->
                    <hr class="thick">

                    @include('front.contacto.formulario')

                </section><!-- /#agent-detail -->
            </div><!-- /.col-md-9 -->
            <!-- end Contact -->

            <!-- sidebar -->
            <div class="col-md-3 col-sm-3">
                <section id="sidebar">
                    <aside id="edit-search">
                        <header><h3>Search Properties</h3></header>
                        <form role="form" id="form-sidebar" class="form-search" action="properties-listing.html">
                            <div class="form-group">
                                <select name="type">
                                    <option value="">Status</option>
                                    <option value="1">Rent</option>
                                    <option value="2">Sale</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="country">
                                    <option value="">Country</option>
                                    <option value="1">France</option>
                                    <option value="2">Great Britain</option>
                                    <option value="3">Spain</option>
                                    <option value="4">Russia</option>
                                    <option value="5">United States</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="city">
                                    <option value="">City</option>
                                    <option value="1">New York</option>
                                    <option value="2">Los Angeles</option>
                                    <option value="3">Chicago</option>
                                    <option value="4">Houston</option>
                                    <option value="5">Philadelphia</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="district">
                                    <option value="">District</option>
                                    <option value="1">Manhattan</option>
                                    <option value="2">The Bronx</option>
                                    <option value="3">Brooklyn</option>
                                    <option value="4">Queens</option>
                                    <option value="5">Staten Island</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="property-type">
                                    <option value="">Property Type</option>
                                    <option value="1">Apartment</option>
                                    <option value="2">Condominium</option>
                                    <option value="3">Cottage</option>
                                    <option value="4">Flat</option>
                                    <option value="5">House</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <div class="price-range">
                                    <input id="price-input" type="text" name="price" value="1000;299000">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Buscar</button>
                            </div><!-- /.form-group -->
                        </form><!-- /#form-map -->
                    </aside><!-- /#edit-search -->

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
                    --}}
                    {{--
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
<!-- end Page Content -->




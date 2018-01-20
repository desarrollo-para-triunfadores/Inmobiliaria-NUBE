<div id="page-content">
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li class="active">Agraga tu propiedad</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->

    <div class="container">
        <header><h1>Agraga tu propiedad</h1></header>
        <div class="row">
            <!-- Submit-->
            <div class="col-md-9 col-sm-9">
                <section id="submit" class="submit">

                </section><!-- /#submit -->
            </div><!-- /.col-md-9 -->

        </div><!-- /.row -->

        <form role="form" id="form-submit" class="form-submit" action="thank-you.html">
            <div class="row">
                <div class="block">
                    <div class="col-md-12 col-sm-12">
                        <section id="submit-form">
                            <section id="basic-information">
                                <header><h2>Información Basica</h2></header>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="submit-title">Titulo</label>
                                            <input type="text" class="form-control" id="submit-title" name="title" required>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="submit-price">Tasación</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control" id="submit-price" name="price" pattern="\d*" required>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="submit-description">Descripcion</label>
                                    <textarea class="form-control" id="submit-description" rows="8" name="submit-description" required></textarea>
                                </div><!-- /.form-group -->
                            </section><!-- /#basic-information -->

                            <section>
                                <div class="row">
                                    <div class="block clearfix">
                                        <div class="col-md-6 col-sm-6">
                                            <section id="summary">
                                                <header><h2>Especificaciones</h2></header>
                                                <div class="form-group">
                                                    <label for="submit-location">Ubicacion</label>
                                                    <select name="type" id="submit-location">
                                                        <option value="1">Resistencia</option>
                                                        <option value="2">Barranqueras</option>
                                                        <option value="3">Fontana</option>
                                                        <option value="4">Paso de La Patria (Ctes)</option>
                                                        <option value="5">Punta del Este (Uruguay)</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="submit-property-type">Tipo</label>
                                                            <select name="type" id="submit-property-type">
                                                                <option value="1">Departamento</option>
                                                                <option value="2">Condominio</option>
                                                                <option value="3">Cabaña</option>
                                                                <option value="4">Terreno</option>
                                                                <option value="5">Casa</option>
                                                            </select>
                                                        </div><!-- /.form-group -->
                                                    </div><!-- /.col-md-6 -->
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="submit-status">Que quieres hacer con el inmueble?</label>
                                                            <select name="type" id="submit-status">
                                                                <option value="1">Vender</option>
                                                                <option value="2">Alquilar</option>
                                                            </select>
                                                        </div><!-- /.form-group -->
                                                    </div><!-- /.col-md-6 -->
                                                </div><!-- /.row -->
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="submit-Beds">Habitaciones</label>
                                                            <input type="text" class="form-control" id="submit-Beds" name="Beds" pattern="\d*" required>
                                                        </div><!-- /.form-group -->
                                                    </div><!-- /.col-md-6 -->
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="submit-Baths">Baños</label>
                                                            <input type="text" class="form-control" id="submit-Baths" name="Baths" pattern="\d*" required>
                                                        </div><!-- /.form-group -->
                                                    </div><!-- /.col-md-6 -->
                                                </div><!-- /.row -->
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="submit-area">Superficie</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="submit-area" name="area" pattern="\d*" required>
                                                                <span class="input-group-addon">m<sup>2</sup></span>
                                                            </div>
                                                        </div><!-- /.form-group -->
                                                    </div><!-- /.col-md-6 -->
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="submit-garages">Garages</label>
                                                            <input type="text" class="form-control" id="submit-garages" name="garages" pattern="\d*" required>
                                                        </div><!-- /.form-group -->
                                                    </div><!-- /.col-md-6 -->
                                                </div><!-- /.row -->
                                                {{--
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">Allow user rating <i class="fa fa-question-circle tool-tip"  data-toggle="tooltip" data-placement="right" title="Users can give you a stars rating which is displayed in property detail"></i>
                                                    </label>
                                                </div>
                                                --}}
                                            </section><!-- /#summary -->
                                        </div><!-- /.col-md-6 -->
                                        <div class="col-md-6 col-sm-6">
                                            <section id="place-on-map">
                                                <header class="section-title">
                                                    <h2>Ubicacion</h2>
                                                    <span class="link-arrow geo-location">Obtener mi ubicacion</span>
                                                </header>
                                                <div class="form-group">
                                                    <label for="address-map">Dirección</label>
                                                    <input type="text" class="form-control" id="address-map" name="address">
                                                </div><!-- /.form-group -->

                                                <div id="submit-map"></div>
                                            </section><!-- /#place-on-map -->
                                        </div><!-- /.col-md-6 -->
                                    </div><!-- /.block -->
                                </div><!-- /.row -->
                            </section>

                            {{--
                            <section class="block" id="gallery">
                                <header><h2>Fotos</h2></header>
                                <div class="center">
                                    <div class="form-group">
                                        <input id="file-upload" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="false" data-show-remove="false" accept="image/jpeg,image/png" data-browse-class="btn btn-default" data-browse-label="Browse Images">
                                        <figure class="note"><strong>Hint:</strong> You can upload all images at once!</figure>
                                    </div>
                                </div>
                            </section>
                            --}}

                            {{--@include('front.publicarPropiedad.features')--}}
                            <hr>
                        </section>
                    </div><!-- /.col-md-9 -->

                </div>
            </div><!-- /.row -->
            <div class="row">
                <div class="block">
                    <div class="col-md-12 col-sm-12">
                        <div class="center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-default large">Enviar Información</button>
                            </div><!-- /.form-group -->
                            <figure class="note block">A la brevedad de enviada la información del inmueble un Agente se contactara contigo por telefono o email</figure>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <aside class="submit-step">
                            <div class="description">
                                <h4>Review Information and Proceed to Payment</h4>
                                <p>Carefully check entered information and than click button to submit them.
                                </p>
                            </div>
                        </aside><!-- /.submit-step -->
                    </div><!-- /.col-md-3 -->
                </div>
            </div>
        </form><!-- /#form-submit -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->
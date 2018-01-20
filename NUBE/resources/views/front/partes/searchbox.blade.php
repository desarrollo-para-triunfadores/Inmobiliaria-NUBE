<div class="search-box-wrapper">
    <div class="search-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8">
                    <div class="search-box map">
                        <form role="form" id="form-map" class="form-map form-search">
                            <h2>Busca tu propiedad</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" id="search-box-property-id" placeholder="Property ID">
                            </div>
                            <div class="form-group">
                                <select name="type">
                                    <option value="">Condición</option>
                                    <option value="1">Venta</option>
                                    <option value="2">Alquiler</option>
                                    <option value="3">Venta o Alquiler</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="country">
                                    <option value="">País</option>
                                    @foreach(\App\Pais::all() as $pais)
                                        <option value={{ $pais->id }}>{{ $pais->nombre }}</option>
                                    @endforeach
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="city">
                                    <option value="">Provincia</option>
                                    @foreach(\App\Provincia::all() as $provincia)
                                        <option value={{ $provincia->id }}>{{ $provincia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="district">
                                    <option value="">Localidad</option>
                                    @foreach(\App\Localidad::all() as $localidad)
                                        <option value={{ $localidad->id }}>{{ $localidad->nombre }}</option>
                                    @endforeach
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="property-type">
                                    <option value="">Tipo de Propiedad</option>
                                    @foreach(\App\Tipo::all() as $tipo)
                                        <option value={{ $tipo->id }}>{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <div class="price-range">
                                    <input id="price-input" type="text" name="price" value="1000;299000">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Buscar!</button>
                            </div><!-- /.form-group -->
                        </form><!-- /#form-map -->
                    </div><!-- /.search-box.map -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.search-box-inner -->
</div>
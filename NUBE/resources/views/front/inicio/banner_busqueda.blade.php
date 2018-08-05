<section id="banner-busqueda">
    <div class="block center text-banner fondo-traslucido">
        <div class="container">
            <form role="form">
                <div class="row">
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select name="form-sale-country" style="display: none;">
                                @foreach($paises as $pais)
                                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select name="form-sale-city" style="display: none;">
                                @foreach($provincias as $provincia)
                                    <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select name="form-sale-district" style="display: none;">
                                @foreach($localidades as $localidad)
                                    <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select name="form-sale-property-type" style="display: none;">
                                <option value="">Tipo Inmueble</option>
                                <option value="1">Apartment</option>
                                <option value="2">Condominium</option>
                                <option value="3">Cottage</option>
                                <option value="4">Flat</option>
                                <option value="5">House</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <select name="form-sale-price" style="display: none;">
                                <option value="">Tipo Operación</option>
                                <option value="1">$10,000 +</option>
                                <option value="2">$50,000 +</option>
                                <option value="3">$100,000 +</option>
                                <option value="4">$500,000 +</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-busqueda">Buscar</button>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
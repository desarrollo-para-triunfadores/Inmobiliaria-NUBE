<aside id="edit-search">
    <header><h3>Buscar Propiedades</h3></header>
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
</aside><!-- /#edit-search -->
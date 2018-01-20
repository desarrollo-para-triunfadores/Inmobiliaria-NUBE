<section id="quick-summary" class="clearfix">
    <header><h2>Especificaciones</h2></header>
    <dl>
        <dt>Lugar:</dt>  <dd>{{ $inmueble->localidad->nombre }}, {{ $inmueble->localidad->provincia->nombre }}</dd>
        @if($inmueble->condicion=='venta' || $inmueble->condicion=='venta/alquiler')
            <dt>Precio:</dt> <dd><span class="tag price">${{ $inmueble->valorVenta }}</span></dd>
        @elseif($inmueble->condicion=='alquiler' || $inmueble->condicion=='venta/alquiler')
            <dt>Alquiler:</dt> <dd><span class="tag price">${{ $inmueble->valorAlquiler }}</span></dd>
        @endif


        <dt>Tipo:</dt>  <dd>{{ $inmueble->tipo->nombre }}</dd>
        <dt>Condicion:</dt> <dd>{{ $inmueble->condicion }}</dd>
        <dt>Superficie:</dt>    <dd>{{ $inmueble->superficie }}m<sup>2</sup></dd>
        <dt>Cuartos:</dt>   <dd> {{ $inmueble->cantidadDormitorios }}</dd>
        <dt>Baños:</dt> <dd>{{ $inmueble->cantidadBaños }}</dd>
        <dt>Garages:</dt>   <dd>{{ $inmueble->cantidadGarages }}</dd>
    </dl>
</section>
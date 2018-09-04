<section id="descripcion_2" style="background-image: {{asset('imagenes/home/edificios.jpg')}}">
    <div class="bloques-home">

{{--
        <img src={{asset('imagenes/home/white-background.jpg')}}  class="background-image" style="background-position: center center;
         padding-left: 0px;
        background-size: 100%">
--}}
        <div class="container" style="">
        <div class="row" style="min-height: 600px; ">
            {{--
            <img src="{{asset('imagenes/home/edificios.jpg')}}" data-speed="-1" class="img-parallax">
            --}}
            <br><br><br>

            <div class="col-md-7  texto-descriptivo" style="border-style: ridge; border-color: black; background-color: bisque; border-style: none;left:-10%; padding-top: 20px; padding-left: 30px; padding-bottom: 2%" >
                <div class="" >
                    <aside class="description" >
                        <header>
                                <h3 class="text-bold"><strong>Más calidad</strong><img src="{{asset('imagenes/comofunciona/check.png')}}" style="height: 30px; margin-bottom: 2%"></h3>
                        </header>
                        <h4>• Usamos herramientas de marketing digital para captar inquilinos ideales y optimizamos la inversión publicitaria</h4>
                        <br><h4>• Recaudamos los pagos de tus inquilinos, los acreditamos y aseguramos. Administramos los gastos de expensas en los inmuebles con exactitud</h4>            <br>
                        <h4>• Brindamos transparencia total en todos los procesos y notificamos todas las fechas de pago y eventos realacionados a tu inmueble</h4><br>
                        <h4>• Accedé a nuestro servicio de reparación y mantenimiento del hogar bonificado y a descuentos y ofertas exclusivas de comercios adheridos al Club de Beneficios de tu Ciudad</h4>
                        <a href="{{ route('propiedades.index') }}" class="link-arrow">Más de Nosotros </a>
                    </aside>
                </div><!-- /.feature-box -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-5">
                <img src={{asset('imagenes/home/mobile.png')}}  style="background-position: center right; height: 700px">
            </div>

        </div>
    </div>
    </div>
</section>

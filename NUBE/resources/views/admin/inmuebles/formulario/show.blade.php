@extends('admin.partes.index')

@section('title')
    Detalle del Inmueble
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 916px;" xmlns="http://www.w3.org/1999/html">
        <section class="content-header">
            <h1>
                Propiedades
                <small>registros almacenados</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
                <li>Inmuebles</li>
                <li class="active">Propiedades</li>
            </ol>
        </section>
        <section class="content">


            <div class="post">
                <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('imagenes/inmuebles/'.\App\ImagenInmueble::where('inmueble_id', $inmueble->id)->where('seccion_imagen','portada')->first()->nombre ) }}" alt="Photo" alt="User Image">
                        <span class="username">
                          <a href="#">{{ $inmueble->propietario->nombre }} {{ $inmueble->propietario->apellido }}</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">{{ $inmueble->direccion }}</span>
                    <span class="description">añadido al sistema {{ $inmueble->created_at->diffForHumans()}}</span>
                </div>
                <!-- /.user-block -->
                <div class="row margin-bottom">
                    <?php

                        $imagenes = $imagenesInmueble->where('seccion_imagen','detalle')
                    ?>
                    @foreach($imagenes as $imagen)
                        <div class="property-slide">
                            <a href="{{asset('imagenes/inmuebles/'.$imagen->nombre)}}" class="image-popup">
                                <div class="overlay"><h3>Vista Frontal</h3></div>
                                <img alt="" src="{{asset('imagenes/inmuebles/'.$imagen->nombre)}}" >
                            </a>
                        </div>
                    @endforeach

                    {{--
                    <div class="col-sm-6">
                        <img class="img-responsive" src="{{ asset('imagenes/inmuebles/'.\App\ImagenInmueble::where('inmueble_id', $inmueble->id)->where('seccion_imagen','portada')->first()->nombre ) }}" alt="Photo" alt="Photo">
                    </div>
                    --}}

                    <!-- /.col -->
                    <div class="col-sm-6">
                        <div class="row"> {{-- FOTOS DETALLE --}}
                            <div class="col-sm-6">
                                <img class="img-responsive" src="{{ asset('imagenes/inmuebles/'.\App\ImagenInmueble::where('inmueble_id', $inmueble->id)->where('seccion_imagen','portada')->first()->nombre ) }}" alt="Photo">
                                <br>
                                {{--
                                <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                                --}}
                            </div>
                            <!-- /.col -->
                            {{--
                            <div class="col-sm-6">
                                <img class="img-responsive" src="{{ asset('imagenes/inmuebles/'.\App\ImagenInmueble::where('inmueble_id', $inmueble->id)->where('seccion_imagen','portada')->first()->nombre ) }}" alt="Photo">
                                <br>
                                <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            --}}
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Compartir</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> </a>
                    </li>
                    <li class="pull-right">
                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Aqui apareceran el historial de "Oportunidades"
                            (0)</a></li>
                </ul>
                <!--
                <input class="form-control input-sm" type="text" placeholder="Type a comment">
                -->
            </div>
            <!-- /.post -->


            <div class="row">
                <div class="col-md-12">
                    <br>

                </div>


            </div>
        </section>
    </div>

    {{--@include('admin.inmuebles.formulario.create') --}}
    @include('admin.inmuebles.formulario.elemento_seleccionado')


@endsection
@section('script')
    <script src="{{ asset('js/inmueble.js') }}"></script>
@endsection
{{--
<div class="post">
    <div class="user-block">
        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
        <span class="description">Posted 5 photos - 5 days ago</span>
    </div>
    <!-- /.user-block -->
    <div class="row margin-bottom">
        <div class="col-sm-6">
            <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                    <br>
                    <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                    <br>
                    <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <ul class="list-inline">
        <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
        <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
        </li>
        <li class="pull-right">
            <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                (5)</a></li>
    </ul>

    <input class="form-control input-sm" type="text" placeholder="Type a comment">
</div>
<!-- /.post -->
--}}
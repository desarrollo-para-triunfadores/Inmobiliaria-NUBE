@extends('front.partes.index') 

@section('title') CloudProp | Detalle de propiedad
@endsection 

@section('estilos') 

<link type="text/css" rel="stylesheet" href="{{ asset('css/front/lista-propiedades.css') }}">

@endsection 

@section('content')
<div id="page-content">

    <div class="container">
        <div class="row" style="margin-top: 3%;">
            <!-- Results -->

            <div class="col-md-9 col-sm-9">

                @if(Session::has("message"))
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     {!! Session::get("message") !!}

                </div>
                @endif

                @include('front.listado.detalle')   


            </div><!-- /.col-md-9 -->
            <!-- end Results -->

            <!-- sidebar -->
            <div class="col-md-3 col-sm-3">

                @include('front.listado.panel_busqueda')   


            </div><!-- /.col-md-3 -->
            <!-- end Sidebar -->
        </div><!-- /.row -->
    </div>


</div>
@endsection




@section('script')
<script src="{{ asset('js/front/lista-propiedades.js') }}"></script>
<script>
        instanciar_slider_precio();
        var marcador = {lat:  {{$inmueble -> longitud}}, lng:  {{$inmueble -> latitud}} };</script>
<script src="{{ asset('js/front/detalle.js') }}"></script>
@endsection
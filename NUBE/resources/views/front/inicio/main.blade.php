@extends('front.partes.index') 

@section('title') CloudProp | Inicio
@endsection 

@section('estilos') 
<link href="https://fonts.googleapis.com/css?family=Raleway:200,700" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="{{ asset('css/front/inicio.css') }}">

@endsection 

@section('content')

@include('front.inicio.portada')
<div id="page-content">
    @include('front.inicio.banner_busqueda')
    <div class="hidden-xs">
        @include('front.inicio.descripcion_1')
        @include('front.inicio.descripcion_2')
        @include('front.inicio.descripcion_3')

        @include('front.inicio.advertising')
        @include('front.inicio.nuestras_propiedades')
        @include('front.inicio.partners')
        @include('front.inicio.slider_proyectos')
    </div>
    <div class="visible-xs">
        @include('front.inicio.movil.inicio_movil')
        @include('front.inicio.movil.banner_mobile')
        @include('front.inicio.movil.proyectos_mobile')
    </div>


</div>
@endsection

@section('script')
<script src="{{ asset('js/front/inicio.js') }}"></script>
<script src="{{ asset('js/front/lista-propiedades.js') }}"></script>



<script>
     // señalo como activo el módulo en navtop     
    $("#nav-inicio").addClass("active");
    instanciar_slider_precio();
</script>
@endsection

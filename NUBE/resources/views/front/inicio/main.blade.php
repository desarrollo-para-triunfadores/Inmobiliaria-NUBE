@extends('front.partes.index') 

@section('title') CloudProp | Inicio
@endsection 

@section('estilos') 
<link href="https://fonts.googleapis.com/css?family=Raleway:200,400" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('css/front/inicio.css') }}">
@endsection 

@section('content')

@include('front.inicio.portada')
<div id="page-content">
    @include('front.inicio.banner_busqueda')
    @include('front.inicio.descripcion_1')
    {{--@include('front.inicio.descripcion_2')--}}
    {{--@include('front.inicio.descripcion_3')--}}
    @include('front.inicio.advertising')
    @include('front.inicio.nuestras_propiedades') 
    @include('front.inicio.partners')
    @include('front.inicio.slider_proyectos') 
</div>
@endsection

@section('script')
<script>
    $("#nav-inicio").addClass("active");
</script>
<script src="{{ asset('js/front/inicio.js') }}"></script>
@endsection
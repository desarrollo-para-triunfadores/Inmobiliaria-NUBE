@extends('front.partes.index') 

@section('title') CloudProp | ¿Cómo funciona?
@endsection 

@section('estilos') 
<link href="https://fonts.googleapis.com/css?family=Raleway:200,400" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('css/front/como-funciona.css') }}">

@endsection 

@section('content')

@include('front.comofunciona.portada')
<div id="page-content">
    @include('front.comofunciona.contenido')
    @include('front.comofunciona.descripcion_1')
    <hr class="divider"><br>
    @include('front.comofunciona.descripcion_2')
    <hr class="divider"><br>
    @include('front.comofunciona.descripcion_3')
    <hr class="divider"><br>
    @include('front.comofunciona.descripcion_4')
    <br>
</div>
@endsection

@section('script')
<script>
    $("#nav-comofunciona").addClass("active");
</script>
<script src="{{ asset('js/front/como-funciona.js') }}"></script>
@endsection
@extends('front.partes.index') 

@section('title') CloudProp | ¿Cómo funciona?
@endsection 

@section('estilos') 
<link type="text/css" rel="stylesheet" href="{{ asset('css/front/quienes-somos.css') }}">

@endsection 

@section('content')


<div id="page-content">
    @include('front.nosotros.contenido')   
</div>
@endsection

@section('script')
<script>
    $("#nav-nosotros").addClass("active");
</script>
<script src="{{ asset('js/front/quienes-somos.js') }}"></script>
@endsection
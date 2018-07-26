@extends('front.partes.index') 

@section('title') CloudProp | Detalle de Inmueble
@endsection 

@section('estilos') 

<link type="text/css" rel="stylesheet" href="{{ asset('css/front/detalle.css') }}">

@endsection 

@section('content')
<div id="page-content">
    @include('front.detalle.contenido')   
</div>
@endsection

@section('script')
<script>
    $("#nav-listapropiedades").addClass("active");
</script>
<script src="{{ asset('js/front/detalle.js') }}"></script>
@endsection
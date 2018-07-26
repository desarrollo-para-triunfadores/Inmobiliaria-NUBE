@extends('front.partes.index') 

@section('title') CloudProp | Propiedades
@endsection 

@section('estilos') 

<link type="text/css" rel="stylesheet" href="{{ asset('css/front/lista-propiedades.css') }}">

@endsection 

@section('content')
<div id="page-content">
    @include('front.listado.contenido')   
</div>
@endsection

@section('script')
<script>
    $("#nav-listapropiedades").addClass("active");
</script>
<script src="{{ asset('js/front/lista-propiedades.js') }}"></script>
@endsection
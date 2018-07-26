@extends('front.partes.index') 

@section('title') CloudProp | Contacto
@endsection 

@section('estilos') 

<link type="text/css" rel="stylesheet" href="{{ asset('css/front/contacto.css') }}">

@endsection 

@section('content')
<div id="page-content">
    @include('front.contacto.contenido')   
</div>
@endsection

@section('script')
<script>
    $("#nav-contacto").addClass("active");
</script>
<script src="{{ asset('js/front/contacto.js') }}"></script>
@endsection
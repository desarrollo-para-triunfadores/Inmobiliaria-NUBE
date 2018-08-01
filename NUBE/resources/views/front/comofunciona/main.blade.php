@extends('front.partes.index') 

@section('title')
    CloudProp | ¿Cómo funciona?
@endsection 

@section('estilos')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/front/como-funciona.css') }}">

@endsection 

@section('content')
    <div id="page-content">
        @include('front.comofunciona.contenido')
    </div>
@endsection





@section('script')
<script>
    $("#nav-comofunciona").addClass("active");
</script>
<script src="{{ asset('js/front/como-funciona.js') }}"></script>
@endsection
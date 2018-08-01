@extends('front.partes.index') 

@section('title')
    CloudProp | ¿Cómo funciona?
@endsection 

@section('estilos') 
<link type="text/css" rel="stylesheet" href="{{ asset('css/front/quienes-somos.css') }}">
<link rel="stylesheet" href="{{asset('css/front/inicio.css')}}">
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
<!--Template Parrillada -->
<script src="{{asset('plantillas/Parrillada/js/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('plantillas/Parrillada/js/jquery.actual.min.js')}}"></script>
<script src="{{asset('plantillas/Parrillada/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('plantillas/Parrillada/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plantillas/Parrillada/js/main.js')}}"></script>
<!-- css -->
<link rel="stylesheet" href="{{asset('plantillas/Parrillada/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plantillas/Parrillada/css/bootstrap-theme.min.css')}}">
<link rel="stylesheet" href="{{asset('css/front/quienes-somos.css')}}">

<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Kreon:300,400,700'>
<link href="{{ asset('plantillas/AdminLTE/plugins/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<!--/Template Parrillada -->
@endsection
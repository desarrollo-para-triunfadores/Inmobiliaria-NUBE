<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('front.partes.estilos')
    <!-- Plantilla de Parrillada -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/estilo_template_quienessomos.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/boostrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Font Awesome -->
    <link href="{{ asset('plantillas/AdminLTE/plugins/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>

    <title>Cloudprop | Sistema de gestión inmobiliaria</title>

</head>

<body class="page-homepage navigation-fixed-top page-slider page-slider-search-box" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<!-- Wrapper -->

    @include('front.partes.navbar')

    @include('front.nosotros.contenido')



{{--
    @include('front.partes.pie')
    --}}
    <!-- end Page Footer -->

<div id="overlay"></div>
@include('front.partes.scripts')
<script src="{{ asset('plantillas/Parrillada/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
<!-- Smoothscroll -->
<script type="text/javascript" src="{{asset('js/front/jquery.corner.js')}}"></script>
<!-- Magnific Popup core JS file -->
<script src="asset('js/front/js/jquery.magnific-popup.js')}}"></script>

<!--Template Parrillada -->
<script src="{{asset('plantillas/Parrillada/js/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('plantillas/Parrillada/js/jquery.actual.min.js')}}"></script>
<script src="{{asset('plantillas/Parrillada/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('plantillas/Parrillada/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plantillas/Parrillada/js/main.js')}}"></script>
<!-- css -->
<link rel="stylesheet" href="{{asset('plantillas/Parrillada/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plantillas/Parrillada/css/bootstrap-theme.min.css')}}">
<link rel="stylesheet" href="{{asset('plantillas/Parrillada/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('plantillas/Parrillada/css/main.css')}}">
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Kreon:300,400,700'>
<!--/Template Parrillada -->

</body>
</html>
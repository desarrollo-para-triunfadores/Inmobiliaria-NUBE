<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NeaSoft">

    <title>CloudProp | ¿Como Funciona?</title>
    @include('front.partes.estilos')

</head>

<body class="page-sub-page page-property-detail" id="page-top">
<!-- Wrapper -->
<div class=""> <!--class era wrapper -->
    <!-- Navigation -->
    @include('front.partes.navbar')
    <!-- end Navigation -->
    <!-- Page Content -->
    @include('front.comofunciona.contenido')
    @include('front.comofunciona.descripcion_1')
    <hr class="divider"><br>
    @include('front.comofunciona.descripcion_2')
    <hr class="divider"><br>
    @include('front.comofunciona.descripcion_3')
    <hr class="divider">
    @include('front.comofunciona.descripcion_4')

    <!-- end Page Content -->
    <!-- Page Footer -->
    @include('front.partes.pie')
    <!-- end Page Footer -->
</div>

@include('front.partes.scripts')
<script src="{{ asset('parrillada/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
<!-- Smoothscroll -->
<script type="text/javascript" src="{{asset('js/front/jquery.corner.js')}}"></script>
<script src="{{asset('js/front/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<!-- Magnific Popup core JS file -->
<script src="asset('js/front/js/jquery.magnific-popup.js')}}"></script>
</body>
</html>
<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('front.partes.estilos')

    <title>Inmubiliaria NUBE | Sistema de gesti�n inmobiliaria</title>

</head>

<body class="page-homepage navigation-fixed-top page-slider page-slider-search-box" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<!-- Wrapper -->
<div class="wrapper">
    @include('front.partes.navbar')

    @include('front.nosotros.contenido')



{{--
    @include('front.partes.pie')
    --}}
    <!-- end Page Footer -->
</div>

<div id="overlay"></div>
@include('front.partes.scripts')
</body>
</html>
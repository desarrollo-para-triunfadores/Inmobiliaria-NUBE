<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('front.partes.estilos')

    <title>Cloudprop | Sistema de gestión inmobiliaria</title>

</head>

<body>
<!-- Wrapper -->
<div class="wrapper">
    @include('front.partes.navbar')
    <!-- Slider -->
    @include('front.partes.portada')
    <!-- end Slider -->
    <!-- Search Box -->

    <!-- end Search Box -->
    <!-- Page Content -->

    @include('front.inicio.contenido')
    <!-- end Page Content -->
    <!-- Page Footer -->

    @include('front.partes.pie')
    <!-- end Page Footer -->
</div>

<div id="overlay"></div>

@include('front.partes.scripts')
</body>
</html>
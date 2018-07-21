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
    <hr class="divider"><br>
@include('front.comofunciona.descripcion_4')
    <br>

    <!-- end Page Content -->
    <!-- Page Footer -->
    @include('front.partes.pie')
    <!-- end Page Footer -->
</div>

@include('front.partes.scripts')
</body>
</html>
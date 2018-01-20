<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Inmobiliaria Nube | Sistema de gestión inmobiliaria </title>
    @include('front.partes.estilos')
</head>

<body class="page-homepage navigation-fixed-top page-slider page-slider-search-box" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<div class="wrapper">
    <!-- Navbar y Navigation -->
    @include('front.partes.navbar')
            <!-- page content -->
    @include('front.publicarPropiedad.contenido')
            <!-- Page Footer -->
    @include('front.partes.pie')
</div>
<div id="overlay"></div>
@include('front.partes.scripts')
</body>
</html>
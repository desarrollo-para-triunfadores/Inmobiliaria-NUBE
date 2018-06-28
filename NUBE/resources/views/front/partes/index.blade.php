<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('front.partes.estilos')
    <title>Inmubiliaria CloudProp | Sistema de gestión inmobiliaria</title>

</head>

<body class="page-homepage navigation-fixed-top page-slider page-slider-search-box" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<!-- Wrapper -->
<div class="wrapper">
    @include('front.partes.navbar')
    <!-- Slider -->
    @include('front.partes.slider')
    <!-- end Slider -->
    <!-- Search Box -->
    @include('front.partes.searchbox')
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
<script>
    bootbox.confirm({
        title: "<h2>CloudProp© ¡Nueva Versión! Alpha 0.185.1: </h2>",
        message: "<p>ABM de Pesonal Técnico.</p>"+
        "<p>ABM de Solicitudes de Servicio Técnico.</p>"+
        "<p>Multiples alertas mediante barra de notificaciones al usuario.</p>"+
        "<p>Funcionalidad de incluir monto de servicio tecnico dentro de la liquidacion del cliente.</p>"+
        "<p>Funcionalidad para que el técnico pueda cobrar su servicio una vez que cliente abona boleta.</p>"+
        "<p>Correcion de errores en la liquidación de boletas.</p>"+
        "<p>Mejoras multiples en el menu de cuenta de cliente.</p>"+
        "<p>Mejoras visuales en el panel de contabilidad general de la empresa.</p>"+
        "<p>[Panel de Cuentas] Se añadio grafico de movimientos.</p>"+
        "<p>[Panel de Cuentas] Se añadio grafico de ingresos mensuales para la empresa.</p>"+
        "<p>Agenda solicitudes para los técnicos.</p>"+
        "<p>Agenda solicitudes para los clientes</p>",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancelar'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Bien!'
            }
        },
        callback: function (result) {
            console.log('Mensaje desde front.js: ' + result);
        }
    });
</script>
</body>
</html>
<!DOCTYPE html>

<html lang="es-AR">
    <head>        
        @include('front.partes.estilos')
        @yield('estilos')
    </head>
    <body>
        <!-- Wrapper -->
        <div class="wrapper">
            <!-- Inicio Navbar-->
            @include('front.partes.navbar')         
            <!-- Fin Navbar -->

            <!--Inicio Page Content -->
            @yield('content')
            <!--Fin Page Content -->

            <!-- Inicio  Pie de Página -->
            @include('front.partes.pie')
            <!-- Fin Pie de Página -->
        </div>
        <div id="overlay"></div>
        @include('front.partes.scripts')
        @yield('script')
    </body>
</html>
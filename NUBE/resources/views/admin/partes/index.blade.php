<!DOCTYPE html>
<html>
    <head>        
        @include('admin.partes.estilos')  
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- top nav -->
            @include('admin.partes.navTop') 
            <!-- logo and sidebar -->
            @include('admin.partes.sidebar') 
            <!-- page content -->
            @yield('content')
            <!-- footer -->
            @include('admin.partes.pie')
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- scripts -->
        @include('admin.partes.scripts')
        @yield('script')
    </body>
</html>
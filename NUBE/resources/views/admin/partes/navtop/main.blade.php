<header class=" bg-black-active main-header">
    <a href="index2.html" class="logo">
        <span class="logo-mini"><b>🏬 </b></span>
        <span class="logo-lg"><b>CloudProp</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Mensajes -->
              @include('admin.partes.navtop.mensajes')
              <!-- Notificationes -->
              @include('admin.partes.navtop.notificaciones')           
              <!-- Menu usuario -->
              @include('admin.partes.navtop.menu_usuario')
              <!-- Configuración interfaz -->
              <li>                    
                  <a title="Acceder al panel de configuración del sistema" href="/admin/configuracion"><i class="fa fa-gears"></i></a>
              </li>                  
            </ul>
          </div>
    </nav>
</header>

@include('admin.usuarios.formulario.act-pass')



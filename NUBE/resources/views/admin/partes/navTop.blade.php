<header class=" bg-black-active main-header">
    <a href="index2.html" class="logo">
        <span class="logo-mini"><b>NUBE</b></span>
        <span class="logo-lg"><b>Inmobiliaria</b> NUBE</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(Request::url() === 'http://localhost:8000/admin/oportunidades')
                    @include('admin.partes.notificaciones')
                @endif
                <li title="Menú del usuario" class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->imagen === "sin imagen")                                                                                                                                    
                        <img style="width:26px;height:26px" alt="User Image" class="user-image" src="{{ asset('imagenes/usuarios/sin-logo.png') }}" alt="User Avatar">                                                               
                        @else
                        <img style="width:26px;height:26px" alt="User Image" class="user-image" src="{{ asset('imagenes/usuarios/' . Auth::user()->imagen) }} " alt="User Avatar">                                
                        @endif  
                        <span class="hidden-xs">{{ Auth::user()->name }} </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            @if (Auth::user()->imagen === "sin imagen")                                                                                                                                    
                            <img style="width:90px;height:90px" alt="User Image" class="img-circle" src="{{ asset('imagenes/usuarios/sin-logo.png') }}" alt="User Avatar">                                                               
                            @else
                            <img style="width:90px;height:90px" alt="User Image" class="img-circle" src="{{ asset('imagenes/usuarios/' . Auth::user()->imagen) }} " alt="User Avatar">                                
                            @endif
                            <p>
                                {{ Auth::user()->name }}
                                <small>registrado {{ Auth::user()->created_at->diffForHumans() }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <button title="Configuración del sistema" type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-act-pass">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    Actualizar password
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"><i class="fa fa-btn fa-sign-out"></i>Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>                    
                    <a title="Acceder al panel de configuración del sistema" href="/admin/configuracion"><i class="fa fa-gears"></i></a>
                </li>

            </ul>

        </div>
    </nav>
</header>

@include('admin.usuarios.formulario.act-pass')
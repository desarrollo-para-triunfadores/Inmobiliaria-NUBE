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
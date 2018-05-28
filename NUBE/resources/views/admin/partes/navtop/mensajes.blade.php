<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-envelope-o"></i>
      @if($cantidad_mensajes_sin_leer > 0)
        <span class="label label-success">{{$cantidad_mensajes_sin_leer}}</span>
      @endif      
    </a>
    <ul class="dropdown-menu" style="width: 380px">
      @if($cantidad_mensajes_sin_leer > 1)
        <li class="header">Tienes {{$cantidad_mensajes_sin_leer}} nuevos mensajes sin leer</li>
      @elseif ($cantidad_mensajes_sin_leer === 1) 
        <li class="header">Tienes {{$cantidad_mensajes_sin_leer}} nuevo mensaje sin leer</li>
      @else
        <li class="header">No tienes nuevos mensajes</li>
      @endif
      <li>
        <!-- inner menu: contains the actual data -->
        <div style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
          @foreach($conversaciones_nav_top as $conversacion_nav_top)    
            @if($conversacion_nav_top != null)           <!-- agregue esto porque sino se rompia -->   
              <li><!-- start message -->
                <a href="#">
                  <div class="pull-left">
                    <img src="{{ asset('imagenes/usuarios/'.$conversacion_nav_top->obtener_usuario_restante()->user->imagen) }} " class="img-circle" alt="User Image">
                  </div>
                  <h4>
                    {{$conversacion_nav_top->obtener_usuario_restante()->user->name}}
                    <small>{{--$conversacion_nav_top->mensajes->last()->created_at->format('d/m/Y h:i A')--}}</small>
                  </h4>
                  @if($conversacion_nav_top->cant_mensajes_sin_leer()>0)
                    <span class="label label-warning">mensajes sin leer: {{$conversacion_nav_top->cant_mensajes_sin_leer()}}</span>
                  @endif
                  <p>{{--$conversacion_nav_top->mensajes->last()->mensaje--}}</p>
                </a>
              </li>
            @endif  
          @endforeach
          <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
          <div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div>
      </li>
      <li class="footer"><a data-toggle="tooltip" data-placement="bottom"  title="ir al módulo de mensajería" href="/admin/mensajes">ver todas</a></li> 
    </ul>
  </li>
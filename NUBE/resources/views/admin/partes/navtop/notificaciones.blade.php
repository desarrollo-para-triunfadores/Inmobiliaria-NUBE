<li class="dropdown messages-menu" onclick="cambiar_estado('notificaciones')">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-bell-o"></i>
    @if ($notificaciones->count() > 0)
      <span class="label label-warning">{{$notificaciones->count()}}</span>
    @endif
  </a>
  <ul class="dropdown-menu">
      @if ($notificaciones->count() > 0)
        <li class="header">Tienes <b>{{$notificaciones->count()}}</b> notificaciones sin leer</li>
      @else
        <li class="header">No tienes notificaciones nuevas</li>
      @endif
    <li>
      <!-- inner menu: contains the actual data -->
      <div style="position: relative; overflow: hidden; width: auto; height: 200px;">
        <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
          @foreach($notificaciones as $notificacion)
          
          <li>
              <a href="#">
                <div class="pull-left">
                    @if ($notificacion->tipo === "pago")
                    <i class="fa fa-2x fa-usd text-success"></i> 
                    @elseif ($notificacion->tipo === "vencimiento")
                    <i class="fa fa-2x fa-exclamation-circle text-warning"></i> 
                    @endif                                              
                </div>
                <h4>
                    @if ($notificacion->tipo === "pago")
                    Boleta lista
                    @elseif ($notificacion->tipo === "vencimiento")
                     Vencimiento
                    @endif
                  <small><i class="fa fa-clock-o"></i> {{$notificacion->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$notificacion->mensaje}}</p>
              </a>
            </li>
          
        
          @endforeach
      </ul>
      <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 195.122px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </li>
    <li class="footer"><a data-toggle="tooltip" data-placement="bottom"  title="ir al historial de notificaciones" href="/admin/notificaciones">ver todas</a></li>     
  </ul>
</li>
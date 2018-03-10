<li class="dropdown messages-menu" onclick="cambiar_estado('notificaciones_oportunidades')">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
    <i class="fa fa-flag-o"></i>
    @if ($notificaciones_oportunidades->count() > 0)
      <span class="label label-danger">{{$notificaciones_oportunidades->count()}}</span>
    @endif
  </a>
  <ul class="dropdown-menu">
      @if ($notificaciones_oportunidades->count() > 0)
        <li class="header">Tienes <b>{{$notificaciones_oportunidades->count()}}</b> notificaciones sin leer</li>
      @else
        <li class="header">No tienes notificaciones nuevas</li>
      @endif
    <li>
      <!-- inner menu: contains the actual data -->
      <div style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
          @foreach($notificaciones_oportunidades as $notificacion_oportunidad)         
          <li>
              <a href="#">                 
                <div class="pull-left">
                    @if ($notificacion_oportunidad->tipo === "agenda")
                    <i class="fa fa-2x fa-calendar text-danger"></i> 
                    @elseif ($notificacion_oportunidad->tipo === "oportunidad")
                    <i class="fa fa-2x fa-child text-aqua"></i> 
                    @endif                                                                   
                </div>
                <h4>
                    @if ($notificacion_oportunidad->tipo === "agenda")
                     Agenda
                    @elseif ($notificacion_oportunidad->tipo === "oportunidad")
                     Oportunidad
                    @endif
                  <small><i class="fa fa-clock-o"></i> {{$notificacion_oportunidad->created_at->diffForHumans()}}</small>
                </h4>
              <p>{{$notificacion_oportunidad->mensaje}}</p>
            </a>
          </li>                           
          @endforeach
      </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 195.122px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </li>
    <li class="footer"><a data-toggle="tooltip" data-placement="bottom"  title="ir al módulo de oportunidades" href="/admin/oportunidades">ver todas</a></li>
  </ul>
</li>
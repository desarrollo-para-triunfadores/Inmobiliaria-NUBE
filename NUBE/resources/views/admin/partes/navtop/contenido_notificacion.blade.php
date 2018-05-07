<a  class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" onclick="cambiar_estado()">
  <i class="fa fa-bell-o"></i>
  @if ($notificaciones->count() > 0)
    <span class="label label-warning">{{$notificaciones->count()}}</span>
  @endif
</a>
<ul class="dropdown-menu" style="width: 380px">
  @if ($notificaciones->count() > 0)
    <li class="header">Tienes <b>{{$notificaciones->count()}}</b> notificaciones sin leer</li>
  @else
    <li class="header">No tienes notificaciones nuevas</li>
  @endif
  <li>
    <div style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">                   
    @foreach($notificaciones as $notificacion)  
      <li>
          @if (($notificacion->tipo === 'agenda')||($notificacion->tipo === 'oportunidad'))
            <a href="/admin/oportunidades">
          @elseif ($notificacion->tipo !== 'confirmacion_visita')
            <a href="/admin/notificaciones">
          @elseif (!is_null($notificacion->visita))
            @if(!is_null($notificacion->visita->confirmada)) 
              <a href="/admin/notificaciones">
            @else
             <a>
            @endif
          @else
            <a>
          @endif
            <div class="pull-left">
              &nbsp;
              @if ($notificacion->tipo === 'oportunidad')
                <i class="fa fa-2x fa-child text-aqua"></i> 
              @elseif ($notificacion->tipo === 'calificacion')
                <i class="fa fa-star-o" aria-hidden="true"></i>
              @elseif ($notificacion->tipo === 'pago')
                <i class="fa fa-2x fa-usd text-success"></i>
              @elseif ($notificacion->tipo === 'vencimiento')
                <i class="fa fa-2x fa-exclamation-circle text-warning"></i> 
              @elseif ($notificacion->tipo === 'confirmacion_visita')
                <i class="fa fa-2x fa-calendar-check-o" aria-hidden="true"></i> 
              @elseif ($notificacion->tipo === 'visita')
                <i class="fa fa-2x fa-calendar" aria-hidden="true"></i>
              @elseif ($notificacion->tipo === 'agenda')
                <i class="fa fa-2x fa-calendar" aria-hidden="true"></i>
              @elseif ($notificacion->tipo === 'visita_del_dia')
                <i class="fa fa-2x fa-calendar text-warning" aria-hidden="true"></i>           
              @endif  
            </div>
            <h4>
              @if ($notificacion->tipo === 'oportunidad')
                Oportunidad
              @elseif ($notificacion->tipo === 'calificacion')
                ¿Qué te pareció el servicio que recibiste?
              @elseif ($notificacion->tipo === 'pago')
                Boleta lista
              @elseif ($notificacion->tipo === 'vencimiento')
                Vencimiento 
              @elseif ($notificacion->tipo === 'confirmacion_visita')
                Confirmación de visita
              @elseif ($notificacion->tipo === 'visita')
                Visita
              @elseif ($notificacion->tipo === 'agenda')
                Cita de oportunidad
              @elseif ($notificacion->tipo === 'visita_del_dia')
                Hoy tienes una visita 
              @endif
              <small>{{$notificacion->created_at->format('d/m/Y h:i A')}} <i class="fa fa-clock-o"></i></small>
            </h4>
          
            <p>{{$notificacion->mensaje}}</p>
              @if(!is_null($notificacion->visita))
                @if(is_null($notificacion->visita->confirmada)) 
                <br>
                <div class="pull-right">
                  <button type="button" onclick="confirmar_visita ('{{$notificacion->id}}', 1,'navtop')" class="btn-actualizar btn-sm btn btn-success">                    
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> confirmar cita
                  </button>
                  <button type="button" onclick="confirmar_visita ('{{$notificacion->id}}', 0,'navtop')" class="btn-actualizar btn btn-danger btn-sm">
                      <i class="fa fa-times-circle" aria-hidden="true"></i> rechazar cita
                  </button>
                </div>                 
                @endif
              @endif
          </a>
        </li>
        @endforeach
      <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
      <div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
    </div>
  </li>
  <li class="footer"><a data-toggle="tooltip" data-placement="bottom"  title="ir al historial de notificaciones" href="/admin/notificaciones">ver todas</a></li>     
</ul>
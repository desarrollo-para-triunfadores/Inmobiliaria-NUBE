@extends('admin.partes.index')

@section('title')
Notificaciones
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Tus notificaciones       
            @if (count($notificaciones) > 0)        
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-danger" onclick="borrar('lista')">Borrar las notificaciones seleccionadas</button>
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a onclick="borrar('todo')" >Borrar todas las notificaciones</a></li>                          
                </ul>
            </div>
            @endif
        </h1>
    </section>
    @if (count($notificaciones) > 0)
        <section class="content">
            <br>
            <div class="row">
                <div class="col-md-12">                                   
                    <div class="box box-widget widget-user-2 infinite-scroll">           
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                @foreach($notificaciones as $notificacion)
                                    <li>
                                        <a href="#">     
                                        <h4>
                                            <b>                                        
                                            @if ($notificacion->tipo === 'oportunidad')
                                            <i class="fa fa-child text-aqua"></i> Oportunidad
                                            @elseif ($notificacion->tipo === 'calificacion')
                                            <i class="fa fa-star-o" aria-hidden="true"></i> ¿Qué te pareció el servicio que recibiste?
                                            @elseif ($notificacion->tipo === 'pago')
                                            <i class="fa fa-usd text-success"></i> Boleta lista
                                            @elseif ($notificacion->tipo === 'vencimiento')
                                            <i class="fa fa-exclamation-circle text-warning"></i> Vencimiento
                                            @elseif ($notificacion->tipo === 'confirmacion_visita')
                                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Confirmación de visita
                                            @elseif ($notificacion->tipo === 'visita')
                                            <i class="fa fa-calendar" aria-hidden="true"></i> Visita
                                            @elseif ($notificacion->tipo === 'agenda')
                                            <i class="fa fa-calendar" aria-hidden="true"></i> Cita de oportunidad
                                            @elseif ($notificacion->tipo === 'visita_del_dia')
                                            <i class="fa fa-calendar text-warning" aria-hidden="true"></i> Hoy tienes una visita
                                            @endif                                                
                                            </b>
                                            <div class="pull-right">                                                
                                                <small><i class="fa fa-clock-o"></i> {{$notificacion->created_at->diffForHumans()}} </small>
                                                <br>
                                                <label class="pull-right form-check-label">                                            
                                                    <input type="checkbox" onchange="notificaciones_a_borrar.push({{$notificacion->id}})" class="form-check-input">  <i class="fa fa fa-trash-o"></i>                                            											
                                                </label>
                                            </div>                                            
                                        </h4>
                                        <p>{{$notificacion->mensaje}}</p>
                                        @if(!is_null($notificacion->visita))
                                            @if(is_null($notificacion->visita->confirmada))                                                                   
                                                <button type="button" onclick="confirmar_visita ('{{$notificacion->id}}', 1,'main')" class="btn-actualizar btn-sm btn btn-success">                    
                                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> confirmar cita
                                                </button>
                                                <button type="button" onclick="confirmar_visita ('{{$notificacion->id}}', 0,'main')" class="btn-actualizar btn btn-danger btn-sm">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i> rechazar cita
                                                </button>                                                    
                                            @endif
                                        @endif
                                        </a>
                                    </li>
                                @endforeach
                                {{ $notificaciones->links() }}                
                            </ul>
                        </div>
                    </div>               
                </div>                                               
            </div>
        </section>
    @else
        <br>
        <div class="col-md-12">
        <div class="alert alert-info alert-dismissible animated fadeIn">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-exclamation-circle"></i><strong>Sin notificaciones</strong></h4>
            Su lista se encuentra vacía.                                                           
        </div>
        </div>
    @endif

</div>


@endsection
@section('script')
    <script>
        var pantalla_notificaciones = true;
    </script>   
@endsection


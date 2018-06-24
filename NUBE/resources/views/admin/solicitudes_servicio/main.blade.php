@extends('admin.partes.index')

@section('title')
    CloudProp | Solicitudes Registradas   
    
@endsection

@section('content')
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('plantillas/AdminLTE/plugins/bar-rating/dist/themes/fontawesome-stars.css') }}">  

<script src="{{asset('plantillas/AdminLTE/plugins/sweetAlert2/sweetalert2.all.js')}}"></script>
    <div class="content-wrapper" style="min-height: 916px;">
        <section class="content-header">
            <h1>
                Solicitudes de Servicio
            </h1>
           
        </section>
<section class="content">
    @if(Auth::user()->obtener_rol() == 'Personal') 
    <!----- INICIO → FILA DE RESUMEN BOX ----->
        <div class="row">
            
            <div class="col-lg-6 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        @if(Auth::user()->persona->tecnico->dinero_por_cobrar() == 0)
                            <h3 class="text-center"> {{ Auth::user()->persona->tecnico->cantidad_solicitudes_por_cobrar() }} (sin monto definido)</h3>
                        @else
                            <h3 class="text-center"> {{ Auth::user()->persona->tecnico->cantidad_solicitudes_por_cobrar() }} ($ {{ Auth::user()->persona->tecnico->dinero_por_cobrar() }})</h3>
                        @endif                                   
                    </div>
                    <div class="icon">
                        <i class="fa fa-ticket"></i>
                    </div>
                    <a href="#" class="small-box-footer">Atenciones pendientes de cobro{{--<i class="fa fa-arrow-circle-right"></i>--}}</a>
                </div>
            </div>        
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        @if(App\Movimiento::totalEntrada())
                            <h3 class="text-center">$ {{ number_format(Auth::user()->persona->tecnico->get_total_recaudado() , 2) }}<sup style="font-size: 30px"></sup></h3>
                        @else
                            <h3>-<sup style="font-size: 20px"></sup></h3>
                        @endif    
                    <p></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="#" class="small-box-footer">Dinero recaudado en atenciones <i class="fa fa-money-circle-right"></i></a>
                </div>
            </div>   
        </div>
    <!----- FIN → FILA DE RESUMEN BOX ----->

    <div class="row">
        <div class="col-md-12"><br>                       
            @if(Auth::user()->persona->tecnico->solicitudes_servicio)                        
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mi historial como técnico</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table id="tabla_solicitudes_servicio_tecnico" class="display responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Técnico</th>                   
                                    <th class="text-center">Motivo</th>
                                    <th class="text-center">Solicitado por</th>
                                    <th class="text-center">Estado de solicitud</th>     
                                    <th class="text-center">Honorarios</th>                              
                                    <th class="text-center">Fecha de solicitud</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>                    
                            @foreach($solicitudes_servicio as $ss)
                                @if($ss->rubrotecnico_id == Auth::user()->persona->tecnico->rubroTecnico_id && ($ss->estado !='inicial'))  <!-- los tecnicos solo ven las solicitudes de su incumbencia-->
                                    <tr>
                                        <td class="text-center text-bold">{{$ss->tecnico->persona->nombreCompleto}}</td>                                               
                                        @if($ss->motivo != null)
                                            <td class="text-center"><i>"{{$ss->motivo}}"</i></td>
                                        @else
                                            <td class="text-center">-</td>
                                        @endif
                                        <td class="text-center">{{$ss->solicitante()->persona->nombreCompleto}}</td>   
                                        @if($ss->estado == 'inicial')                                        
                                            <td class="text-center text-green">{{ $ss->estado }}</td> 
                                        @else
                                            <td class="text-center text-blue">{{ $ss->estado }}</td>     
                                        @endif
                                        @if($ss->monto_final) 
                                            <td class="text-center text-green"><b>$ {{ number_format($ss->monto_final, 2) }}</b></td>   
                                        @else
                                            <td class="text-center text-purple">sin determinar</td>  
                                        @endif
                                                                          
                                        <td class="text-center">{{$ss->created_at->format('d/m/Y')}}</td>
                                        <td class="text-center">                          
                                            {{--
                                            <a href="{{ route('solicitudes_servicio.show', $ss->id) }}" data-toggle="tooltip" title="Visualizar el detalle de este edificio" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                            --}}                               
                                            @if($ss->tiene_visita_realizada())
                                                <a onclick="marcar_concluida({{$ss, $ss->tiene_visita_realizada()}})"  title="Realizar alguna actualizacion en la solicitud" data-toggle="tooltip" data-placement="left" class="btn btn-social-icon btn-success btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                <a onclick="addClassByClick(this)" id="btn-concluir" title="No fueron registradas visitas, no puede cerrar ésta peticion" data-toggle="tooltip" data-placement="left" class="btn btn-social-icon btn-success  btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>                                         
                                @endif                        
                            @endforeach                                              
                            </tbody>        
                        </table>                                            
                    </div>                            
                </div>   
            @else
            <div class="box box-default animated bounce">
                <h1>Todavia no tenés solicitudes tomadas</h1>
            </div>
            @endif                  
        @elseif(Auth::user()->obtener_rol() != 'Personal') 
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Mis peticiones de servicio</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="tabla-solicitante" class="display responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Inmueble</th>   
                                <th class="text-center">Técnico</th>                   
                                <th class="text-center">Motivo</th>
                                <th class="text-center">Solicito</th>
                                <th class="text-center">Estado de solicitud</th>     
                                <th class="text-center">Costo</th>                              
                                <th class="text-center">Fecha de solicitud</th>
                                <th class="text-center">Fecha Fin</th>
                                <th class="text-center">Calificacion</th>
                                {{--
                                <th class="text-center">Acciones</th>
                                --}}
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($solicitudes_servicio as $ss)
                        <tr>
                            <td class="text-center text-bold">{{$ss->contrato->inmueble->direccion}}</td>  
                            @if($ss->tecnico)
                                <td class="text-center text-bold">{{$ss->tecnico->persona->nombreCompleto}}</td>    
                            @else
                                <td class="text-center text-bold text-orange" title="*= todavia ningun técnico se ha asignado esta peticion" data-toggle="tooltip" data-placement="left">*sin técnico*</td>    
                            @endif                                                   
                            @if($ss->motivo != null)
                                <td class="text-center"><i>"{{$ss->motivo}}"</i></td>
                            @else
                                <td class="text-center">-</td>
                            @endif
                            <td class="text-center">{{$ss->solicitante()->persona->nombreCompleto}}</td>   
                            @if($ss->estado == 'inicial')                                        
                                <td class="text-center text-green">{{ $ss->estado }}</td> 
                            @else
                                <td class="text-center text-blue">{{ $ss->estado }}</td>     
                            @endif 
                            @if($ss->monto_final) 
                                <td class="text-center text-green">$ {{ $ss->monto_final }}</td>   
                            @else
                                <td class="text-center">sin determinar</td>  
                            @endif                                 
                            <td class="text-center">{{$ss->created_at->format('d/m/Y')}}</td>
                            @if(($ss->fecha_cierre) || ($ss->estado == 'concluida'))
                                <td class="text-center">{{$ss->fecha_cierre->format('d/m/Y')}}</td>
                                @if($ss->calificacion)
                                    <td>
                                        <select id="rating" name="rating" data-current-rating="{{ $ss->calificacion }}" autocomplete="on">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </td>    
                                @else
                                    @if(Auth::user()->obtener_rol() != 'Administrador')
                                        <td id="btn-calificar" onclick="calificar({{$ss}})" class="animated shake text-center text-orange">¡Calificar ahora!</td>
                                    @else
                                        <td id="btn-calificar" onclick="calificar({{$ss}})" data-toggle="tooltip" data-placement="left">Los administradores no pueden calificar 🔒</td>    
                                    @endif    
                                @endif      
                            @else

                                <td class="text-center">-</td>
                                @if(Auth::user()->obtener_rol() == 'Administrador')
                                    <td class="text-center" title="unicamente los clientes pueden calificar el servicio de los tecnicos" data-toggle="tooltip" data-placement="left">🔒</td>
                                @else
                                    <td class="text-center" title="podrá calificar esta solicitud luego de que los servicios del técnico sean realizados" data-toggle="tooltip" data-placement="left"  data-placement="top">Aún no disponible 🔒</td>
                                @endif
                            @endif        
                            {{--                                                    
                            <td class="text-center">                                           
                                <a href="{{ route('solicitudes_servicio.show', $ss->id) }}" data-toggle="tooltip" title="Visualizar el detalle de este edificio" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                <a onclick="marcar_concluida({{$ss}})"  title="Realizar alguna actualizacion en la solicitud" class="btn btn-social-icon btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            --}}
                        </tr>                                                                 
                    @endforeach  
                    </tbody>        
                </table>
            </div>
        </div>            
    @endif 
    </section>
</div>
    @include('admin.solicitudes_servicio.formulario.confirmar')
@endsection


@section('script')
    <script>
       //Datatable - instaciación del plugin
var tabla_solicitudes_servicio_tecnico = $('#tabla_solicitudes_servicio_tecnico').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    /*
    "columns": [//defino propiedades para la columnas, en este caso indico cuales quiero que se inicien ocultas.      
      null,//Inmueble      
      {"visible": false}, //Edificio      
      null,//Vigente
      null,//Desde    
      null,//Hasta
      null,//Inquilino    
      {"visible": false},//Garante
      {"visible": false},//Fecha alta
      null//Acciones
    ]
    */
  });
  
  // Datatables | filtro individuales - instanciación de los filtros
  $('#tabla_solicitudes_servicio_tecnico tfoot th').each(function () {
    var title = $(this).text()
    if (title !== '') {
      if (title !== 'Acciones') { // ignoramos la columna de los botones
        $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
      }
    }
  })
  
  // Datatables | filtro individuales - búsqueda
  tabla_solicitudes_servicio_tecnico.columns().every(function () {
    var that = this
    $('input', this.footer()).on('keyup change', function () {
      if (that.search() !== this.value) {
        that.search(this.value).draw()
      }
    })
  })
  
  //Datatables | ocultar/visualizar columnas dinámicamente
  $('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
    instaciar_filtros();
  });
  
  //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
  $('#tabla_solicitudes_servicio_tecnico tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(tabla_solicitudes_servicio_tecnico.cells().nodes()).removeClass('highlight');
    $(tabla_solicitudes_servicio_tecnico.column(colIdx).nodes()).addClass('highlight');
  });
      
    </script>
    <script src="{{ asset('js/solicitudes_servicio.js') }}"></script>

@endsection

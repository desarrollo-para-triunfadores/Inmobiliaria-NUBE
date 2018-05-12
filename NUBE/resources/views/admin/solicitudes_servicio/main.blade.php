@extends('admin.partes.index')

@section('title')
    Solicitudes Registradas   
    
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
    <div class="row">
        <div class="col-md-12"><br>                   
        @if(Auth::user()->obtener_rol() == 'Personal') 
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
                    <table id="example" class="display responsive" cellspacing="0" width="100%">
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
                            @if($ss->rubrotecnico_id == Auth::user()->persona->tecnico->rubroTecnico_id && ($ss->estado !='inicial'))  #los tecnicos solo ven las solicitudes de su incumbencia
                                <tr>
                                    <td class="text-center text-bold">{{$ss->tecnico->persona->nombreCompleto}}</td>                                               
                                    @if($ss->motivo != null)
                                        <td class="text-center">{{$ss->motivo}}</td>
                                    @else
                                        <td class="text-center">-</td>
                                    @endif
                                    <td class="text-center">{{$ss->solicitante()->persona->nombreCompleto}}</td>   
                                    <td class="text-center text-green">{{ $ss->estado }}</td>  
                                    <td class="text-center text-green">$ {{ $ss->monto_final }}</td>                                     
                                    <td class="text-center">{{$ss->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">                                           
                                        <a href="{{ route('solicitudes_servicio.show', $ss->id) }}" data-toggle="tooltip" title="Visualizar el detalle de este edificio" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                        <a onclick="marcar_concluida({{$ss}})"  title="Realizar alguna actualizacion en la solicitud" class="btn btn-social-icon btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>                                         
                            @endif                        
                        @endforeach                                              
                        </tbody>        
                    </table>                                            
                </div>                            
            </div>             
        @elseif(Auth::user()->obtener_rol() == 'Propietario' || Auth::user()->obtener_rol() == 'Inquilino' ) 
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
                    <table id="example" class="display responsive" cellspacing="0" width="100%">
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
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($solicitudes_servicio as $ss)
                        <tr>
                            <td class="text-center text-bold">{{$ss->contrato->inmueble->direccion}}</td>  
                            <td class="text-center text-bold">{{$ss->tecnico->persona->nombreCompleto}}</td>                                               
                            @if($ss->motivo != null)
                                <td class="text-center">{{$ss->motivo}}</td>
                            @else
                                <td class="text-center">-</td>
                            @endif
                            <td class="text-center">{{$ss->solicitante()->persona->nombreCompleto}}</td>   
                            <td class="text-center text-green">{{ $ss->estado }}</td>  
                            <td class="text-center text-green">$ {{ $ss->monto_final }}</td>                                     
                            <td class="text-center">{{$ss->created_at->format('d/m/Y')}}</td>
                            @if($ss->fecha_cierre)
                                <td class="text-center">{{$ss->fecha_cierre->format('d/m/Y')}}</td>
                                @if($ss->calificacion)
                                    <td>
                                        <select id="rating" name="rating" autocomplete="off">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </td>    
                                @else
                                    <td id="btn-calificar" onclick="calificar({{$ss}})">¡Calificar ahora!</td>
                                @endif      
                            @else
                                <td class="text-center">-</td>
                            @endif                                                            
                            <td class="text-center">                                           
                                <a href="{{ route('solicitudes_servicio.show', $ss->id) }}" data-toggle="tooltip" title="Visualizar el detalle de este edificio" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                <a onclick="marcar_concluida({{$ss}})"  title="Realizar alguna actualizacion en la solicitud" class="btn btn-social-icon btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
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
       
      
    </script>
    <script src="{{ asset('js/solicitudes_servicio.js') }}"></script>
@endsection

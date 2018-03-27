@extends('admin.partes.index')

@section('title')
    Solicitudes Registradas
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 916px;">
        <section class="content-header">
            <h1>
                Solicitudes de Servicio
             
            </h1>
           
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <br>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Solicitudes de Servicio</h3>
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
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Motivo</th>
                    <th class="text-center">Solicitado por</th>
                    <th class="text-center">Estado de solicitud</th>                                   
                    <th class="text-center">Fecha de solicitud</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($solicitudes_servicio as $ss)
                <tr>
                    <td class="text-center text-bold">{{$ss->tecnico->persona->nombreCompleto}}</td>                                    
                    @if($ss->fecha_inicio != null)
                        <td class="text-center">{{$ss->fecha_inicio}}</td>
                    @else
                        <td class="text-center">No establecido</td>
                    @endif
                                        @if($ss->fecha_fin != null)
                                            <td class="text-center">{{$ss->fecha_fin}}</td>
                                        @else
                                            <td class="text-center">No establecido</td>
                                        @endif
                                        @if($ss->moivo != null)
                                            <td class="text-center">{{$ss->motivo}}</td>
                                        @else
                                            <td class="text-center">-</td>
                                        @endif                                      
                                        @if($ss->solicitante_i != null)
                                            <td class="text-center  "></td>
                                        @else
                                            <td class="text-center">-</td>
                                        @endif
                                        @if($ss->estado)
                                            <td class="text-center">Si ✔️</td>
                                        @else
                                            <td class="text-center">No ❌️</td>
                                        @endif
                                        <td class="text-center">{{$ss->created_at->format('d/m/Y')}}</td>
                                        <td class="text-center">
                                            {{--
                                            <a href="{{ route('solicitudes_servicio.show', $ss->id) }}" data-toggle="tooltip" title="Visualizar el detalle de este edificio" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
                                            <a href="{{ route('solicitudes_servicio.edit', $ss->id) }}" data-toggle="tooltip" title="Editar los datos de este edificio" class="btn btn-social-icon btn-sm btn-warning"><i class="fa fa-pencil"></i></a>                                            
                                            --}}
                                            <a onclick="abrir_modal_borrar({{$ss->id}})" data-toggle="tooltip" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
            @endforeach            
            </tbody>        
        </table>
                                
    </div>
                   
    </div>                
        </section>
    </div>
    @include('admin.solicitudes_servicio.formulario.confirmar')
@endsection
@section('script')
    <script src="{{ asset('js/peticiones_servicio.js') }}"></script>
@endsection

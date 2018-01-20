@extends('admin.partes.index')

@section('title')
Oportunidades registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Oportunidades
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Lugares</li>
            <li class="active">Oportunidades</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <h3 class="box-title"> Registros</h3>
                    </div>
                    <div class="box-body ">                            
                        @include('admin.partes.msj_acciones')
                        <table id="example" class="display table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>                                  
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Nombre del interesado</th>
                                    <th class="text-center" data-toggle="tooltip" title="correo electónico del interesado">Email ✉️</th>
                                    <th class="text-center" data-toggle="tooltip" title="teléfono de contacto con el interesado">Teléfono 📞</th>
                                    <th class="text-center" data-toggle="tooltip" title="propiedad en la que el navegador estuvo interesado">Inmueble</th>
                                    <th class="text-center" data-toggle="tooltip" title="fecha en la que comenzaron las consultas del interesado via sitio web">Fecha Inicio</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oportunidades as $oportunidad)
                                <tr>
                                    @if($oportunidad->estado->id == 1)
                                        <td class="text-center text-green text-bold animated flash highlight alert">{{$oportunidad->estado->nombre}}</td>
                                    @elseif($oportunidad->estado->id == 3)
                                        <td class="text-center text-info text-bold animated fadeIn highlight alert">{{$oportunidad->estado->nombre}}</td>
                                    @else
                                        <td class="text-center text-yellow text-bold animated bounce highlight alert">{{$oportunidad->estado->nombre}}</td>
                                    @endif
                                    <td class="text-center">{{$oportunidad->nombre_interesado }}</td>
                                    <td class="text-center">{{$oportunidad->email }}</td>
                                    @if($oportunidad->telefono)
                                        <td class="text-center">{{$oportunidad->telefono }}</td>
                                    @else
                                        <td class="text-center text-red" data-toggle="tooltip" title="no completo el campo 'Teléfono'">-</td>
                                    @endif
                                    <td class="text-center">{{$oportunidad->inmueble->direccion }} ({{$oportunidad->inmueble->localidad->nombre}})</td>
                                    <td class="text-center">{{$oportunidad->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a onclick="({{$oportunidad}})" title="Enviar un mensaje al interesado"  data-toggle="modal" data-target="#modal-enviar-email" class="btn btn-social-icon btn-yahoo btn-sm"><i class="fa fa-envelope-o"></i></a>
                                        <a onclick="completar_campos({{$oportunidad}})" data-toggle="tooltip" title="Editar el estado de ésta oportunidad" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        {{--
                                        <a title="Detalle de Oportunidad" href="{{ route('oportunidades.show', $oportunidad->id) }}" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                        --}}
                                        <a onclick="abrir_modal_borrar({{$oportunidad->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--
                    <div class="box-footer">
                        <button title="Registrar una oportunidad" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;Registrar Oportunidad
                        </button>
                    </div>
                    --}}
                </div>
            </div>                                               
        </div>
    </section>
</div>

{{--
@include('admin.oportunidades.formulario.create')
--}}
@include('admin.oportunidades.email')
@include('admin.oportunidades.formulario.visita_create')
@include('admin.oportunidades.formulario.editar')
@include('admin.oportunidades.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/oportunidad.js') }}"></script>
@endsection

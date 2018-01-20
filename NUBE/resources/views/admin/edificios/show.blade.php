@extends('admin.partes.index')

@section('title')
Edificios registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Edificios
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Inmuebles</a></li>            
            <li class="active">Edificios</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <h3 class="box-title"> Detalle del registro</h3>
                    </div>
                    <div class="box-body ">                            
                        @include('admin.partes.msj_acciones')
                        <div class="row">
                            <div class="col-lg-4">

                                @if ($edificio->foto_perfil === "sin imagen")
                                <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/sin-logo.png') }}" alt="User profile picture">                                                               
                                @else
                                <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/edificios/' . $edificio->foto_perfil) }} " alt="User profile picture">
                                @endif

                            </div>    

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <span class="form-control"><strong>{{$edificio->nombre}}</strong></span>
                                </div>
                            </div>                                                                     
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dirección:</label>
                                    @if($edificio->barrio)
                                        <span class="form-control">{{$edificio->direccion}} (Barrio {{$edificio->barrio->nombre}} - {{$edificio->localidad->nombre}})</span>
                                    @else
                                        <span class="form-control">{{$edificio->direccion}} - {{$edificio->localidad->nombre}}</span>
                                    @endif
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cantidad de Departamentos:</label>
                                    <span class="form-control">{{$edificio->cant_deptos}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ascensores | Cochera</label>
                                @if($edificio->cant_ascensores < 1)
                                    <span class="form-control">Sin ascensores</span>
                                @else
                                    <span class="form-control">Si ({{$edificio->cant_ascensores}})</span>
                                @endif
                                </div>
                            </div>                                                                             
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Valor en ascensores:</label>
                                    <span class="form-control">$ {{$edificio->valor_ascensores}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Costos Personal</label>
                                    <span data-toggle="tooltip" title="costos fijos en conjunto de personal del edificio" class="form-control">$ {{$edificio->costo_sueldos_personal}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Costos Limpieza:</label>
                                    <span class="form-control">$ {{$edificio->costo_limpieza}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Costos Seguro:</label>
                                    <span class="form-control">$ {{$edificio->costo_seguro}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha Habilitación</label>
                                    <span class="form-control">{{$edificio->fecha_habilitacion}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Teléfono:</label>
                                    <span class="form-control">(3624)-99999</span>
                                </div>
                            </div>  


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <span class="form-control">info@edificio.com</span>
                                </div>
                            </div> 


                        </div>  
                    </div> 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('edificios.index') }}" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a>
                                <button title="Registrar un edificio" type="button" id="boton-modal-crear" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-crear">
                                    <i class="fa fa-plus-circle"></i> &nbsp;registrar edificio
                                </button>
                                <div class="pull-right">                                    
                                    <a onclick="completar_campos({{$edificio}})" title="Editar este registro" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> actualizar registro</a>
                                    <a onclick="abrir_modal_borrar({{$edificio->id}})" title="Eliminar este registro" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> eliminar registro</a>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>
{{--
@include('admin.Edificios.formulario.create')
@include('admin.Edificios.formulario.editar')
@include('admin.Edificios.formulario.confirmar')
--}}
@endsection
@section('script') 
<script src="{{ asset('js/edificio.js') }}"></script>
<script src="{{ asset('js/camara.js') }}"></script>
@endsection

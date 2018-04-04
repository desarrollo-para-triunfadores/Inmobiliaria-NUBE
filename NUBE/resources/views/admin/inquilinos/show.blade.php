@extends('admin.partes.index')

@section('title')
Inquilinos registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Inquilinos
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Inmuebles</a></li>            
            <li class="active">Inquilinos</li>
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
                                <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/' . $inquilino->persona->foto_perfil) }} " alt="User profile picture">                                                                
                            </div>    

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sexo:</label>
                                    <span class="form-control">{{$inquilino->persona->sexo}}</span>
                                </div>
                            </div>                                                                     
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha de nacimiento:</label>
                                    <span class="form-control">{{$inquilino->persona->fechanacformateado}}</span>                           
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Número de documento:</label>
                                    <span class="form-control">{{$inquilino->persona->dni}}</span>                           
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>País de origen:</label>
                                    <span class="form-control">{{$inquilino->persona->pais->nombre}}</span>
                                </div>
                            </div>                                                                             
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apellido/s:</label>
                                    <span class="form-control">{{$inquilino->persona->apellido}}</span>                           
                                </div>
                            </div>  

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Teléfono:</label>
                                    <span class="form-control">{{$inquilino->persona->telefono}}</span>                           
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Teléfono de contacto</label>
                                    <span class="form-control">{{$inquilino->persona->telefono_contacto}}</span>                           
                                </div>
                            </div>   

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <span class="form-control">{{$inquilino->persona->email}}</span>                           
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre/s</label>
                                    <span class="form-control">{{$inquilino->persona->nombre}}</span>                           
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Localidad:</label>
                                    <span class="form-control">{{$inquilino->persona->localidad->nombre}}</span>
                                </div>
                            </div>  

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dirección:</label>
                                    <span class="form-control">{{$inquilino->persona->direccion}}</span>
                                </div>
                            </div>
                        </div>  
                    </div> 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('inquilinos.index') }}" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a>
                                <button title="Registrar un inquilino" type="button" id="boton-modal-crear" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-crear">
                                    <i class="fa fa-plus-circle"></i> &nbsp;registrar inquilino
                                </button>
                                <div class="pull-right">                                    
                                    <a onclick="completar_campos({{$inquilino}})" title="Editar este registro" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> actualizar registro</a>
                                    <a onclick="abrir_modal_borrar({{$inquilino->id}})" title="Eliminar este registro" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> eliminar registro</a>                                       
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>
@include('admin.inquilinos.formulario.create')
@include('admin.inquilinos.formulario.update')
@include('admin.inquilinos.formulario.confirmar')

@endsection
@section('script') 
    <script src="{{ asset('js/inquilino.js') }}"></script>
    <script src="{{ asset('js/imagen_croppie.js') }}"></script>
@endsection

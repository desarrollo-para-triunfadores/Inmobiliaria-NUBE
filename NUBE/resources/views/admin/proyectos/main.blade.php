@extends('admin.partes.index')

@section('title')
Proyectos registradas
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Proyectos
            <small>registros almacenados de proyectos (con fines publicitarios)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Proyectos</li>
            <li class="active">Proyectos</li>
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
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Direccion</th>
                                    <th class="text-center">Ambientes</th>
                                    <th class="text-center">Fecha de Inauguración</th>
                                    <th class="text-center">Fecha de Registro</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($proyectos as $proyecto)
                                <tr>
                                    <td class="text-center text-bold">{{$proyecto->id}}</td>
                                    <td class="text-center text-bold">{{$proyecto->direccion}} ({{$proyecto->localidad->nombre}} - {{$proyecto->localidad->provincia->nombre}})</td>
                                    <td class="text-center">{{$proyecto->cantidadAmbientes}}</td>
                                    <td class="text-center">{{$proyecto->fechaHabilitacion}}</td>
                                    <td class="text-center">{{$proyecto->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$proyecto}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$proyecto->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar un país" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;Registrar Proyecto
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('admin.proyectos.formulario.create')
@include('admin.proyectos.formulario.editar')
@include('admin.proyectos.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/proyecto.js') }}"></script>
@endsection

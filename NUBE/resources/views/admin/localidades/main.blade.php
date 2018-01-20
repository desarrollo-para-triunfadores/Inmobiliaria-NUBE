@extends('admin.partes.index')

@section('title')
Localidades registradas
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Localidades
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Lugares</li>
            <li class="active">Localidades</li>
        </ol>
    </section>
      <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                           <i class="fa fa-list" aria-hidden="true"></i>
                        <h3 class="box-title"> Registros</h3>
                    </div>
                    <div class="box-body ">                            
                        @include('admin.partes.msj_acciones')
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Provincia</th>
                                    <th class="text-center">Pais</th>
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($localidades as $localidad)
                                <tr>
                                    <td class="text-center text-bold">{{$localidad->nombre}}</td>
                                    <td class="text-center">{{$localidad->provincia->nombre}}</td>
                                    <td class="text-center">{{$localidad->provincia->pais->nombre}}</td>
                                    <td class="text-center">{{$localidad->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$localidad}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$localidad->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Provincia</th>
                                    <th class="text-center">Pais</th>
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar un país" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar localidad
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('admin.localidades.formulario.create')
@include('admin.localidades.formulario.editar')
@include('admin.localidades.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/localidad.js') }}"></script>
@endsection

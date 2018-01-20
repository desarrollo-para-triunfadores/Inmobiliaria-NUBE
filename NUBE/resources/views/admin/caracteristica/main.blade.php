@extends('admin.partes.index')

@section('title')
Características de inmuebles registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Características de inmuebles
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Características</li>
            <li class="active">Características de inmuebles</li>
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
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Tipo de característica</th>                                  
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($caracteristicas as $caracteristica)
                                <tr>                                  
                                    <td class="text-center text-bold">{{$caracteristica->nombre}}</td>
                                    <td class="text-center text-bold">{{$caracteristica->tipo->nombre}}</td>              
                                    <td class="text-center">{{$caracteristica->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$caracteristica}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$caracteristica->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>                                                                                                            
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Tipo de característica</th>                                  
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar una característica" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar tipo de característica
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('admin.caracteristica.formulario.create')
@include('admin.caracteristica.formulario.editar')
@include('admin.caracteristica.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/caracteristica.js') }}"></script>
@endsection

@extends('admin.partes.index')

@section('title')
Servicios registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Servicios
            <small>para ser relacionados a un contrato</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Servicios</li>
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
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Cantidad de inmuebles con estos servicios en expensas</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servicios as $servicio)
                                <tr>
                                    <td class="text-center text-bold">{{$servicio->nombre}}</td>
                                    <td class="text-center">
                                        @if ($servicio->descripcion)
                                        {{$servicio->descripcion}}
                                        @else
                                        No fue registrado
                                        @endif
                                    </td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$servicio}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$servicio->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Cantidad de inmuebles con estos servicios en expensas</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar un servicio" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar servicio
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('admin.servicios.formulario.create')
@include('admin.servicios.formulario.editar')
@include('admin.servicios.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/servicio.js') }}"></script>
@endsection

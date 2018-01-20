@extends('admin.partes.index')

@section('title')
Edificios registradas
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Edificios
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Lugares</li>
            <li class="active">Edificios</li>
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
                        <table id="example" class="display table-bordered table-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Cant. Deptos</th>
                                    <th class="text-center">Direccion</th>
                                    <th class="text-center">Localidad</th>
                                    <th class="text-center">Barrio</th>
                                    <th class="text-center">Provincia</th>
                                    <th class="text-center">Seguro</th>
                                    <th class="text-center">Limpieza</th>
                                    <th class="text-center">Cochera</th>
                                    <th class="text-center">Fecha Habilitación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($edificios as $edificio)
                                <tr>
                                    <td class="text-center">{{$edificio->id}}</td>
                                    <td class="text-center text-bold">{{$edificio->nombre}}</td>
                                    @if($edificio->cant_deptos != null)
                                        <td class="text-center  ">{{$edificio->cant_deptos}}</td>
                                    @else
                                        <td class="text-center text-purple">No se registro</td>
                                    @endif
                                    @if($edificio->direccion != null)
                                        <td class="text-center  ">{{$edificio->direccion}}</td>
                                    @else
                                        <td class="text-center">-</td>
                                    @endif

                                    @if($edificio->localidad->nombre != null)
                                        <td class="text-center">{{$edificio->localidad->nombre}}</td>
                                    @else
                                        <td class="text-center">-</td>
                                    @endif
                                    @if($edificio->barrio->nombre != null)
                                        <td class="text-center">{{$edificio->barrio->nombre}}</td>
                                    @else
                                        <td class="text-center">-</td>
                                    @endif
                                    @if($edificio->localidad->provincia->nombre != null)
                                        <td class="text-center">{{$edificio->localidad->provincia->nombre}} ({{$edificio->localidad->provincia->pais->nombre}})</td>
                                    @else
                                        <td class="text-center">-</td>
                                    @endif
                                    @if($edificio->costo_seguro != null)
                                        <td class="text-center  ">$ {{$edificio->costo_seguro}}</td>
                                    @else
                                        <td class="text-center text-purple">No se registro</td>
                                    @endif
                                    @if($edificio->costo_limpieza != null)
                                        <td class="text-center  ">$ {{$edificio->costo_limpieza}}</td>
                                    @else
                                        <td class="text-center text-purple">No se registro</td>
                                    @endif
                                    @if($edificio->cochera == 1)
                                        <td class="text-center">Si  ✔️</td>
                                    @else
                                        <td class="text-center">No ❌️</td>
                                    @endif

                                    <td class="text-center">{{$edificio->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                  {{--  <a onclick="completar_campos({{$edificio->id}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a> --}}
                                        <a href="{{ route('edificios.show', $edificio->id) }}" data-toggle="tooltip" title="Visualizar el detalle de este edificio" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
                                        <a onclick="abrir_modal_borrar({{$edificio->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Cant. Deptos</th>
                                <th class="text-center">Direccion</th>
                                <th class="text-center">Localidad</th>
                                <th class="text-center">Barrio</th>
                                <th class="text-center">Provincia</th>
                                <th class="text-center">Seguro</th>
                                <th class="text-center">Limpieza</th>
                                <th class="text-center">Cochera</th>
                                <th class="text-center">Fecha Habilitación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar un edificio" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;Registrar Edificio
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('admin.edificios.formulario.create')
@include('admin.edificios.formulario.editar')
@include('admin.edificios.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/edificio.js') }}"></script>
@endsection

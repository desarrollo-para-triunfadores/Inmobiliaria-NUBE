@extends('admin.partes.index')

@section('title')
Roles registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Roles de usuario
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Lugares</li>
            <li class="active">Roles</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
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
                        <table id="example" class="row-border responsive hover order-column" cellspacing="0" width="100%">
                            <thead>
                                <tr>                                  
                                    <th class="text-center">Nombre</th>                                                                      
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $rol)
                                <tr>                                    
                                    <td class="text-center text-bold">{{$rol->name}}</td>                                   
                                    <td class="text-center">
                                        <a href="{{ route('roles.edit', $rol->name) }}" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$rol->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>                                  
                                    <th class="text-center">Nombre</th>                        
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <p class="pull-left form-text text-muted"><strong>Información:</strong> los roles proporcionan permisos de acceso a las pantallas que se enumeran en <b>módulos</b>.</p>
                        <a href="/admin/roles/create" title="Registrar un Rol" type="button"class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> &nbsp;registrar rol</a>                   
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('admin.roles.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/rol.js') }}"></script>
@endsection

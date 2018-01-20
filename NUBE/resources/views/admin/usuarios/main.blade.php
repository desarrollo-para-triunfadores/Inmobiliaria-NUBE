@extends('admin.partes.index')

@section('title')
Usuarios registrados
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Usuarios
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Usuarios</li>  
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-9">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">
                                <form>
                                    <div class="form-group">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <label>&nbsp;Filtrar usuarios</label>
                                        <select  style="width: 100%"id="select_filtro" class="select2 form-control form-control-sm" multiple="multiple">
                                            @foreach($usuarios as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>                                                    
                                            @endforeach
                                        </select> 
                                        <p class="pull-left form-text text-muted"><strong>Información:</strong> seleccione uno o más usuarios para filtrarlos en la lista de usuarios.</p>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">                                                                    
                                <button title="Registrar un usuario" type="button" id="boton-modal-crear" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-crear">
                                    <i class="fa fa-plus-circle"></i> &nbsp;registrar usuario
                                </button>  <br>                                                                                                              
                                <a href="/admin/roles/create" title="Registrar un rol de permisos de usuario" type="button" class="btn bg-purple btn-block"><i class="fa fa-plus-circle"></i> &nbsp;registrar rol</a>                                                                     
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">                    
                    @include('admin.partes.msj_acciones')                    
                </div>
                @foreach($usuarios as $usuario)
                <div class="col-md-4 li_item animated pulse" id="{{$usuario->id}}">           
                    <div class="box box-widget widget-user">
                        <div class="widget-user-header bg-primary">
                            <h3 class="widget-user-username"><b>{{$usuario->name}}</b></h3>
                            <h5 class="widget-user-desc">Registrado {{ $usuario->created_at->diffForHumans() }}</h5>
                        </div>
                        <div class="widget-user-image">
                            @if ($usuario->imagen === "sin imagen")                                                                                                                                    
                            <img style="width:90px;height:90px" alt="User Image" class="img-circle" src="{{ asset('imagenes/usuarios/sin-logo.png') }}" alt="User Avatar">                                                               
                            @else
                            <img style="width:90px;height:90px" alt="User Image" class="img-circle" src="{{ asset('imagenes/usuarios/' . $usuario->imagen) }}" alt="User Avatar">                                
                            @endif 
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-8 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Email</h5>
                                        <span>{{$usuario->email}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="description-block text-center">                                       
                                        <a onclick="completar_campos({{$usuario}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$usuario->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>                                  
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>                             
    </section>




</div>

@include('admin.usuarios.formulario.create')
@include('admin.usuarios.formulario.editar')
@include('admin.usuarios.formulario.confirmar')


@endsection
@section('script') 

<script>
    var imagen_user = 'imagenes/usuarios/{{ Auth::user()->imagen}}';
</script>

<script src="{{ asset('js/usuarios.js') }}"></script>
<script src="{{ asset('js/camara.js') }}"></script>
@endsection

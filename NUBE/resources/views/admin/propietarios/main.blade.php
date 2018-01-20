@extends('admin.partes.index')

@section('title')
Propietarios registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Propietarios
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Inmuebles</a></li>          
            <li class="active">Propietarios</li>
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
                        <div>
                            Columnas:                        
                            <a class="toggle-vis" href="" data-column="0">Apellido y nombre</a> - 
                            <a class="toggle-vis" href="" data-column="1">Sexo</a> -
                            <a class="toggle-vis" href="" data-column="2">Documento</a> - 
                            <a class="toggle-vis" href="" data-column="3">Nacionalidad</a> -
                            <a class="toggle-vis" href="" data-column="4">Nacimiento</a> - 
                            <a class="toggle-vis" href="" data-column="5">Teléfono</a> - 
                            <a class="toggle-vis" href="" data-column="6">Teléfono contacto</a> -
                            <a class="toggle-vis" href="" data-column="7">Email</a> - 
                            <a class="toggle-vis" href="" data-column="8">Localidad</a> -
                            <a class="toggle-vis" href="" data-column="9">Dirección</a> - 
                            <a class="toggle-vis" href="" data-column="10">Fecha alta</a> -
                            <a class="toggle-vis" href="" data-column="11">Acciones</a>                            
                        </div>
                        <br>
                        <table id="example" class="display responsive" cellspacing="0" width="100%">                        
                            <thead>
                                <tr>
                                    <th class="text-center">Apellido y nombre</th>
                                    <th class="text-center">Sexo</th>
                                    <th class="text-center">Documento</th>
                                    <th class="text-center">Nacionalidad</th>
                                    <th class="text-center">Nacimiento</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Teléfono contacto</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Localidad</th> 
                                    <th class="text-center">Dirección</th>                                                                       
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($propietarios as $propietario)
                                <tr>
                                    <td class="text-center text-bold">{{$propietario->persona->apellido}} {{$propietario->persona->nombre}}</td>
                                    <td class="text-center">{{$propietario->persona->sexo}}</td>
                                    <td class="text-center">{{$propietario->persona->dni}}</td>
                                    <td class="text-center">{{$propietario->persona->pais->nombre}}</td>                              
                                    <td class="text-center">{{$propietario->persona->fecha_nac}}  </td>
                                    <td class="text-center">{{$propietario->persona->telefono}}</td>
                                    <td class="text-center">
                                        @if ($propietario->persona->telefono_contacto)
                                        {{$propietario->persona->telefono_contacto}}
                                        @else
                                        No fue registrado
                                        @endif
                                    </td>
                                    <td class="text-center">{{$propietario->persona->email}}</td>
                                    <td class="text-center">{{$propietario->persona->localidad->nombre}}</td>
                                    <td class="text-center">{{$propietario->persona->direccion}}</td>
                                    <td class="text-center">{{$propietario->persona->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center" width="100">
                                        <a onclick="completar_campos({{$propietario}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$propietario->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>                                                                                                                       
                                        <a href="{{ route('propietarios.show', $propietario->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Apellido y nombre</th>
                                    <th class="text-center">Sexo</th>
                                    <th class="text-center">Documento</th>
                                    <th class="text-center">Nacionalidad</th>
                                    <th class="text-center">Nacimiento</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Teléfono contacto</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Localidad</th> 
                                    <th class="text-center">Dirección</th>                                                                       
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">                                 
                                    <button title="Registrar un propietario" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
                                        <i class="fa fa-plus-circle"></i> &nbsp;registrar propietario
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>                                               
        </div>
    </section>   
</div>

@include('admin.propietarios.formulario.create')
@include('admin.propietarios.formulario.editar')
@include('admin.propietarios.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/propietario.js') }}"></script>
<script src="{{ asset('js/camara.js') }}"></script>
@endsection

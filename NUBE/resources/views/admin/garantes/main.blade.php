@extends('admin.partes.index')

@section('title')
    Garantes registrados
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 916px;">
        <section class="content-header">
            <h1>
                Garantes
                <small>registros almacenados</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-suitcase"></i> Inmuebles</a></li>
                <li class="active">Garantes</li>
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
                                @foreach($garantes as $garante)
                                    <tr>
                                        <td class="text-center text-bold">{{$garante->persona->nombrecompleto}}</td>
                                        <td class="text-center">{{$garante->persona->sexo}}</td>
                                        <td class="text-center">{{$garante->persona->dni}}</td>
                                        <td class="text-center">{{$garante->persona->pais->nombre}}</td>
                                        <td class="text-center">{{$garante->persona->fechanacformateado}}</td>
                                        <td class="text-center">{{$garante->persona->telefono}}</td>
                                        <td class="text-center">
                                            @if ($garante->persona->telefono_contacto)
                                                {{$garante->persona->telefono_contacto}}
                                            @else
                                                No fue registrado
                                            @endif
                                        </td>
                                        <td class="text-center">{{$garante->persona->email}}</td>
                                        <td class="text-center">{{$garante->persona->localidad->nombre}}</td>
                                        <td class="text-center">{{$garante->persona->direccion}}</td>
                                        <td class="text-center">{{$garante->persona->created_at->format('d/m/Y')}}</td>
                                        <td class="text-center" width="100">
                                            <a onclick="completar_campos({{$garante}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a onclick="abrir_modal_borrar({{$garante->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            <a href="{{ route('garantes.show', $garante->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
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
                                        <button title="Registrar un garante" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
                                            <i class="fa fa-plus-circle"></i> &nbsp;Registrar Garante
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

    @include('admin.garantes.formulario.create')
    @include('admin.garantes.formulario.editar')
    @include('admin.garantes.formulario.confirmar')

@endsection
@section('script')
    <script src="{{ asset('js/garante.js') }}"></script>
    <script src="{{ asset('js/camara.js') }}"></script>
@endsection


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

                            <div>
                                Columnas:
                                <a class="toggle-vis" href="" data-column="0">Nombre</a> -
                                <a class="toggle-vis" href="" data-column="1">Localidad</a> -
                                <a class="toggle-vis" href="" data-column="2">Barrio</a> -
                                <a class="toggle-vis" href="" data-column="3">Dirección</a> -
                                <a class="toggle-vis" href="" data-column="4">Administrado por sistema</a> -
                                <a class="toggle-vis" href="" data-column="5">Cant.Departamentos</a> -
                                <a class="toggle-vis" href="" data-column="6">Seguro</a> -
                                <a class="toggle-vis" href="" data-column="7">Limpieza</a> -
                                <a class="toggle-vis" href="" data-column="8">Cochera</a> -
                                <a class="toggle-vis" href="" data-column="9">Fecha habilitación</a> -
                                <a class="toggle-vis" href="" data-column="10">Acciones</a>
                            </div>

                            <br>
                            <table id="example" class="display responsive" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Localidad</th>
                                    <th class="text-center">Barrio</th>
                                    <th class="text-center">Dirección</th>
                                    <th class="text-center">Administrado por sistema</th>
                                    <th class="text-center">Cant.Departamentos</th>
                                    <th class="text-center">Seguro</th>
                                    <th class="text-center">Limpieza</th>
                                    <th class="text-center">Cochera</th>
                                    <th class="text-center">Fecha habilitación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($edificios as $edificio)
                                    <tr>
                                        <td class="text-center text-bold">{{$edificio->nombre}}</td>                                    
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
                                        @if($edificio->Dirección != null)
                                            <td class="text-center  ">{{$edificio->Dirección}}</td>
                                        @else
                                            <td class="text-center">-</td>
                                        @endif
                                        @if($edificio->administrado_por_sistema)
                                            <td class="text-center">Si ✔️</td>
                                        @else
                                            <td class="text-center">No ❌️</td>
                                        @endif
                                        @if($edificio->cant_deptos != null)
                                        <td class="text-center  ">{{$edificio->cant_deptos}}</td>
                                        @else
                                            <td class="text-center text-purple">No se registró</td>
                                        @endif
                                        @if($edificio->costo_seguro != null)
                                            <td class="text-center">$ {{$edificio->costo_seguro}}</td>
                                        @else
                                            <td class="text-center text-purple">No se registró</td>
                                        @endif
                                        @if($edificio->costo_limpieza != null)
                                            <td class="text-center  ">$ {{$edificio->costo_limpieza}}</td>
                                        @else
                                            <td class="text-center text-purple">No se registró</td>
                                        @endif
                                        @if($edificio->cochera == 1)
                                            <td class="text-center">Si ✔️</td>
                                        @else
                                            <td class="text-center">No ❌️</td>
                                        @endif

                                        <td class="text-center">{{$edificio->created_at->format('d/m/Y')}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('edificios.show', $edificio->id) }}" data-toggle="tooltip" title="Visualizar el detalle de este edificio" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
                                            <a href="{{ route('edificios.edit', $edificio->id) }}" data-toggle="tooltip" title="Editar los datos de este edificio" class="btn btn-social-icon btn-sm btn-warning"><i class="fa fa-pencil"></i></a>                                            
                                            <a onclick="abrir_modal_borrar({{$edificio->id}})" data-toggle="tooltip" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Localidad</th>
                                    <th class="text-center">Barrio</th>
                                    <th class="text-center">Dirección</th>
                                    <th class="text-center">Administrado por sistema</th>
                                    <th class="text-center">Cant.Departamentos</th>
                                    <th class="text-center">Seguro</th>
                                    <th class="text-center">Limpieza</th>
                                    <th class="text-center">Cochera</th>
                                    <th class="text-center">Fecha habilitación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <a href="/admin/edificios/create" data-toggle="tooltip" title="Registrar un nuevo edificio" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> &nbsp;registrar un edificio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.edificios.formulario.confirmar')
@endsection
@section('script')
    <script src="{{ asset('js/edificio.js') }}"></script>
@endsection

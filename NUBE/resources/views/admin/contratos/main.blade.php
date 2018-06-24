@extends('admin.partes.index')

@section('title')
    Contratos registrados
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 916px;">
        <section class="content-header">
            <h1>
                Contratos
                <small>registro historico</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-suitcase"></i> Contratos</a></li>
                <li class="active">Contratos</li>
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
                                <a class="toggle-vis" href="" data-column="0">Inmueble</a> -
                                <a class="toggle-vis" href="" data-column="1">Edificio</a> -
                                <a class="toggle-vis" href="" data-column="2">Vigente</a> -
                                <a class="toggle-vis" href="" data-column="3">Desde</a> -
                                <a class="toggle-vis" href="" data-column="4">Hasta</a> -
                                <a class="toggle-vis" href="" data-column="5">Inquilino</a> -
                                <a class="toggle-vis" href="" data-column="6">Garante</a> -
                                <a class="toggle-vis" href="" data-column="7">Fecha alta</a> -
                                <a class="toggle-vis" href="" data-column="8">Acciones</a>
                            </div>
                            <br>
                            <table id="example" class="display responsive" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">Inmueble
                                    <th class="text-center">Propietario</th>
                                    <th class="text-center">Edificio</th>
                                    <th class="text-center">Vigente</th>
                                    <th class="text-center">Desde</th>
                                    <th class="text-center">Hasta</th>
                                    <th class="text-center">Inquilino</th>
                                    <th class="text-center">Garante</th>
                                    <th class="text-center" data-toggle="tooltip" title="fecha en que se registro el contrato en el sistema">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contratos as $contrato)
                                    <tr>
                                        @if($contrato->inmueble->piso || $contrato->inmueble->numDepto)
                                            <td class="text-center text-bold">
                                                    <a href="{{route('inmuebles.edit', $contrato->inmueble->id)}}">{{$contrato->inmueble->tipo->nombre}} en {{$contrato->inmueble->direccion }}  (Piso {{$contrato->inmueble->piso}} Depto {{$contrato->inmueble->numDepto}})
                                                    @if(!$contrato->inmueble->edificio)
                                                         {{$contrato->inmueble->localidad->nombre}}
                                                    @endif
                                                </a>️
                                            </td>
                                        @else
                                            <td class="text-center text-bold">{{$contrato->inmueble->tipo->nombre}} en {{$contrato->inmueble->direccion}} ({{$contrato->inmueble->localidad->nombre}})</td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{route('propietarios.show', $contrato->inmueble->propietario->id)}}">{{ $contrato->inmueble->propietario->persona->nombreCompleto }}</a>
                                        </td>
                                        @if($contrato->inmueble->edificio)
                                            <td class="text-center"><a href="{{route('edificios.show', $contrato->inmueble->edificio->id)}}"> {{$contrato->inmueble->edificio->nombre}} ({{$contrato->inmueble->localidad->nombre}})️</a></td>
                                        @else
                                            <td class="text-center text-red"> - </td>
                                        @endif
                                        @if($contrato->vigente())
                                            <td class="text-center">✔️</td>
                                        @else
                                            <td class="text-center text-red"> ❌ </td>
                                        @endif
                                        <td class="text-center">{{$contrato->FechaDesdeFormateado}}</td>
                                        <td class="text-center">{{$contrato->FechaHastaFormateado}}</td>
                                        <td class="text-center"><a style="color: black" href="{{route('inquilinos.show',$contrato->inquilino->id)}}">{{$contrato->inquilino->persona->nombrecompleto}}</a></td>
                                        <td class="text-center"><a class="text-maroon" href="{{route('garantes.show',$contrato->garante->id)}}">{{$contrato->garante->persona->nombrecompleto}}</a></td>
                                        <td class="text-center">{{$contrato->created_at->format('d/m/Y')}}</td>

                                        <td class="text-center" width="100">
                                            {{--
                                         <a onclick="completar_campos({{$contrato}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>--}}
                                            
                                         <a href="{{ route('contratos.edit', $contrato->id) }}" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                         <a onclick="abrir_modal_borrar({{$contrato->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>                                         
                                            <a href="{{ route('contratos.show', $contrato->id) }}" data-toggle="tooltip" title="Visualizar el detalle de este contrato" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">Inmueble</th>
                                    <th class="text-center">Propietario</th>
                                    <th class="text-center">Edificio</th>
                                    <th class="text-center">Vigente</th>
                                    <th class="text-center">Desde</th>
                                    <th class="text-center">Hasta</th>
                                    <th class="text-center">Inquilino</th>
                                    <th class="text-center">Garante</th>
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
                                        <a href="/admin/contratos/create" title="Registrar un contrato" class="btn btn-primary"><i class="fa fa-plus-circle"></i> &nbsp;registrar un contrato</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@include('admin.contratos.formulario.confirmar')

@endsection
@section('script')
    <script src="{{ asset('js/contrato.js') }}"></script>
@endsection

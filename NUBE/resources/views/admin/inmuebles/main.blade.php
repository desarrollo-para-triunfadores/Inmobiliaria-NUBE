@extends('admin.partes.index') 
@section('title') Inmuebles Registrados 
@endsection 
@section('content')
<div class="content-wrapper" style="min-height: 916px;" xmlns="http://www.w3.org/1999/html">
    <section class="content-header">
        <h1>
            Propiedades
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-suitcase"></i> Generales</a>
            </li>
            <li>Inmuebles</li>
            <li class="active">Propiedades</li>
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
                                <a class="toggle-vis" href="" data-column="0">Condición</a> -
                                <a class="toggle-vis" href="" data-column="1">Tipo</a> -
                                <a class="toggle-vis" href="" data-column="2">Dirección</a> -
                                <a class="toggle-vis" href="" data-column="3">Cant.Ambientes</a> -
                                <a class="toggle-vis" href="" data-column="4">Precio venta</a> -
                                <a class="toggle-vis" href="" data-column="5">Precio alquiler</a> -
                                <a class="toggle-vis" href="" data-column="6">F.Habilitación</a> -
                                <a class="toggle-vis" href="" data-column="7">Contrato de alquiler</a> -
                                <a class="toggle-vis" href="" data-column="8">Fecha de Alta</a> -				
                                <a class="toggle-vis" href="" data-column="9">Acciones</a>
                            </div>
                            <br>
                                <table id="example" class="display responsive" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Condición</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Dirección</th>
                                            <th class="text-center">Cant.Ambientes</th>
                                            <th class="text-center">Precio venta</th>
                                            <th class="text-center">Precio alquiler</th>
                                            <th class="text-center">F.Habilitación</th>
                                            <th class="text-center">Contrato de alquiler</th>
                                            <th class="text-center">Propietario</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inmuebles as $inmueble)
                                        <tr>
                                            <td class="text-center">{{$inmueble->condicion}}</td>
                                            @if($inmueble->piso || $inmueble->numDepto)
                                            <td class="text-center bold">{{$inmueble->tipo->nombre}} <b>P {{$inmueble->piso}} | N° {{$inmueble->numDepto}}</b></td>
                                            @else
                                            <td class="text-center bold">{{$inmueble->tipo->nombre}}</td>
                                            @endif

                                            @if($inmueble->edificio)
                                            <td class="text-center bold"><b>{{$inmueble->edificio->nombre}}</b> | {{$inmueble->direccion}} ({{$inmueble->localidad->nombre}})</td>
                                            @else
                                            <td class="text-center bold">{{$inmueble->direccion}} ({{$inmueble->localidad->nombre}})</td>
                                            @endif

                                            <td class="text-center">{{$inmueble->cantidadAmbientes}}</td>
                                            @if($inmueble->condicion!=='alquiler')
                                            <td class="text-center">${{$inmueble->valorVenta}}</td>
                                            @else
                                            <td class="text-center">Solo alquiler</td>
                                            @endif @if($inmueble->condicion !=='venta')
                                            <td class="text-center">${{$inmueble->valorAlquiler}}</td>
                                            @else
                                            <td class="text-center">Solo venta</td>
                                            @endif
                                            <td class="text-center">{{$inmueble->FechaHabilitacionFormateado}}</td>
                                            @if ($inmueble->contratos->count()<1) 
                                            <td class="text-center text-red">Inmueble libre</td>
                                            @elseif ($inmueble->ultimo_contrato()->vigente())
                                            <td class="text-center text-green">Sí (hasta {{$inmueble->ultimo_contrato()->FechaHastaFormateado}})</td>
                                            @else
                                            <td class="text-center text-red">Inmueble libre</td>
                                            @endif
                                            <td class="text-center">{{$inmueble->propietario->persona->nombre}} {{$inmueble->propietario->persona->apellido}}</td>
                                            <td class="text-center">
                                                <a title="Ver este inmueble" href="{{ route('inmuebles.edit', $inmueble->id) }}" class="btn btn-social-icon btn-warning btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a onclick="abrir_modal_borrar({{$inmueble->id}}, {{$inmueble->disponible_eliminacion()}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">Condición</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Dirección</th>
                                            <th class="text-center">Cant.Ambientes</th>
                                            <th class="text-center">Precio venta</th>
                                            <th class="text-center">Precio alquiler</th>
                                            <th class="text-center">F.Habilitación</th>
                                            <th class="text-center">Contrato de alquiler</th>
                                            <th class="text-center">Fecha de Alta</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">																				
                                        <a data-toggle="tooltip" data-placement="bottom" href="{{ route('inmuebles.create') }}" title="Registrar una nueva propiedad de la inmobiliaria" class="btn btn-primary">
                                            <span class="fa fa-plus-circle" aria-hidden="true"></span> 
                                            registrar inmueble
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</div>
    @include('admin.inmuebles.formulario.confirmar')
@endsection

@section('script')
<script src="{{ asset('js/inmueble.js') }}"></script>
@endsection
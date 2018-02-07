@extends('admin.partes.index')

@section('title')
Pagos pendientes
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Pagos pendientes
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Liquidaciones mensuales</a></li>            
            <li class="active">Pagos pendientes</li>
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
                        @if (count($liquidaciones) > 0)
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>                                  
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Periodo a pagar</th>
                                    <th class="text-center">Monto</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($liquidaciones as $liquidacion)
                                <tr>                                    
                                    <td class="text-center text-bold">{{$liquidacion->contrato->inmueble->propietario->persona->nombrecompleto}}</td>
                                    <td class="text-center">{{$liquidacion->periodo}}</td>
                                    <td class="text-center">${{$liquidacion->total}}</td>
                                    <td class="text-center">                                        
                                        <a onclick="abrir_modal_confirmar({{$liquidacion->id}})" title="marcar como pagado" class="btn btn-social-icon btn-sm btn-success"><i class="fa fa-check"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>                                  
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Periodo a pagar</th>
                                    <th class="text-center">Monto</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                        @else
                        <div class="callout callout-info animated fadeIn">
                            <h4><i class="icon fa fa-exclamation-circle"></i><strong> No hay pagos pendientes</strong></h4>            
                            <p>Actualmente el no existen pagos pendientes a clientes de la empresa.</p>
                          </div>                       
                        @endif                                                                                  
                    </div>                   
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('admin.pagos.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/pago.js') }}"></script>
@endsection

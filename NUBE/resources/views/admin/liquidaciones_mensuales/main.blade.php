@extends('admin.partes.index') 
@section('title') 
Registros listos para liquidar
@endsection 
@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Liquidaciones mensuales
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-suitcase"></i> Liquidaciones mensuales</a>
            </li>
            <li class="active">Registros de liquidaciones</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <h3 class="box-title"> Registros listos para liquidar</h3>
                    </div>
                    <div class="box-body ">
                        @include('admin.partes.msj_acciones')
                        @if (count($liquidaciones) > 0)
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Inquilino</th>
                                    <th class="text-center">Periodo</th>
                                    <th class="text-center">Valor expensas</th>
                                    <th class="text-center">Valor alquiler</th>
                                    <th class="text-center">Gastos administrativos</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Fecha vencimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($liquidaciones as $liquidacion)
                                <tr>
                                    <td class="text-center text-bold">{{$liquidacion->contrato->inquilino->persona->nombrecompleto}}</td>
                                    <td class="text-center text-bold">{{$liquidacion->periodo}}</td>
                                    <td class="text-center">${{$liquidacion->calcular_total()}}</td>
                                    <td class="text-center">${{$liquidacion->alquiler}}</td>
                                    <td class="text-center">${{$liquidacion->gastos_administrativos}}</td>
                                    <td class="text-center text-bold">${{$liquidacion->subtotal}}</td>
                                    <td class="text-center text-bold">${{$liquidacion->total}}</td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control datepicker" onchange="carga_lineas({{$liquidacion->id}}, this.value)">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Inquilino</th>
                                    <th class="text-center">Periodo</th>
                                    <th class="text-center">Valor expensas</th>
                                    <th class="text-center">Valor alquiler</th>
                                    <th class="text-center">Gastos administrativos</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Fecha vencimiento</th>
                                </tr>
                            </tfoot>
                        </table>
                        @else
                        <div class="callout callout-info animated fadeIn">
                            <h4><i class="icon fa fa-exclamation-circle"></i><strong> No hay nada que liquidar</strong></h4>            
                            <p>Actualmente no existen registros en condición de poder ser liquidados.</p>
                        </div>                       
                        @endif 


                    </div>
                    <div class="box-footer">
                        @if (count($liquidaciones) > 0)
                        <button title="Registrar las liquidaciones" type="button" onclick="enviar()" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal"
                                data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;Registrar Liquidaciones
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection @section('script')
<script>
            $("#side-liquidaciones").addClass("active");
            $("#side-liquidaciones-ul").addClass("menu-open");
            $("#side-ele-visualizar-liquidaciones").addClass("active");	</script>
<script src="{{ asset('js/liquidacion.js') }}"></script>
@endsection
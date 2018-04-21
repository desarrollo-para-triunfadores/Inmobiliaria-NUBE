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
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i> Clientes
                                @if(count($liquidaciones)>0)
                                <span class="label label-danger">{{count($liquidaciones)}}</span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="#tab_2" data-toggle="tab">
                                <i class="fa fa-wrench" aria-hidden="true"></i> Personal Técnico
                                @if(count($solicitudes)>0)
                                <span class="label label-danger">{{count($solicitudes)}}</span>
                                @endif
                            </a>
                        </li>                            
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                        @include('admin.pagos.tabla_clientes')
                        </div>                             
                        <div class="tab-pane" id="tab_2">
                        @include('admin.pagos.tabla_personal')
                        </div>                              
                    </div>
                </div>                
            </div>                                               
        </div>
    </section>
</div>


@endsection
@section('script') 
<script src="{{ asset('js/pago.js') }}"></script>
@endsection

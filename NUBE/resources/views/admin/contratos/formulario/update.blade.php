@extends('admin.partes.index')

@section('title')
Inmuebles Registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Contratos
            <small>editar un contrato</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Contratos</a></li>          
            <li class="active">Contratos</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">        
                <a href="/admin/contratos" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">         
                <form id="form"  action="/admin/contratos/{{$contrato->id}}" method="POST"  class="form-horizontal" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">            
                    <div id="rootwizard">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="navbar">
                                    <div class="navbar-inner" style="display: inline-block;">
                                        <div class="container">
                                            <ul>
                                                <li><a href="#tab1" data-toggle="tab"><h4>Datos básicos</h2></a></li>  
                                                <li><a href="#tab2" data-toggle="tab"><h4>Inquilino</h2></a></li> 
                                                <li><a href="#tab3" data-toggle="tab"><h4>Garante</h2></a></li> 
                                                <li><a href="#tab4" data-toggle="tab"><h4>Servicios</h2></a></li> 
                                                <li><a href="#tab5" data-toggle="tab"><h4>Confirmar </h2></a></li>  
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="bar" class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                </div>
                            </div>                                         
                        </div>
                        <div class="box">
                            <div class="box-body ">                            
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1">
                                        @include('admin.contratos.formulario.secciones_wizard.datos_basicos')       
                                    </div>

                                    <div class="tab-pane" id="tab2">
                                        @include('admin.contratos.formulario.secciones_wizard.inquilino')
                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        @include('admin.contratos.formulario.secciones_wizard.garante')
                                    </div> 

                                    <div class="tab-pane" id="tab4">
                                        @include('admin.contratos.formulario.secciones_wizard.servicios')
                                    </div>      

                                    <div class="tab-pane" id="tab5">
                                        @include('admin.contratos.formulario.secciones_wizard.confirmacion')
                                    </div>                                    
                                    <ul class="pager wizard">
                                        <li class="previous">
                                            <a href="#">
                                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                                &nbsp;volver
                                            </a>
                                        </li>
                                        <li class="next">
                                            <a href="#">                                               
                                                siguiente&nbsp;
                                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="finish">
                                            <a href="javascript:;">
                                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                &nbsp;registrar datos
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
            </div>                                               
        </div>
    </section>
</div>

@endsection
@section('script') 
<!-- Mascara para manejo de dinero (MaskMoney) -->
<script src="{{ asset('plantillas/ADMINLTE/maskmoney/src/jquery.maskMoney.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/contrato_croppie.js') }}"></script>
<script src="{{ asset('js/contrato.js') }}"></script>
<script>
    /*Campos de la sección Datos Básicos*/
    $('#inmueble_id').val('{{$contrato->inmueble_id}}').trigger("change");
    $('#tipo_renta').val('{{$contrato->tipo_renta}}').trigger("change");      
    
    datos_calculo_renta.fecha_desde = moment('{{$contrato->fecha_desde}}');
    datos_calculo_renta.fecha_hasta = moment('{{$contrato->fecha_hasta}}');
    datos_calculo_renta.valor_alquiler = parseFloat('{{$contrato->monto_basico}}');            
    datos_calculo_renta.periodo_incremento = parseInt('{{$contrato->periodos}}');
    datos_calculo_renta.tasa = parseFloat('{{$contrato->incremento}}');
    
    calcular_meses_renta();

    /*Campos de la sección Inquilino y Garante*/
    $('#inquilino_id').val('{{$contrato->inquilino->persona->id}}').trigger("change");
    $('#garante_id').val('{{$contrato->garante->persona->id}}').trigger("change");

    /*Campos de la sección Servicios*/   
    if('{{$contrato->sujeto_a_gastos_compartidos}}'==='1'){
        $('#sujeto_a_gastos_compartidos').prop('checked', true);
    }else{
        $('#sujeto_a_gastos_compartidos').prop('checked', false);
    }
</script>
@endsection

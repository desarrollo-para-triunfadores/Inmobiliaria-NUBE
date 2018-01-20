@extends('admin.partes.index')

@section('title')
Configuracion de Empresa
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Configuraciones
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a onclick="$('#color').val('');" href="#"><i class="fa fa-gear"></i> Configuración</a></li>                 
        </ol>
    </section>
    <section class="content">
        <div class="row">          
            <div class="col-md-12">
                @include('admin.partes.msj_acciones')
                @include('admin.configuracion.formulario.editar')
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab" onclick="cambiar_info('#tab_1')" aria-expanded="false">    
                                <i class="fa fa-list-alt fa-lg" aria-hidden="true"></i>
                                &nbsp;&nbsp;Información de la empresa
                            </a>
                        </li>
                        <li>
                            <a href="#tab_2" data-toggle="tab"  onclick="cambiar_info('#tab_2')" aria-expanded="true">
                                <i class="fa fa-paint-brush fa-lg" aria-hidden="true"></i>
                                &nbsp;&nbsp;Colores del sistema
                            </a>
                        </li>         
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div id="map" style="width:auto;height:450px;"></div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div class="box-body" style="width:auto;height:450px;">                            
                                <ul class="list-unstyled clearfix">
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-blue');" href="javascript:void(0);" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 27px; background: #367fa9;"></span>
                                                <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #222d32;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin">Azul</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-black');" href="javascript:void(0);" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                                <span style="display:block; width: 20%; float: left; height: 27px; background: #fefefe;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 27px; background: #fefefe;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #222;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin">Blanco</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-purple');" href="javascript:void(0);" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 27px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #222d32;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin">Púrpura</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-green');" href="javascript:void(0);" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 27px;" class="bg-green-active"></span>
                                                <span class="bg-green" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #222d32;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin">Verde</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-red');" href="javascript:void(0);" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 27px;" class="bg-red-active"></span>
                                                <span class="bg-red" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #222d32;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin">Rojo</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-yellow');" href="javascript:void(0);" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 27px;" class="bg-yellow-active"></span>
                                                <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #222d32;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin">Amarillo</p></li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-blue-light');" href="javascript:void(0);" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 27px; background: #367fa9;"></span>
                                                <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #f9fafc;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin" style="font-size: 12px">Azul Light</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-black-light');" href="javascript:void(0);" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                                <span style="display:block; width: 20%; float: left; height: 27px; background: #fefefe;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 27px; background: #fefefe;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #f9fafc;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin" style="font-size: 12px">Blanco Light</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-purple-light');" href="javascript:void(0);" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 27px;" class="bg-purple-active"></span>
                                                <span class="bg-purple" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #f9fafc;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin" style="font-size: 12px">Púrpura Light</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-green-light');" href="javascript:void(0);" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 27px;" class="bg-green-active"></span>
                                                <span class="bg-green" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #f9fafc;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin" style="font-size: 12px">Verde Light</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-red-light');" href="javascript:void(0);" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div>
                                                <span style="display:block; width: 20%; float: left; height: 27px;" class="bg-red-active"></span>
                                                <span class="bg-red" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #f9fafc;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin" style="font-size: 12px">Rojo Light</p>
                                    </li>
                                    <li style="float:left; width: 33.33333%; padding: 5px;">
                                        <a onclick="$('#color').val('skin-yellow-light');" href="javascript:void(0);" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 27px;" class="bg-yellow-active"></span>
                                                <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 27px;"></span>
                                            </div>
                                            <div>
                                                <span style="display:block; width: 20%; float: left; height: 50px; background: #f9fafc;"></span>
                                                <span style="display:block; width: 80%; float: left; height: 50px; background: #f4f5f7;"></span>
                                            </div>
                                        </a>
                                        <p class="text-center no-margin" style="font-size: 12px;">Amarillo Light</p>
                                    </li>
                                </ul>  
                            </div> 
                        </div>
                    </div>
                    <div class="box-footer text-black">
                        <div class="row">                           
                            <div class="col-sm-10">
                                <small class="form-text text-muted" id="info"><strong>Información:</strong> los datos que aquí se muestran son los que se mostrarán en todos los lugares que se haga referencia a la empresa.</small>
                            </div>
                            <div class="col-sm-2">
                                <div class="text-right">

                                    <button title="Editar la información asociada a la empresa" type="button" id="boton-modal-conf" class="btn btn-sm btn-warning" data-toggle="modal" data-target="modal-editar-info">
                                        <i class="fa fa-pencil"></i>&nbsp; editar información
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

@endsection

@section('script')
<script src="{{ asset('js/configuracion.js') }}"></script>

@endsection

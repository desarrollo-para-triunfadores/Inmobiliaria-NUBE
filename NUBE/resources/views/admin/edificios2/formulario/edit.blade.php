@extends('admin.partes.index')

@section('title')
    Actualizar Edificio
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Edificio
            <small>actualizar un registro</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Inmuebles</a></li>
            <li class="active">Edificios</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">        
                <a href="/admin/edificios" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">         
                <form id="form-update" action="/admin/edificios/{{$edificio->id}}"  method="POST"  class="form-horizontal" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input id="token-create" type="hidden" name="_token" value="{{csrf_token()}}">                                                                                                      
                    <div id="rootwizard">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="navbar">
                                    <div class="navbar-inner" style="display: inline-block;">
                                        <div class="container">
                                            <ul>
                                                <li><a href="#tab1" data-toggle="tab"><h4>Información básica</h2></a></li>                                                                                                 
                                                <li><a href="#tab2" data-toggle="tab"><h4>Ubicación</h2></a></li> 
                                                <li><a href="#tab3" data-toggle="tab"><h4>Otros datos</h2></a></li> 
                                                <li><a href="#tab4" data-toggle="tab"><h4>Confirmar </h2></a></li>                                                      
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
                                        @include('admin.edificios2.partes_create.datos_basicos')                                        
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        @include('admin.edificios2.partes_create.ubicacion')
                                    </div> 
                                    <div class="tab-pane" id="tab3">
                                        @include('admin.edificios2.partes_create.otros_datos')
                                    </div>                                 
                                    <div class="tab-pane" id="tab4">
                                        @include('admin.edificios2.partes_create.confirmacion')
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
<script src="{{ asset('js/edificio.js') }}"></script>
@endsection

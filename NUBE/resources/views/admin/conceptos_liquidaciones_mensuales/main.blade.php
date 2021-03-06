@extends('admin.partes.index')

@section('title')
Historial de impuestos y servicios cargados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Historial de impuestos y servicios cargados
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Impuestos</a></li>          
            <li class="active">Historial</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <i class="fa fa-search" aria-hidden="true"></i>
                        <h3 class="box-title"> Panel de búsqueda</h3>
                    </div>
                    <div class="box-body ">                            
                        @include('admin.partes.msj_acciones')              
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">                                           
                                            <div class="col-md-6">
                                                <div class="control-group">
                                                    <label>Desde:</label>
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                                    
                                                            <input name="fecha_desde" id="fecha_desde"type="text" class="form-control pull-right datepicker" required>                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="control-group">
                                                    <label>Hasta:</label>
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                                   
                                                            <input name="fecha_hasta" id="fecha_hasta"type="text" class="form-control pull-right datepicker" required>                                                  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>		
                                        </div>		
                                    </div>					
									<div class="col-md-3">
										<div class="control-group">
											<label>Localidad:</label>
											<div class="controls">
												<select style="width: 100%" id="localidad_id" onchange="filtrar_select('localidad_id')" placeholder="campo requerido" class="select2 form-control" multiple>																								
													@foreach($localidades as $localidad)
														<option listado="{{$localidad->barrios}}" inmuebles="{{$localidad->inmuebles}}" value="{{$localidad->id}}">{{$localidad->nombre}}</b></option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="control-group">
											<label>Barrios:</label>
											<div class="controls">
												<select style="width: 100%" id="barrio_id" onchange="filtrar_select('barrio_id')" placeholder="campo requerido" class="select2 form-control" multiple>
													@foreach($barrios as $barrio)
														<option value="{{$barrio->id}}">{{$barrio->nombre}}</b></option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="control-group">
											<label>Edificios:</label>
											<div class="controls">
												<select style="width: 100%" id="edificio_id" onchange="filtrar_select('edificio_id')" placeholder="campo requerido" class="select2 form-control" multiple>
													@foreach($edificios as $edificio)
														<option value="{{$edificio->id}}">{{$edificio->nombre}}</b></option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-6">									
										<div class="control-group">
											<label>Inmueble:</label>
											<div class="controls">
												<select style="width: 100%" id="inmueble_id" placeholder="campo requerido" class="select2 form-control" multiple>													
													@foreach($inmuebles as $inmueble)
													<option value="{{$inmueble->id}}">{{$inmueble->direccion}} ({{$inmueble->localidad->nombre}}). Piso: {{$inmueble->piso}}.
														Departamento: ({{$inmueble->numDepto}}) </b>
													</option>
													@endforeach
												</select>
											</div>										
										</div>
									</div>
									<div class="col-md-6">
										<div class="control-group">
											<label>Impuestos/Servicios:</label>
											<div class="controls">
												<select style="width: 100%" id="servicio_id" placeholder="campo requerido" class="select2 form-control" multiple>
													<option></option>
													@foreach($servicios as $servicio)
														<option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>								
								</div>
								<br>                             
                            </div>
                        </div>                      
                    </div> 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">   
                                    <button onclick="filtrar_contratos()" title="Registrar un garante" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search" aria-hidden="true"></i> &nbsp;filtrar impuestos
                                    </button>                                 
                                </div>
                            </div>
                        </div>
                    </div>                  
                </div>
                <br>              
                <div id="tabla_impuestos">                                    
                </div>               
            </div>                                               
        </div>
    </section>   
</div>



@endsection
@section('script') 
<script>
    $("#side-impuestos-li").addClass("active");
    $("#side-impuestos-ul").addClass("menu-open");
    $("#side-ele-visualizar-impuestos").addClass("active");	
    var pantalla = "visualizar";
</script>
<script src="{{ asset('js/impuestos.js') }}"></script>
@endsection

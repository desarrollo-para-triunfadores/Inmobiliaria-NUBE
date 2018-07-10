@extends('admin.partes.index')
@section('title') 
	Cobros registrados @endsection
@section('content')
<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Cobros de servicios
			<small>registrar un nuevo cobro</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<i class="fa fa-suitcase"></i> Liquidaciones mensuales</a>
			</li>
			<li class="active">Cobro de servicios</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">					
				<div class="box box-primary">
					<div class="box-body">
						@include('admin.partes.msj_acciones')						
						<legend>Clientes</legend>						
						<div class="row">
							<div class="col-md-6">
								<div class="control-group">
									<label>Nombre del cliente</label>
									<div class="controls">
										<select style="width: 100%"  id="cliente_id"  placeholder="campo requerido" required class="select2 form-control">										
											<optgroup label="Inquilinos">
												@foreach($inquilinos as $inquilino)
													<option value="['{{$inquilino->id}}', 'I']">{{$inquilino->persona->nombrecompleto}} (DNI: {{$inquilino->persona->dni}})</option>                                                    
												@endforeach
											</optgroup>
											<optgroup label="Propietarios">
												@foreach($propietarios as $propietario)
													<option value="['{{$propietario->id}}', 'P']">{{$propietario->persona->nombrecompleto}} (DNI: {{$propietario->persona->dni}})</option>                                                    
												@endforeach
											</optgroup>											
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<br>
								<div class="control-group">										
									<button type="submit" class="btn btn-primary" onclick="traer_resumen()" title="Buscar detalle"><i class="fa fa-search" aria-hidden="true"></i> buscar boletas</button>
								</div>
							</div>
						</div> 
						<br>                             							
					</div>
					<div class="box-footer">
						<p class="pull-left form-text text-muted"><strong>Información:</strong> al buscar las boletas del cliente se desplegará un listado con las boletas a pagar por el <b>cliente</b>.</p>                                
					</div>
				</div>														
			</div>
			<br><br>								
			<div id="tabla_deudas">			
		</div>
	</div>
	</section>
</div>

@endsection

@section('script')
	<script src="{{ asset('js/cobro.js') }}"></script>
@endsection
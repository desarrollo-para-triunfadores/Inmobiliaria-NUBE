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
				<a href="/admin/roles" title="volver a la pantalla anterior" class="btn btn-default btn-sm">
					<i class="fa fa-arrow-left"></i> volver</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
								
						<div class="box box-primary">
							<div class="box-body">
								<br>
								<legend>Detalles del registro</legend>
								<br>
								<div class="row">
									<div class="col-md-6">
										<div class="control-group">
											<label>Nombre del cliente</label>
											<div class="controls">
												<select style="width: 100%"  id="inquilino_id"  placeholder="campo requerido" required class="select2 form-control">
													@foreach($inquilinos as $inquilino)
													<option value="{{$inquilino->id}}">{{$inquilino->persona->nombrecompleto}} (DNI: {{$inquilino->persona->dni}})</option>                                                    
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<br>
										<div class="control-group">										
											<button type="submit" class="btn btn-primary" onclick="traer_resumen()" title="Buscar detalle"><i class="fa fa-search" aria-hidden="true"></i> buscar detalle del cliente</button>
										</div>
									</div>
								</div>
                                <br><br>
                                <legend>Permisos</legend>								
									<div id="tabla_deudas"></div>								
                            </div>
                            <div class="box-footer">
                                <p class="pull-left form-text text-muted"><strong>Información:</strong> los roles proporcionan permisos para las acciones disponibles en el <b>sistema</b>.</p>
                                <button type="submit" class="btn btn-primary pull-right" title="Registrar un rol"><i class="fa fa-plus-circle"></i> registrar rol</button>
                            </div>
						</div>														
			</div>
		</div>
	</section>
</div>

@endsection

@section('script')
	<script src="{{ asset('js/cobro.js') }}"></script>
@endsection
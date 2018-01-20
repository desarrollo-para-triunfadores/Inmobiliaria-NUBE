@extends('admin.partes.index') @section('title') Registrar impuestos nuevos @endsection @section('content')
<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Carga de liquidación mensual
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<i class="fa fa-suitcase"></i> Liquidaciones mensuales</a>
			</li>
			<li class="active">Carga de liquidación</li>
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
									<div class="col-md-6">
										<div class="control-group">
											<label>Inmueble:</label>
											<div class="controls">
												<select style="width: 100%" name="contrato_id" id="contrato_id" placeholder="campo requerido" class="select2 form-control">
													<option></option>
													@foreach($contratos as $contrato)
													<option value="{{$contrato}}">{{$contrato->inmueble->direccion}} ({{$contrato->inmueble->localidad->nombre}}, {{$contrato->inmueble->localidad->provincia->nombre}})
														<b>Valor: ${{$contrato->inmueble->valorReal}} </b>
													</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="control-group">
											<label>Fecha de vencimiento:</label>
											<div class="controls">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-calendar" aria-hidden="true"></i>
													</span>
													<input name="vencimiento" id="vencimiento" type="text" placeholder="campo requerido" class="form-control pull-right datepicker">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-md-12">
								<div class="pull-right">
									<button onclick="buscar_conceptos()" title="Registrar un garante" class="btn btn-primary btn-sm">
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



@endsection @section('script')
<script>
	$("#side-liquidaciones").addClass("active");
    $("#side-liquidaciones-ul").addClass("menu-open");
    $("#side-ele-cargar-liquidaciones").addClass("active");

</script>
<script src="{{ asset('js/liquidacion.js') }}"></script>
@endsection
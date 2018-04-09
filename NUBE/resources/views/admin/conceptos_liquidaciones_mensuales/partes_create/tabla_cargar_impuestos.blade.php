<div class="box box-primary animated fadeIn">
	<div class="box-header with-border">
		<i class="fa fa-list" aria-hidden="true"></i>
		<h3 class="box-title"> Impuestos y servicios</h3>
	</div>
	<div class="box-body ">
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
			<tr>
				<th>Inmueble</th>
				<th>Inquilino</th>
				<th>Concepto</th>
				<th>Periodo</th>
				<th>Monto</th>
				<th>1º fecha de vencimiento</th>
				<th>2º fecha de vencimiento</th>
				<th>Estado</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
				<th>Inmueble</th>
				<th>Inquilino</th>
				<th>Concepto</th>
				<th>Periodo</th>
				<th>Monto</th>
				<th>1º fecha de vencimiento</th>
				<th>2º fecha de vencimiento</th>
				<th>Estado</th>
			</tr>
			</tfoot>
			<tbody>
			@foreach($servicios_contratos as $servicio_contrato)
			
			@if (count($servicio_contrato->periodos_validos()) > 0)					
				<tr>
					<td class="text-center text-bold">{{$servicio_contrato->contrato->inmueble->tipo->nombre}} en {{$servicio_contrato->contrato->inmueble->direccion}} ({{$servicio_contrato->contrato->inmueble->localidad->nombre}})</td>
					<td class="text-center">{{$servicio_contrato->contrato->inquilino->persona->nombrecompleto}}</td>
					<td>{{$servicio_contrato->servicio->nombre}}</td>
					<td>					
						<select id="periodo{{$servicio_contrato->id}}" onchange="carga_lineas({{$servicio_contrato->id}})">												
							@foreach($servicio_contrato->periodos_validos() as $periodo)
							<option value="{{$periodo}}">{{$periodo}}</option>                                                    
							@endforeach																		
						</select>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon">$</span>
							@if ($servicio_contrato->contrato->sujeto_a_gastos_compartidos && $servicio_contrato->servicio->servicio_compartido)
								<input id="monto{{$servicio_contrato->id}}" type="number" steap="any" min="0" class="form-control" onclick="cargar_monto_sugerido({{$servicio_contrato->id}}, {{$servicio_contrato->determinar_valor()}})" value="" placeholder="{{$servicio_contrato->determinar_valor()}}" onchange="carga_lineas({{$servicio_contrato->id}})" onkeyup="carga_lineas({{$servicio_contrato->id}})">
							@else
								<input id="monto{{$servicio_contrato->id}}" type="number" steap="any" min="0" class="form-control" value="" onchange="carga_lineas({{$servicio_contrato->id}})" onkeyup="carga_lineas({{$servicio_contrato->id}})">
							@endif
						</div>
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input id="venc1{{$servicio_contrato->id}}" type="text" class="form-control datepicker" onchange="carga_lineas({{$servicio_contrato->id}})">
						</div>
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input id="venc2{{$servicio_contrato->id}}" type="text" class="form-control datepicker" onchange="carga_lineas({{$servicio_contrato->id}})">
						</div>
					</td>
					<td>
						<select id="estado{{$servicio_contrato->id}}" size="1" id="row-3-office" name="row-3-office" onchange="carga_lineas({{$servicio_contrato->id}})">
							<option value="true">Abonado</option>
							<option value="false">Sin abonar</option>
						</select>
					</td>
				</tr>
				@endif
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="box-footer">
		<div class="row">
			<div class="col-md-12">
					<p class="pull-left form-text text-muted"><strong>Información:</strong> el valor sugerido en algunas leyendas equivale al monto calculado automáticamente por sistema para gastos compartidos entre varios inquilinos de un edificio.</p>
				<div class="pull-right">
					<button onclick="enviar()" title="Registrar impuestos" class="btn btn-primary btn-sm">
						<i class="fa fa-search" aria-hidden="true"></i> &nbsp;registrar cargos
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
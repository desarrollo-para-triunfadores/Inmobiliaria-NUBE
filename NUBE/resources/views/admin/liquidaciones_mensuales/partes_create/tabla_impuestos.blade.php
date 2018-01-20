<div class="row">
	<div class="col-md-6">

	</div>
	<div class="col-md-6">

	</div>
</div>

<div class="box box-primary animated fadeIn">
	<div class="box-header with-border">
		<i class="fa fa-id-card-o" aria-hidden="true"></i>
		<h3 class="box-title"> Datos del contrato</h3>
	</div>
	<div class="box-body ">
		@include('admin.partes.msj_acciones')
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label>En vigencia desde:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
								<span id="vigencia_desde" class="form-control"></span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>En vigencia hasta:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</span>
								<span id="vigencia_hasta" class="form-control"></span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Mes de alquiler/Restante</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
								</span>
								<span id="mes_alquiler" class="form-control"></span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Valor de los ascensores:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar"></i>
								</span>
								<span id="valor_ascensores" class="form-control">{{$datos["costos_expensas"]["ascensores"]}}</span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Valor mant. ascensores:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar"></i>
								</span>
								<span id="valor_mant_ascensores" class="form-control">{{$datos["costos_expensas"]["mant_ascensores"]}}</span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Costos en personal:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar"></i>
								</span>
								<span id="valor_personal" class="form-control">{{$datos["costos_expensas"]["sueldo_personal"]}}</span>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label>Valor del seguro:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar"></i>
								</span>
								<span id="valor_seguro" class="form-control">{{$datos["costos_expensas"]["seguro"]}}</span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Gastos de limpieza:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar"></i>
								</span>
								<span id="valor_limpieza" class="form-control">{{$datos["costos_expensas"]["limpieza"]}}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="box box-primary animated fadeIn">
	<div class="box-header with-border">
		<i class="fa fa-list" aria-hidden="true"></i>
		<h3 class="box-title"> Impuestos y servicios</h3>
	</div>
	<div class="box-body ">
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Concepto</th>
					<th>Periodo</th>
					<th>1º fecha de vencimiento</th>
					<th>2º fecha de vencimiento</th>
					<th>Monto</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Concepto</th>
					<th>Periodo</th>
					<th>1º fecha de vencimiento</th>
					<th>2º fecha de vencimiento</th>
					<th>Monto</th>
				</tr>
			</tfoot>

			<tbody>
				@foreach($datos["conceptos_liquidaciones"] as $concepto_liquidacion)
				<tr>
					<td class="text-center">{{$concepto_liquidacion->serviciocontrato->servicio->nombre}}</td>
					<td class="text-center">{{$concepto_liquidacion->periodo}}</td>
					<td class="text-center">{{$concepto_liquidacion->primer_vencimiento}}</td>
					<td class="text-center">{{$concepto_liquidacion->segundo_vencimiento}}</td>
					<td class="text-center">${{$concepto_liquidacion->monto}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<br>
<div class="box box-primary animated fadeIn">
	<div class="box-header with-border">
		<i class="fa fa-id-card-o" aria-hidden="true"></i>
		<h3 class="box-title"> Totales</h3>
	</div>
	<div class="box-body">
		@include('admin.partes.msj_acciones')
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label>Valor expensas:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar" aria-hidden="true"></i>
								</span>
								<span id="valor_expensas" valor="{{$datos["costos_expensas"]["total"]}}" class="form-control">{{$datos["costos_expensas"]["total"]}}</span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Servicios:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar" aria-hidden="true"></i>
								</span>
								<span id="valor_servicios" valor="{{$datos["valor_total_conceptos"]}}" class="form-control">{{$datos["valor_total_conceptos"]}}</span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Cuota del alquiler:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar"></i>
								</span>
								<span id="valor_cuota" class="form-control"></span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Subtotal:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar" aria-hidden="true"></i>
								</span>
								<span id="subtotal" class="form-control"></span>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Total a pagar:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-dollar" aria-hidden="true"></i>
								</span>
								<span id="total" class="form-control"></span>
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
						<i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;registrar liquidación
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
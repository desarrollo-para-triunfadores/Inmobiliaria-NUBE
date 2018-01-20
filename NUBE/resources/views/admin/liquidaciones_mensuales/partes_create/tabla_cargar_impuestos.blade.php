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
				<tr>
					<td class="text-center text-bold">{{$servicio_contrato->contrato->inmueble->tipo->nombre}} en {{$servicio_contrato->contrato->inmueble->direccion}} ({{$servicio_contrato->contrato->inmueble->localidad->nombre}})</td>
					<td class="text-center">{{$servicio_contrato->contrato->inquilino->persona->apellido}}, {{$servicio_contrato->contrato->inquilino->persona->nombre}}</td>
					<td>{{$servicio_contrato->servicio->nombre}}</td>
					<td>
						<select class="select_periodos" size="1" id="row-3-office" name="row-3-office" onchange="carga_lineas({{$servicio_contrato->id}},'periodo', this.value)">
						</select>
					</td>
					<td>
						<div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="number" steap="any" class="form-control" value="" onkeyup="carga_lineas({{$servicio_contrato->id}},'monto', this.value)">
						</div>
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control mascara_vencimiento" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" onkeyup="carga_lineas({{$servicio_contrato->id}},'primer_vencimiento', this.value)">
						</div>
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control mascara_vencimiento" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" onkeyup="carga_lineas({{$servicio_contrato->id}},'segundo_vencimiento', this.value)">
						</div>
					</td>
					<td>
						<select size="1" id="row-3-office" name="row-3-office" onchange="carga_lineas({{$servicio_contrato->id}},'servicio_abonado', this.value)">
							<option value="true">Abonado</option>
							<option value="false">Sin abonar</option>
						</select>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>


	</div>
	<div class="box-footer">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
					<button onclick="enviar()" title="Registrar un garante" class="btn btn-primary btn-sm">
						<i class="fa fa-search" aria-hidden="true"></i> &nbsp;registrar cargos
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
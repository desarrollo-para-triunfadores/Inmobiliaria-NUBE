<br>
@if (count($solicitudes) > 0)
<table id="example" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>                                  
			<th class="text-center">Empleado</th>
			<th class="text-center">Cliente</th>
			<th class="text-center">F.Conclución</th>
			<th class="text-center">Monto</th>
			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($solicitudes as $solicitud)
		<tr>                                    
			<td class="text-center text-bold">{{$solicitud->tecnico->persona->nombrecompleto}}</td>
			<td class="text-center text-bold">{{$solicitud->solicitante()->persona->nombrecompleto}}</td>
			<td class="text-center">{{$solicitud->FechaCierreFormateado}}</td>
			<td class="text-center">${{$solicitud->monto_total}}</td>
			<td class="text-center">                                        
				<a onclick="confirmar_pago('empleado',{{$solicitud->id}})" title="marcar como pagado" class="btn btn-social-icon btn-sm btn-success"><i class="fa fa-check"></i></a>
			</td>
		</tr> 
		@endforeach
	</tbody>
	<tfoot>
		<tr>                                  
			<th class="text-center">Empleado</th>
			<th class="text-center">Cliente</th>
			<th class="text-center">F.Conclución</th>
			<th class="text-center">Monto</th>
			<th class="text-center">Acciones</th>
		</tr>
	</tfoot>
</table>
@else
<div class="callout callout-info animated fadeIn">
	<h4><i class="icon fa fa-exclamation-circle"></i><strong> No hay pagos pendientes a empleados de servicio técnico</strong></h4>            
	<p>Actualmente el no existen pagos pendientes a empleados de la empresa.</p>
  </div>                       
@endif 
<br>
@if (count($liquidaciones) > 0)
<table id="example" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>                                  
			<th class="text-center">Cliente</th>
			<th class="text-center">Periodo a pagar</th>
			<th class="text-center">Monto</th>
			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($liquidaciones as $liquidacion)
		<tr>                                    
			<td class="text-center text-bold">{{$liquidacion->contrato->inmueble->propietario->persona->nombrecompleto}}</td>
			<td class="text-center">{{$liquidacion->periodo}}</td>
			<td class="text-center">${{$liquidacion->total}}</td>
			<td class="text-center">                                        
				<a onclick="confirmar_pago('cliente', {{$liquidacion->id}})" title="marcar como pagado" class="btn btn-social-icon btn-sm btn-success"><i class="fa fa-check"></i></a>
			</td>
		</tr> 
		@endforeach
	</tbody>
	<tfoot>
		<tr>                                  
			<th class="text-center">Cliente</th>
			<th class="text-center">Periodo a pagar</th>
			<th class="text-center">Monto</th>
			<th class="text-center">Acciones</th>
		</tr>
	</tfoot>
</table>
@else
<div class="callout callout-info animated fadeIn">
	<h4><i class="icon fa fa-exclamation-circle"></i><strong> No hay pagos pendientes a clientes</strong></h4>            
	<p>Actualmente el no existen pagos pendientes a clientes de la empresa.</p>
  </div>                       
@endif 
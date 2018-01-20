 <div class=" animated fadeIn">    
    @if (count($liquidaciones) > 0)
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">Inquilino</th>
                    <th class="text-center">Fecha vencimiento</th>
                    <th class="text-center">Valor expensas compartidas</th>
                    <th class="text-center">Total conceptos</th>
                    <th class="text-center">Valor alquiler</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Total</th>                            
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($liquidaciones as $liquidacion)
                <tr>
                    <td class="text-center text-bold">{{$liquidacion->contrato->inquilino->persona->nombrecompleto}}</td>
                    <td class="text-center text-bold">${{$liquidacion->vencimientoformateado}}</td>
                    <td class="text-center">${{$liquidacion->calcular_valor_expensas()}}</td>
                    <td class="text-center">${{$liquidacion->calcular_total()}}</td>
                    <td class="text-center">${{$liquidacion->alquiler}}</td>
                    <td class="text-center text-bold">${{$liquidacion->subtotal}}</td>
                    <td class="text-center text-bold">${{$liquidacion->total}}</td>  
                    <td class="text-center" width="100">
                        <a href="{{ route('inquilinos.show', $inquilino->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-check"></i> Generar pago
                        </a>
                    </td>                                                    
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Inquilino</th>
                    <th class="text-center">Fecha vencimiento</th>
                    <th class="text-center">Valor expensas</th>
                    <th class="text-center">Total conceptos</th>
                    <th class="text-center">Valor alquiler</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </tfoot>
        </table>
    @else
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-exclamation-circle"></i><strong>El cliente no posee deudas</strong></h4>
            Actualmente el cliente se encuentra al día con los pagos por el alquiler.                                                           
        </div>
    @endif
</div>


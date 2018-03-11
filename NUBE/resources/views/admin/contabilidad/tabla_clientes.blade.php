<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Resumenes por clientes</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">
        <table id="tabla_clientes" class="display responsive dataTable table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center">Apellido y nombre</th>
                <th class="text-center">A pagar</th>
                <th class="text-center">A cobrar</th>
                <th class="text-center">Saldo</th>
                <th class="text-center">Acciones</th>      
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
            @if($cliente->es_cliente())
                <tr>
                    @if($cliente->inquilino)
                        @if($cliente->inquilino->ultimo_contrato()) <!-- Si tiene contrato (No se mostraran los inquilinos 'huerfanos' -->
                            <td class="text-center text-bold">{{$cliente->nombrecompleto}}</td>                            
                            <td class="text-center text-bold text-yellow">$ {{ $cliente->inquilino->ultimo_contrato()->total_boletas_impagas()}}</td>    
                            <td class="text-center text-bold text-yellow">-</td>
                            <td class="text-center text-bold text-blue">$ -{{ $cliente->inquilino->ultimo_contrato()->total_boletas_impagas()}}</td>   
                            <td class="text-center">
                                <a href="{{ route('contabilidad.show', $cliente->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                                        <i class="fa fa-list"></i>
                                </a>    
                            </td>                                               
                        @endif  
                    @endif          
                    @if($cliente->propietario)   <!-- Si es Propietario-->                        
                        @if($cliente->propietario->contratos_vigentes() != null)              
                            <td class="text-center text-bold text-blue">{{$cliente->nombrecompleto}} [P]</td>                          
                            <td class="text-center text-bold text-red">$ {{ number_format($cliente->propietario->total_comisiones_pendientes_pago() , 2)}}</td>
                            <td class="text-center text-bold text-green">$ {{ number_format($cliente->propietario->cobros_alquiler_pendientes() , 2)}}</td>
                            <td class="text-center text-bold text-blue">$ {{ number_format($cliente->propietario->saldo() , 2)}}</td>
                            <td class="text-center">
                                <a href="{{ route('contabilidad.show', $cliente->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                                        <i class="fa fa-list"></i>
                                </a>    
                            </td>                                 
                        @endif                       
                    @endif            
                </tr>
            @endif     
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th class="text-center">Apellido y nombre</th>
                <th class="text-center">A pagar</th>
                <th class="text-center">A cobrar</th>
                <th class="text-center">Saldo</th>
                <th class="text-center">Acciones</th>              
            </tr>
            </tfoot>
        </table>
    </div>
</div>

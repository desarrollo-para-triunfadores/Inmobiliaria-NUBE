 <div class="box box-primary animated fadeIn">
    <div class="box-header with-border">
        <i class="fa fa-list" aria-hidden="true"></i>
        <h3 class="box-title"> Impuestos y servicios</h3>
    </div>
    <div class="box-body ">                            
        <table id="example"  class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Inmueble</th>
                        <th>Inquilino</th>
                        <th>Concepto</th>
                        <th>Periodo</th>
                        <th>Monto</th>
                        <th>1º fecha de vencimiento</th>
                        <th>2º fecha de vencimiento</th>
                        <th>Estado de liquidación</th>
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
                        <th>Estado de liquidación</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($conceptos_liquidaciones as $concepto_liquidacion)
                        <tr>
                            <td class="text-center text-bold">{{$concepto_liquidacion->serviciocontrato->contrato->inmueble->tipo->nombre}} en {{$concepto_liquidacion->serviciocontrato->contrato->inmueble->direccion}} ({{$concepto_liquidacion->serviciocontrato->contrato->inmueble->localidad->nombre}})</td>
                            <td class="text-center">{{$concepto_liquidacion->serviciocontrato->contrato->inquilino->persona->apellido}}, {{$concepto_liquidacion->serviciocontrato->contrato->inquilino->persona->nombre}}</td>              
                            <td>{{$concepto_liquidacion->serviciocontrato->servicio->nombre}}</td>              
                            <td>{{$concepto_liquidacion->periodo}}</td> 
                            <td>${{$concepto_liquidacion->monto}}</td> 
                            <td>{{$concepto_liquidacion->primer_vencimiento}}</td> 
                            <td>{{$concepto_liquidacion->segundo_vencimiento}}</td> 
                                @if($concepto_liquidacion->liquidacionmensual_id)
                                    <td class="text-center">Liquidado</td>
                                @else
                                    <td class="text-center">Sin liquidar</td>
                                @endif
                        </tr>
                    @endforeach        
                </tbody>
            </table>
    </div>     
</div>


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
                        <th>1º fecha de vencimiento</th>
                        <th>2º fecha de vencimiento</th>
                        <th>Monto</th>
                        <th>Incluir concepto</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Inmueble</th>
                        <th>Inquilino</th>
                        <th>Concepto</th>
                        <th>Periodo</th>                       
                        <th>1º fecha de vencimiento</th>
                        <th>2º fecha de vencimiento</th>
                        <th>Monto</th>
                         <th>Incluir concepto</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach($datos->conceptos_liquidaciones as $concepto_liquidacion)
                        <tr>
                            <td class="text-center text-bold">{{$concepto_liquidacion->serviciocontrato->contrato->inmueble->tipo->nombre}} en {{$concepto_liquidacion->serviciocontrato->contrato->inmueble->direccion}} ({{$concepto_liquidacion->serviciocontrato->contrato->inmueble->localidad->nombre}})</td>
                            <td class="text-center">{{$concepto_liquidacion->serviciocontrato->contrato->inquilino->persona->apellido}}, {{$concepto_liquidacion->serviciocontrato->contrato->inquilino->persona->nombre}}</td>              
                            <td class="text-center">{{$concepto_liquidacion->serviciocontrato->servicio->nombre}}</td>              
                            <td class="text-center">{{$concepto_liquidacion->periodo}}</td>                             
                            <td class="text-center">{{$concepto_liquidacion->primer_vencimiento}}</td> 
                            <td class="text-center">{{$concepto_liquidacion->segundo_vencimiento}}</td> 
                            <td class="text-center">${{$concepto_liquidacion->monto}}</td> 
                            <td class="text-center">
                             
                                        <input onchange="alert(222)" type="checkbox">
                                
                            </td> 
                        </tr>
                    @endforeach        
                </tbody>
            </table>
    </div>     
</div>


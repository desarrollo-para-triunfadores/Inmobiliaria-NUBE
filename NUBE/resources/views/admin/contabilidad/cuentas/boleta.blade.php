{{-- RESUMEN del INQUILINO, visto por el ADMIN --}}
@if($persona->inquilino)
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Cuenta de <b>{{ $persona->nombre}} {{ $persona->apellido}} </b></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">

            <table id="example" class="display responsive" cellspacing="0" width="80%">
                <tbody>
                    <tr>
                        <th class="text-center text-bold" style="font-size: 50px">Total a pagar:</th>
                        <th class="text-center text-bold text-underline" style="font-size: 50px">$ {{ $persona->inquilino->ultimo_contrato()->total_boletas_impagas()}}</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="font-size: 30px">Vencimiento</th>
                        <th class="text-center text-bold" style="font-size: 30px">-</th>
                    </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            <table id="tabla_resumen_deudas_inquilino" class="display responsive " cellspacing="0" width="100%">
                
                @if($persona->inquilino->ultimo_contrato()->ultima_liquidacion())  
                    <thead>
                    <!-- #si el inquilino tiene alguna boleta, mostrarla -->
                    <tr>
                        <th class="text-center">CONCEPTO</th>
                        <th class="text-center">MONTO</th>
                    </tr>
                    </thead>
                    <tr>
                        <td class="text-center">Cuota alquiler</td>
                        <td class="text-center">$ {{ $persona->inquilino->ultimo_contrato()->ultima_liquidacion()->total}}</td>
                    </tr>
                    
                @else
                    <h2 class="text-orange animated shake">Usted aun no tiene boletas generadas</h2>
                @endif
            </table>
        </div>
    </div>
@elseif($persona->propietario)
{{-- RESUMEN para PROPIETARIO --}}
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Cuenta de <b>{{$propietario->persona->nombre}} {{$propietario->persona->apellido}} </b></h3>
    
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
    
            <table id="example" class="display responsive" cellspacing="0" width="80%">
                <tbody>
                    <tr>
                        <th class="text-center text-bold text-green" style="font-size: 70px">Total a pagar:</th>
                        <th class="text-center text-bold text-underline" style="font-size: 70px"> ${{$propietario->total_comisiones_pendientes_pago()}}</th>
                    </tr>
                </tbody>
                <tfoot>
    
                </tfoot>
            </table>
    {{--
            <table id="example" class="display responsive" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center">CONCEPTO</th>
                    <th class="text-center">MONTO</th>
                </tr>
                <tr>
                    <th class="text-center">Monto Alquiler</th>
                    <th class="text-center">$ </th>
                </tr>
                </thead>
            </table>
            --}}
        </div>
    </div>
@endif
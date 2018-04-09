<div class="box box-primary animated fadeIn">
    <div class="box-header with-border">
        <i class="fa fa-list" aria-hidden="true"></i>
        <h3 class="box-title"> Impuestos y servicios</h3>
    </div>
    <div class="box-body ">
        <table id="example"  class="display responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Inmueble</th>
                <th>Inquilino</th>
                <th>Servicio</th>
                <th>Periodo</th>
                <th>Monto</th>
                <th>1º venc.</th>
                <th>2º venc.</th>
                <th>Estado de liquidación</th>
                <th>Abonado</th>
                <th>Fecha carga</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Inmueble</th>
                <th>Inquilino</th>
                <th>Servicio</th>
                <th>Periodo</th>
                <th>Monto</th>
                <th>1º venc.</th>
                <th>2º venc.</th>
                <th>Estado de liquidación</th>
                <th>Abonado</th>
                <th>Fecha carga</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($conceptos_liquidaciones as $concepto_liquidacion)
                <tr>
                    <td class="text-center text-bold">{{$concepto_liquidacion->contrato->inmueble->tipo->nombre}} en {{$concepto_liquidacion->contrato->inmueble->direccion}} ({{$concepto_liquidacion->contrato->inmueble->localidad->nombre}})</td>
                    <td class="text-center">{{$concepto_liquidacion->contrato->inquilino->persona->apellido}}, {{$concepto_liquidacion->contrato->inquilino->persona->nombre}}</td>
                    <td>{{$concepto_liquidacion->servicio->nombre}}</td>
                    <td>{{$concepto_liquidacion->periodo}}</td>
                    <td>${{$concepto_liquidacion->monto}}</td>
                    <td>{{$concepto_liquidacion->primervencimientoformateado}}</td>
                    <td>{{$concepto_liquidacion->segundovencimientoformateado}}</td>
                    @if($concepto_liquidacion->liquidacion_mensual_id)
                        <td class="text-center text-green"><b>Liquidado</b></td>
                    @else
                        <td class="text-center text-red"><b>Sin liquidar</b></td>
                    @endif
                    @if($concepto_liquidacion->servicio_abonado)
                        <td class="text-center text-green"><b>Abonado</b></td>
                    @else
                        <td class="text-center text-red"><b>No abonado</b></td>
                    @endif
                    <td class="text-center">{{$concepto_liquidacion->created_at->format('d/m/Y')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Cuenta de Propietario</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">

        <table id="example" class="display responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center">FACTURA</th>
                <th class="text-center">Vencimiento</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
                {{--
                {{ $liquidaciones = $propietario->liquidaciones()}}
            @foreach($liquidaciones as $liquidacion)
                <tr>
                    @if($liquidacion->fecha_cobro_propietario)
                        <td class="text-center text-bold">Pagada ✔️</td>
                    @elseif($liquidacion->comprobar_vencimiento)
                        <td class="text-center text-bold">Vencida 🛑 </td>
                    @else
                        <td class="text-center text-bold">Por vencer</td>
                    @endif
                    <td class="text-center text-bold">{{$liquidacion->vencimiento->format('d/m/Y')}}</td>
                    <td class="text-center" width="100">
                        {{--
                        <button onclick="mostrar_recibo($liquidacion)" title="Ver detalle de recibo" class="btn">
                           Ver
                        </button>
                        <button class="btn-bitbucket" onclick="escargar_recibo({{$liquidacion}})">Descargar
                        </button>
                        
                        <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Descargar" class="btn btn-social-icon btn-sm btn-success">
                            <i class="fa fa-download"></i>
                        </a>
                     
                    </td>
                </tr>
            @endforeach
            --}}
            
            </tbody>
            {{--
            <tfoot>
            <tr>
                <th class="text-center">FACTURA</th>
                <th class="text-center">Vencimiento</th>
                <th class="text-center">Acciones</th>
            </tr>
            </tfoot>
            --}}
        </table>
    </div>
    <!-- /.box-body -->
{{--
<div class="box-footer no-padding">
    <ul class="nav nav-pills nav-stacked">
        <li><a href="#">United States of America
                <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
        <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
        </li>
        <li><a href="#">China
                <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
    </ul>
</div>
--}}
<!-- /.footer -->

</div>
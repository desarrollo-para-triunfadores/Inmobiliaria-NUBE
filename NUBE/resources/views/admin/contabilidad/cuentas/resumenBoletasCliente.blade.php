<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Historial de Propietario</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body ">
        <table id="example" class="dataTable table-bordered table-responsive display responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center">Factura</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Periodo</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($liquidaciones as $liquidacion)
                <tr>
                    @if(is_null($liquidacion[0]->fecha_pago_propietario))
                        <td class="text-center text-bold">No pagada </td>
                    @else
                        <td class="text-center text-bold">Pagada ✔️</td>
                    @endif
                    <td class="text-center text-bold">$ {{number_format($liquidacion[0]->comision_a_propietario,2)}} </td>
                    <td class="text-center text-bold">{{$liquidacion[0]->periodo}}</td>
                    <td class="text-center" width="100">
                        {{--<a href="{{ route('contabilidad.show', $propietario->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                        </a>--}}
                        <a href="{{ route('contabilidad.verBoleta', $liquidacion[0]->id)}}" target="_blank" title="Ver el detalle de esta boleta / Imprimir" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
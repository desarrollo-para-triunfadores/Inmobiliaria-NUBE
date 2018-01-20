<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Movimientos</h3>

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
            @foreach($movimientos as $movimiento)
                <tr>
                    <td class="text-center text-bold">Por Vencer | Paga</td>
                    <td class="text-center text-bold">dd/mm/aa</td>
                    <td class="text-center" width="100">
                        <a onclick="completar_campos({{$inquilino}})" title="Descargar esta boleta (luego puede ser impresa)" class="btn btn-social-icon btn-warning btn-sm">
                            <i class="fa fa-pencil">Descargar</i>
                        </a>
                        <a onclick="abrir_modal_borrar({{$inquilino->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                        </a>
                    </td>


                </tr>
            @endforeach
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
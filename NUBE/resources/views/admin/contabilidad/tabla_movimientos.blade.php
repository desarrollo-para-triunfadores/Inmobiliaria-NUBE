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
                <th class="text-center">Concepto</th>
                <th class="text-center">Inquilino</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Usuario</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movimientos as $movimiento)
                <tr>
                    <td class="text-center text-bold">{{$movimiento->descripcion}}</td>
                    <td class="text-center text-bold">{{$movimiento->inquilino->persona->nombrecompleto}}</td>
                    <td class="text-center text-bold text-red">{{ $movimiento->tipo }}</td>
                    <td class="text-center text-bold text-green">{{ $movimiento->monto }}</td>
                    <td class="text-center text-bold text-green">{{ $movimiento->fecha }}</td>
                    <td class="text-center text-bold text-green">{{ $movimiento->usuario }}</td>

                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th class="text-center">Concepto</th>
                <th class="text-center">Inquilino</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Usuario</th>
            </tr>
            </tfoot>
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
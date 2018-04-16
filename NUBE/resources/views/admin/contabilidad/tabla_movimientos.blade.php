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
        <table id="tabla_movimientos" class="display responsive dataTable" cellspacing="0" width="100%">
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
                    @if($movimiento->inquilino)
                        <td class="text-center text-bold">{{$movimiento->inquilino->persona->nombrecompleto}}</td>
                    @else
                        <td class="text-center text-bold">-</td>
                    @endif
                    @if($movimiento->tipo_movimiento == 'entrada')
                        <td class="text-center text-bold text-green">{{ $movimiento->tipo_movimiento }}</td>
                        <td class="text-center text-bold text-green">$ {{ $movimiento->monto }}</td>
                    @elseif($movimiento->tipo_movimiento == 'salida')
                        <td class="text-center text-bold text-red">{{ $movimiento->tipo_movimiento }}</td>
                        <td class="text-center text-bold text-red">$ {{ $movimiento->monto }}</td>
                    @endif
                    <td class="text-center text-bold text-green">{{ $movimiento->fecha_hora->format('d/m/Y') }}</td>
                    <td class="text-center text-bold text-facebook">{{ $movimiento->usuario }}</td>

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
</div>

<script>
    function buscar_entre_fechas() {
        $.ajax({
            dataType: 'json', url: "/admin/contabilidad/",
            data: {
                fecha_inicio: $('#fechaInicio'),
                fecha_fin: $('#fechaFin'),
            },
            success: function (data) {
                var recibido = JSON.parse(data);
                console.log(recibido);
            }
        });
    }
</script>
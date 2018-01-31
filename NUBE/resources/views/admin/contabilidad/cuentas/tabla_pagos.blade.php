<script>
    /** En seccion TABLA MOVIMIENTOS **/
//Datatable - instaciación del plugin
    var table_mov = $('#tabla_movimientos').DataTable({
        "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    });
    //Datatable - instaciación del plugin
    //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
    $('#tabla_movimientos tbody').on('mouseenter', 'td', function () {
        var colIdx = table_mov.cell(this).index().column;
        $(table_mov.cells().nodes()).removeClass('highlight');
        $(table_mov.column(colIdx).nodes()).addClass('highlight');
    });

    instaciar_filtros();
    function instaciar_filtros() {
        //Datatables | filtro individuales - instanciación de los filtros
        $('#tabla_movimientos tfoot th').each(function () {
            var title = $(this).text();
            if (title !== "") {
                if (title !== 'Acciones') { //ignoramos la columna de los botones
                    $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />');
                }
            }
        });
//Datatables | filtro individuales - búsqueda
        table_mov.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    }
    //Datatables | ocultar/visualizar columnas dinámicamente
    $('a.toggle-vis').on('click', function (e) {
        e.preventDefault();
        // Get the column API object
        var column = table_mov.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
        instaciar_filtros();
    });
    //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
    $('#tabla_movimientos tbody').on('mouseenter', 'td', function () {
        var colIdx = table_mov.cell(this).index().column;
        $(table_mov.cells().nodes()).removeClass('highlight');
        $(table_mov.column(colIdx).nodes()).addClass('highlight');
    });
    /******************************************************************************************************************* */
</script>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Historial de Pagos</h3>

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
            @foreach($liquidaciones as $liquidacion)
                <tr>
                    @if($liquidacion->fecha_pago)
                        <td class="text-center text-bold">Pagada</td>
                    @else
                        <td class="text-center text-bold">Vencimiento</td>
                    @endif
                    <td class="text-center text-bold">{{$liquidacion->vencimiento}}</td>
                    <td class="text-center" width="100">
                        {{--
                        <button onclick="mostrar_recibo($liquidacion)" title="Ver detalle de recibo" class="btn">
                           Ver
                        </button>
                        <button class="btn-bitbucket" onclick="escargar_recibo({{$liquidacion}})">Descargar
                        </button>
                        --}}
                        <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Descargar" class="btn btn-social-icon btn-sm btn-success">
                            <i class="fa fa-download"></i>
                        </a>
                        {{--
                        <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                        </a>
                        --}}
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
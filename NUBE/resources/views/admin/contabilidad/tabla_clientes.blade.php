<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Resumenes por clientes</h3>

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
                <th class="text-center">Apellido y nombre</th>
                <th class="text-center">Debe</th>
                <th class="text-center">Haber</th>
                <th class="text-center">Saldo</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inquilinos as $inquilino)
                <tr>
                    <td class="text-center text-bold">{{$inquilino->persona->nombrecompleto}}</td>
                    <td class="text-center text-bold text-red">$ xx.xx</td>
                    <td class="text-center text-bold text-green">$ xx.xx</td>
                    <td class="text-center text-bold text-blue">$ xx.xx</td>

                    <td class="text-center" width="100">
                        <a onclick="completar_campos({{$inquilino}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm">
                            <i class="fa fa-pencil"></i>
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
            <tfoot>
            <tr>
                <th class="text-center">Apellido y nombre</th>
                <th class="text-center">Debe</th>
                <th class="text-center">Haber</th>
                <th class="text-center">Saldo</th>
                <th class="text-center">Acciones</th>
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

<script>
    /** En seccion TABLA CLIENTES **/
//Datatable - instaciación del plugin
    var table = $('#example').DataTable({
        "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    });
    //Datatable - instaciación del plugin
    //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
    $('#example tbody').on('mouseenter', 'td', function () {
        var colIdx = table.cell(this).index().column;
        $(table.cells().nodes()).removeClass('highlight');
        $(table.column(colIdx).nodes()).addClass('highlight');
    });

    instaciar_filtros();
    function instaciar_filtros() {
        //Datatables | filtro individuales - instanciación de los filtros
        $('#example tfoot th').each(function () {
            var title = $(this).text();
            if (title !== "") {
                if (title !== 'Acciones') { //ignoramos la columna de los botones
                    $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />');
                }
            }
        });
//Datatables | filtro individuales - búsqueda
        table.columns().every(function () {
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
        var column = table.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
        instaciar_filtros();
    });
    //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
    $('#example tbody').on('mouseenter', 'td', function () {
        var colIdx = table.cell(this).index().column;
        $(table.cells().nodes()).removeClass('highlight');
        $(table.column(colIdx).nodes()).addClass('highlight');
    });

</script>
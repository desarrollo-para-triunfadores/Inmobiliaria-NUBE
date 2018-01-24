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
        <table id="tabla_clientes" class="dataTable table-bordered display responsive" cellspacing="0" width="100%">
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
</div>

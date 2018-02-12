{{-- RESUMEN para INQUILINO --}}
@if(Auth::user()->inquilino)
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Cuenta de <b>{{ $inquilino->persona->nombre}} {{ $inquilino->persona->apellido}} </b></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">

        <table id="example" class="display responsive" cellspacing="0" width="40%">

            <tbody>
                <tr>
                    <th class="text-center text-bold" style="font-size: 50px">Total a pagar</th>
                    <th class="text-center text-bold text-underline" style="font-size: 50px">$ {{ $inquilino->ultimo_contrato()->total_boletas_impagas()}}</th>
                </tr>
                <tr>
                    <th class="text-center" style="font-size: 30px">Vencimiento</th>
                    <th class="text-center text-bold" style="font-size: 30px">-</th>
                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>

        <table id="example" class="display responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center">CONCEPTO</th>
                <th class="text-center">MONTO</th>
            </tr>
            <tr>
                <th class="text-center">Monto Alquiler</th>
                <th class="text-center">$ {{ $inquilino->ultimo_contrato()->ultima_liquidacion()->alquiler}}</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
@endif


@if($propietario)

@endif
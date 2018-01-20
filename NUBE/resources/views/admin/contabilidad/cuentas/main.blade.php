@extends('admin.partes.index')
@section('title') Contabilidad
@endsection
@section('content')
    @include('admin.movimientos.create')
    <div class="content-wrapper" style="min-height: 916px;">
        <section class="content-header">
            <h1>
                Estado de Cuenta Actual
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-suitcase"></i> Resumen de Cuenta</a>
                </li>
            </ol>
            {{--
            <div class="page-header pull-right">
                <div class="page-toolbar">
                    <button type="button" class="btn btn-bitbucket" onclick="" data-toggle="modal" data-placement="bottom" data-target="#modal-movimiento" title="Registrar Mivimiento de entrada o salida de cuenta de empresa"  >Registrar Movimiento</button>
                </div>
            </div>
            --}}
        </section>

        <section class="content animated fadeIn">
            @include('admin.contabilidad.cuentas.boleta')   <!-- ULTIMA boleta hecha desde sistema (resumida) -->
            @include('admin.contabilidad.cuentas.tabla_movimientos')

        </section>
    </div>


@endsection @section('script')
    <script src="{{ asset('js/camara.js') }}"></script>
    <script src="{{ asset('js/contabilidad.js') }}"></script>
@endsection
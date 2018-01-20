@extends('admin.partes.index')
@section('title') Contabilidad
@endsection
@section('content')
	@include('admin.movimientos.create')
	<div class="content-wrapper" style="min-height: 916px;">
		<section class="content-header">
			<h1>
				Modulo Contable
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="#">
						<i class="fa fa-suitcase"></i> Contabilidad</a>
				</li>
			</ol>
			<div class="page-header pull-right">
				<div class="page-toolbar">
					<button type="button" class="btn btn-bitbucket" onclick="" data-toggle="modal" data-placement="bottom" data-target="#modal-movimiento" title="Registrar Mivimiento de entrada o salida de cuenta de empresa"  >Registrar Movimiento</button>
				</div>
			</div>

			{{-- Fechas de filtro --}}
			@include('admin.contabilidad.searchFechas')
			{{-- /Fechas de filtro --}}
		</section>

		<section class="content animated fadeIn">
			@include('admin.contabilidad.resumeBoxes')
			@include('admin.contabilidad.graficosCostos')
			@include('admin.contabilidad.tabla_movimientos')
			@include('admin.contabilidad.tabla_clientes')


		</section>
	</div>


@endsection @section('script')
	<script src="{{ asset('js/camara.js') }}"></script>
	<script src="{{ asset('js/contabilidad.js') }}"></script>
@endsection
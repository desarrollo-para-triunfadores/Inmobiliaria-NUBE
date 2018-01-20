@extends('admin.partes.index') @section('title') Inmuebles Registrados @endsection @section('content')
<div class="content-wrapper" style="min-height: 916px;" xmlns="http://www.w3.org/1999/html">
	<section class="content-header">
		<h1>
			Propiedades
			<small>registros almacenados</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<i class="fa fa-suitcase"></i> Generales</a>
			</li>
			<li>Inmuebles</li>
			<li class="active">Propiedades</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<br>
				<div class="box box-primary">
					<div class="box-header with-border">
						<i class="fa fa-mobile" aria-hidden="true"></i>
						<h3 class="box-title"> Registros</h3>
					</div>
					<div class="box-body ">
						@include('admin.partes.msj_acciones')
						<table id="example" class="display table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center">Condición</th>
									<th class="text-center">Tipo</th>
									<th class="text-center">Dirección</th>
									<th class="text-center">Cant.Ambientes</th>
									<th class="text-center">Precio venta</th>
									<th class="text-center">Precio alquiler</th>
									<th class="text-center">F.Habilitación</th>
									<th class="text-center">Contrato de alquiler</th>
									<th class="text-center">Fecha de Registro</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($inmuebles as $inmueble)
								<tr>
									<td class="text-center">{{$inmueble->condicion}}</td>
									<td class="text-center bold">{{$inmueble->tipo->nombre}}</td>
									<td class="text-center bold">{{$inmueble->direccion}} ({{$inmueble->localidad->nombre}})</td>
									<td class="text-center">{{$inmueble->cantidadAmbientes}}</td>
									@if($inmueble->condicion!=='alquiler')
									<td class="text-center">${{$inmueble->valorVenta}}</td>
									@else
									<td class="text-center">Solo para alquiler</td>
									@endif @if($inmueble->condicion !=='venta')
									<td class="text-center">${{$inmueble->valorAlquiler}}</td>
									@else
									<td class="text-center">Solo para venta</td>
									@endif
									<td class="text-center">{{$inmueble->FechaHabilitacionFormateado}}</td>
									@if ($inmueble->contratos->count()<1) 
                                        <td class="text-center text-red">Inmueble libre</td>
									@elseif ($inmueble->ultimo_contrato()->vigente())
										<td class="text-center text-green">Sí (hasta {{$inmueble->ultimo_contrato()->FechaHastaFormateado}})</td>
									@else
										<td class="text-center text-red">Inmueble libre</td>
									@endif
									<td class="text-center">{{$inmueble->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a title="Ver este inmueble" href="{{ route('inmuebles.edit', $inmueble->id) }}" class="btn btn-social-icon btn-warning btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a onclick="abrir_modal_borrar({{$inmueble->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="box-footer">
						<a data-toggle="tooltip" data-placement="bottom" href="{{ route('inmuebles.create') }}" title="Registrar una nueva propiedad de la inmobiliaria"
						 class="btn btn-blue">
							<span class="fa fa-plus-circle" aria-hidden="true"></span> Registrar nuevo Inmueble</a>
					</div>
				</div>
			</div>


		</div>
	</section>
</div>

<script src="{{ asset('js/inmueble.js') }}"></script>
@endsection
@extends('admin.partes.index') @section('title') Inquilinos registrados @endsection @section('content')
	<div class="content-wrapper" style="min-height: 916px;">
		<section class="content-header">
			<h1>
				Inquilinos
				<small>registros almacenados</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="#">
						<i class="fa fa-suitcase"></i> Inmuebles</a>
				</li>
				<li class="active">Inquilinos</li>
			</ol>
		</section>
		<section class="content animated fadeIn">
			<div class="row">
				<div class="col-md-12">
					<br>
					<div class="box box-primary">
						<div class="box-header with-border">
							<i class="fa fa-list" aria-hidden="true"></i>
							<h3 class="box-title"> Registros</h3>
						</div>
						<div class="box-body ">
							@include('admin.partes.msj_acciones')
							<div>
								Columnas:
								<a class="toggle-vis" href="" data-column="0">Apellido y nombre</a> -
								<a class="toggle-vis" href="" data-column="1">Sexo</a> -
								<a class="toggle-vis" href="" data-column="2">Documento</a> -
								<a class="toggle-vis" href="" data-column="3">Nacionalidad</a> -
								<a class="toggle-vis" href="" data-column="4">Nacimiento</a> -
								<a class="toggle-vis" href="" data-column="5">Teléfono</a> -
								<a class="toggle-vis" href="" data-column="6">Teléfono contacto</a> -
								<a class="toggle-vis" href="" data-column="7">Email</a> -
								<a class="toggle-vis" href="" data-column="8">Alquila</a> -
								<a class="toggle-vis" href="" data-column="9">Localidad</a> -
								<a class="toggle-vis" href="" data-column="10">Fecha alta</a> -
								<a class="toggle-vis" href="" data-column="11">Acciones</a>
							</div>
							<br>
							<table id="example" class="display responsive" cellspacing="0" width="100%">
								<thead>
								<tr>
									<th class="text-center">Apellido y nombre</th>
									<th class="text-center">Sexo</th>
									<th class="text-center">Documento</th>
									<th class="text-center">Nacionalidad</th>
									<th class="text-center">Nacimiento</th>
									<th class="text-center">Teléfono</th>
									<th class="text-center">Teléfono contacto</th>
									<th class="text-center">Email</th>
									<th class="text-center">Alquila</th>
									<th class="text-center">Localidad</th>
									<th class="text-center">Fecha alta</th>
									<th class="text-center">Acciones</th>
								</tr>
								</thead>
								<tbody>
								@foreach($inquilinos as $inquilino)
									<tr>
										<td class="text-center text-bold">{{$inquilino->persona->nombrecompleto}}</td>
										<td class="text-center">{{$inquilino->persona->sexo}}</td>
										<td class="text-center">{{$inquilino->persona->dni}}</td>
										<td class="text-center">{{$inquilino->persona->pais->nombre}}</td>
										<td class="text-center">{{$inquilino->persona->fechanacformateado}} </td>
										<td class="text-center">{{$inquilino->persona->telefono}}</td>
										<td class="text-center">
											@if ($inquilino->persona->telefono_contacto) {{$inquilino->persona->telefono_contacto}} @else No fue registrado @endif
										</td>
										<td class="text-center">{{$inquilino->persona->email}}</td>
										@if (!is_null($inquilino->ultimo_contrato()))
											<td class="text-center">{{$inquilino->ultimo_contrato()->inmueble->direccion}}</td>
											<td class="text-center">{{$inquilino->ultimo_contrato()->inmueble->localidad->nombre}}</td>
										@else
											<td class="text-center">No fue registrado</td>
											<td class="text-center">No fue registrado</td>
										@endif
										<td class="text-center">{{$inquilino->created_at->format('d/m/Y')}}</td>
										<td class="text-center" width="100">
											<a onclick="completar_campos({{$inquilino}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm">
												<i class="fa fa-pencil"></i>
											</a>
											<a onclick="abrir_modal_borrar({{$inquilino->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger">
												<i class="fa fa-trash"></i>
											</a>
											<a href="{{ route('inquilinos.show', $inquilino->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
												<i class="fa fa-list"></i>
											</a>
										</td>
									</tr>
								@endforeach
								</tbody>
								<tfoot>
								<tr>
									<th class="text-center">Apellido y nombre</th>
									<th class="text-center">Sexo</th>
									<th class="text-center">Documento</th>
									<th class="text-center">Nacionalidad</th>
									<th class="text-center">Nacimiento</th>
									<th class="text-center">Teléfono</th>
									<th class="text-center">Teléfono contacto</th>
									<th class="text-center">Email
									<th class="text-center">Alquila</th>
									<th class="text-center">Localidad</th>
									<th class="text-center">Fecha alta</th>
									<th class="text-center">Acciones</th>
								</tr>
								</tfoot>
							</table>
						</div>
						<div class="box-footer">
							<div class="row">
								<div class="col-md-12">
									<div class="pull-right">
										<button title="Registrar un inquilino" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
											<i class="fa fa-plus-circle"></i> &nbsp;registrar inquilino
										</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>

	@include('admin.inquilinos.formulario.create') @include('admin.inquilinos.formulario.editar') @include('admin.inquilinos.formulario.confirmar')
@endsection @section('script')
	<script src="{{ asset('js/inquilino.js') }}"></script>
	<script src="{{ asset('js/camara.js') }}"></script>
@endsection
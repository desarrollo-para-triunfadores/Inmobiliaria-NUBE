@extends('admin.partes.index') 
@section('title') 
	Personal de Servicio Técnico 
@endsection 
@section('content')
	<div class="content-wrapper" style="min-height: 916px;">
		<section class="content-header">
			<h1>
				Personal de Servicios Técnicos
				<small>registros almacenados</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="#">
						<i class="fa fa-suitcase"></i> Técnicos</a>
				</li>
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
							{{--
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
							--}}
							<br>
							<table id="example" class="display datatable bordered responsive" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th class="text-center">Apellido y nombre</th>										
										<th class="text-center">Rubro</th>							
										<th class="text-center">Teléfono</th>								
										<th class="text-center">Email</th>
										<th class="text-center">Ocupado</th>
										<th class="text-center">Localidad</th>
										<th class="text-center">Direccion</th>
										<th class="text-center">Nacimiento</th>
										<th class="text-center">Fecha alta</th>
										<th class="text-center">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tecnicos as $tecnico)
										<tr>
											<td class="text-center text-bold">{{$tecnico->persona->nombrecompleto}}</td>
											@if($tecnico->rubroTecnico_id)
											<!-- Es un asco esta parte pero no me andaba de la manera "convencional" -->
												<?php 
													$rubro= App\RubroTecnico::find($tecnico->rubroTecnico_id);
												?>
												<td class="text-center">{{ $rubro->nombre }} </td>
											@else
												<td class="text-center">Sin especialidad</td>
											@endif

											@if($tecnico->persona->telefono)
												<td class="text-center">{{ $tecnico->persona->telefono }}</td>
											@else
												<td class="text-center">No se registro</td>
											@endif
											<td class="text-center">{{ $tecnico->persona->email }}</td>
											@if($tecnico->ocupado() == true)
												<td class="text-center">Si</td>
											@else
												<td class="text-center">No</td>
											@endif	
											<td class="text-center">{{$tecnico->persona->localidad->nombre}}</td>
											<td class="text-center">{{$tecnico->persona->direccion}}</td>
											@if($tecnico->persona->fecha_nac)
												<td class="text-center">{{$tecnico->persona->fechanacformateado}} ({{$tecnico->persona->getEdad()}} años)</td>
											@else
											<td class="text-center">No se registro</td>
											@endif
											
											<td class="text-center">{{$tecnico->created_at->format('d/m/Y')}}</td>
											<td class="text-center" width="100">												
												<a onclick="completar_campos({{$tecnico}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm">
													<i class="fa fa-pencil"></i>
												</a>									
												<a href="{{ route('tecnicos.show', $tecnico->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
													<i class="fa fa-list"></i>
												</a>
												<a onclick="abrir_modal_borrar({{$tecnico->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">Apellido y nombre</th>										
										<th class="text-center">Rubro</th>							
										<th class="text-center">Teléfono</th>								
										<th class="text-center">Email</th>
										<th class="text-center">Ocupado</th>
										<th class="text-center">Localidad</th>
										<th class="text-center">Direccion</th>
										<th class="text-center">Nacimiento</th>
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
										<button title="Registrar un tecnico" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
											<i class="fa fa-plus-circle"></i> &nbsp;Registrar Técnico
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
	@include('admin.tecnicos.formulario.create') 
	@include('admin.tecnicos.formulario.editar') 
	@include('admin.tecnicos.formulario.confirmar')
	 
@endsection @section('script')
	<script src="{{ asset('js/tecnicos.js') }}"></script>
	<script src="{{ asset('js/camara.js') }}"></script>
@endsection
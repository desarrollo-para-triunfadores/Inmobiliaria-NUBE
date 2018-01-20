@extends('admin.partes.index') @section('title') Inmuebles Registrados @endsection @section('content')
<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Roles de usuario
			<small>registrar un nuevo rol de usuario</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<i class="fa fa-suitcase"></i> Gestión de usuarios</a>
			</li>
			<li class="active">Roles</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<a href="/admin/roles" title="volver a la pantalla anterior" class="btn btn-default btn-sm">
					<i class="fa fa-arrow-left"></i> volver</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<form id="form-create" action="/admin/roles" method="POST" class="form-horizontal" enctype="multipart/form-data">
					<input id="token-create" type="hidden" name="_token" value="{{ csrf_token() }}">					
						<div class="box box-primary">
							<div class="box-body">
								<br>
								<legend>Detalles del registro</legend>
								<br>
								<div class="row">
									<div class="col-md-6">
										<div class="control-group">
											<label>Nombre del nuevo rol</label>
											<div class="controls">
												<input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
											</div>
										</div>
									</div>
								</div>
                                <br><br>
                                <legend>Permisos</legend>
								<div class="row">
									@foreach($permisos as $permiso)																	
									<div class="col-md-3">
										<div class="form-check">
											<br>
											<label class="form-check-label">                                            
                                                <input type="checkbox" name="check_{{$permiso->name}}" value="{{$permiso->name}}" class="form-check-input"> {{$permiso->name}}                                             											
											</label>
										</div>
                                    </div>                                    
                                    @endforeach
								</div>
                            </div>
                            <div class="box-footer">
                                <p class="pull-left form-text text-muted"><strong>Información:</strong> los roles proporcionan permisos para las acciones disponibles en el <b>sistema</b>.</p>
                                <button type="submit" class="btn btn-primary pull-right" title="Registrar un rol"><i class="fa fa-plus-circle"></i> registrar rol</button>
                            </div>
						</div>
										
				</form>
			</div>
		</div>
	</section>
</div>

@endsection @section('script') @endsection
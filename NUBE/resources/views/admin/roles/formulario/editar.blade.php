@extends('admin.partes.index') @section('title') Inmuebles Registrados @endsection @section('content')
<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Roles de usuario
			<small>actualizar un registro de rol de usuario</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<i class="fa fa-suitcase"></i> Gestión de usuarios</a>
			</li>
			<li class="active">Rol de usuario</li>
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
					<form id="form-update"  action="/admin/roles/{{$rol->id}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
						<input name="_method" type="hidden" value="PUT">
						<input id="token-update" type="hidden" name="_token" value="{{ csrf_token() }}">								
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
												<input name="nombre" type="text" maxlength="50" class="form-control" value="{{$rol->name}}" placeholder="campo requerido" required>
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
												
												@if(is_null(DB::table('role_has_permissions')->where('role_id', $rol->id)->where('permission_id', $permiso->id)->first()))
                                                    <input type="checkbox" name="check_{{$permiso->name}}" value="{{$permiso->name}}" class="form-check-input"> {{$permiso->name}}
                                                @else
                                                    <input type="checkbox" name="check_{{$permiso->name}}" value="{{$permiso->name}}" class="form-check-input" checked> {{$permiso->name}}
                                                @endif											
											</label>
										</div>
                                    </div>                                    
                                    @endforeach
								</div>
                            </div>
                            <div class="box-footer">
                                <p class="pull-left form-text text-muted"><strong>Información:</strong> los roles proporcionan permisos para las acciones disponibles en el <b>sistema</b>.</p>
                                <button type="submit" class="btn btn-primary pull-right" title="Actualizar un rol"><i class="fa fa-plus-circle"></i> actualizar rol</button>
                            </div>
						</div>										
				</form>
			</div>
		</div>
	</section>
</div>

@endsection 

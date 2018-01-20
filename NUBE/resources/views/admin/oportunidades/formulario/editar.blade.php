<div class="modal fade" id="modal-update">
    <div class="modal-dialog" style="width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar oportunidad</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                <form id="form-update" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="col-md-12 controls table-bordered">
                        <!--estado-->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Estado:</label>
                                    <select style="width: 50%" name="estado_id" id="estado_id" placeholder="campo requerido"  class="select2 form-control">
                                        @foreach($estados_oportunidades as $estado)
                                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--datos de interesado-->
                        <div class="row">
                            <div class="col-md-7">
                                    <label>Inmueble:</label>
                                    <input style="width: 100%" name="inmueble" id="inmueble" class="form-control"></input>
                            </div>
                            <div class="hide">
                                <label>Inmueble:</label>
                                <input style="width: 100%" name="id" id="id" class="hide"></input>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Interesado:</label>
                                    <input name="nombre_interesado" id="nombre_interesado" class="form-control"></input>
                                </div>
                            </div>
                        </div>
                        <!--contacto-->
                        <div class="row">
                            <div class="col-md-3">
                                <label>Teléfono:</label>
                                <input style="width: 100%" name="telefono" id="telefono" class="form-control"></input>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input name="email" id="email" class="form-control"></input>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Visitas:</label>
                                    <input name="visitas" id="visitas" class="form-control"></input>
                                </div>
                            </div>
                        </div>

                        <!--HISTORIAL con esta Oportunidad-->
                        <legend data-toggle="tooltip" title="historias relacionadas con ésta oportunidad">Interacciónes</legend>
                        <table class="table-bordered text-center" id="historial_oportunidad">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Descripción</th>
                                        <th class="text-center" data-toggle="tooltip" title="fecha de la interacción">Fecha️</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                        </table>
                        <!-- --------------------------------------------->

                        <!--Añadir detalle a Oportunidad-->
                        <legend>Añadir registro al historial</legend>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tipo:</label>
                                    <br>
                                    <select style="width: 80%" name="tipo_historia_oportunidad" id="tipo_historia_oportunidad" placeholder="campo requerido"  class="select2 form-control">
                                        <option value="">-</option>
                                        <option value="Negociación">Negociación</option>
                                        <option value="Consulta">Consulta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Detalle:</label>
                                    <textarea rows="1" class="form-control" id="detalle_historia_oportunidad" name="detalle_historia_oportunidad" placeholder="descripción del estado de la oportunidad de negocio"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fecha:</label>
                                    <input name="fecha_historia_oportunidad" type="date" id="fecha_historia_oportunidad" class="form-control datepicker"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>
            </div>
            <br><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="$('#boton_submit_update').click()">Actualizar Oportunidad</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>
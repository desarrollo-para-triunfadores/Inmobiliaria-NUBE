<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar Edificio</h4>
            </div>
            <div class="modal-body">
                @include('admin.partes.msj_lista_errores')
                {{--
                <form action="/admin/localidades" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                        <br>
                        <label>Localidad</label>
                        <select name="localidad_id" type="select" maxlength="50" class="form-control" placeholder="campo requerido" required>
                            @foreach($localidades as $localidad)
                                <option value="{{$localidad->id}}" selected="selected">{{$localidad->nombre}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label>Barrio</label>
                        <select name="barrio_id" type="select" maxlength="50" class="form-control" placeholder="campo requerido" required>
                            @foreach($barrios as $barrio)
                                <option value="{{$barrio->id}}" selected="selected">{{$barrio->nombre}}</option>
                            @endforeach
                        </select>
                        <label>Es un barrio privado:</label>
                        <div class="row">
                            <input type="checkbox" data-toggle="toggle"  id="rol-privado" name="privado" data-on="Si" data-off="No">
                        </div>

                        </input>
                    </div>
                    <br>

                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>

                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">Registrar Edificio</button>
            </div>
            --}}

            <form id="form-create" action="/admin/edificios" method="POST" enctype="multipart/form-data">
                <input id="token-create" type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Información general</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha de inauguración:</label>
                                    <input name="fecha_inauguracion" type="date" placeholder="campo requerido" class="form-control pull-right datepicker">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cochera:</label>
                                    <select style="width: 100%"  name="cochera"  placeholder="campo requerido"  class="select2 form-control">
                                        <option value=0>No</option>
                                        <option value=1>Si</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cantidad de Departamentos:
                                    <input name="cant_deptos" type="number" maxlength="50" class="form-control" data-toggle="tooltip" title="cantidad de departamentos en total que posee el edificio" placeholder="campo requerido" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr/>
                        <h3>Contacto y dirección</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-16">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Localidad:</label>
                                        <select style="width: 100%"  name="localidad_id"  placeholder="campo requerido"  class="select2 form-control">
                                            @foreach($localidades as $localidad)
                                                <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label>Barrio:</label>
                                            <select style="width: 100%"  name="barrio_id"  placeholder="campo requerido"  class="select2 form-control">
                                                @foreach($barrios as $barrio)
                                                    <option value="{{$barrio->id}}">{{$barrio->nombre}} ({{$barrio->localidad->nombre}})</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Dirección:</label>
                                        <input name="direccion" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr/>
                        <h3>Información administrativa</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-16">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Costos en personal:</label>
                                        <input name="costo_sueldos_personal" id="costo_sueldos_personal" type="text" class="form-control" data-toggle="tooltip" title="el total en costos mensuales de personal del edificio" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Costos mensuales en limpieza:</label>
                                        <input id="costo_limpieza" name="costo_limpieza" type="text" maxlength="50" class="form-control" data-toggle="tooltip" title="el total en costos de limpieza" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ascensores:</label>
                                    <input name="cant_ascensores" type="number" maxlength="50" class="form-control" data-toggle="tooltip" title="cantidad de ascensores del edificio" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Valor Ascensores:</label>
                                    <input name="valor_ascensores" type="text" id="valor_ascensores" maxlength="50" class="form-control" data-toggle="tooltip" title="valor de los asensores, de haber mas de uno corresponde el valor sumado" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Costo Mto:</label>
                                    <input name="costo_mant_ascensores" id="costo_mant_ascensores" type="text" maxlength="50" class="form-control" data-toggle="tooltip" title="costo (AR$) de mantenimiento mensual en ascensores" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Descripcion:</label>
                                        <input name="descripcion" type="text" maxlength="500" class="form-control" data-toggle="tooltip" title="aqui puede añadir alguna descripcion adicional del edificio" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-8">
                        <h3>Imagen</h3>
                        <br>
                        <div class="form-group">
                            <label>Subir imagen:</label>
                            <div id="main-cropper_nuevo" class="hide"></div>
                            <a class="button actionUpload-nuevo">
                                <input type="file" id="imagen-nuevo" value="Escoja una imagen" accept="image/*">
                            </a>
                            <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Tomar imagen desde la cámara:</label><br>
                            <div id="contenido_foto_nuevo"></div>
                            <button id="start_nuevo"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; Iniciar cámara</button>
                            <video id="video_nuevo" width="275" height="275" autoplay="true" class="hide"></video>
                            <canvas id="canvas_nuevo" name="imagen2" type="file" width="1280" height="720" class="hide"></canvas>
                            <button id="capture_nuevo" class="hide"> <i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;Capturar imágen</button>
                        </div>
                    </div>
                </div>
                <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
            </form>
            <br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>

            <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()/*mandar('create');*/">Registrar Edificio</button>
        </div>

        </div>          
    </div>
</div>
<div id="modal-movimiento" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="btn">&times;</button>
                <h4 class="modal-title">Registrar movimiento</h4>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                        <strong>¡Atención!</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="form-create" action="/admin/movimientos" method="POST" enctype="multipart/form-data">
                        <input id="token-create" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br>
                    <div class="form-group"><label class="col-sm-3 control-label">Concepto</label>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-icon right">
                                        <select  style="width: 100%"  name="costo" id="costo_id" placeholder="campo requerido"  class="select2 form-control">
                                            {{$costos = $servicios}}
                                            @foreach($costos as $costo)
                                                <option value="{{$costo->id}}">{{$costo->nombre}}</option>
                                            @endforeach
                                            <option value="0">Otro</option>
                                            <input name="descripcion" class="form-control hide" placeholder="campo requerido" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--
                    <div class="form-group"><label class="col-sm-3 control-label">Fecha</label>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-icon right date">

                                        <input name="fecha" type="text" readonly placeholder="campo requerido" class="form-control pull-right datepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label">Hora</label>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-icon right">
                                        <input name="hora" type="text" readonly placeholder="campo requerido" class="form-control pull-right datepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="form-group"><label class="col-sm-3 control-label">Tipo</label>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <div class="col-xs-12">
                                    <select  style="width: 100%"  name="pais_id" id="pais_id" placeholder="campo requerido"  class="select2 form-control">
                                        <option value="entrada">Entrada</option>
                                        <option value="salida">Salida</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label">Monto</label>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-icon right">

                                        <input name="monto" type="text" placeholder="campo requerido" class="form-control pull-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                    <br>
            </div>
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar Movimiento</button>
            </div>
        </div>
    </div>
</div>

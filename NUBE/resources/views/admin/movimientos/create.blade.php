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
                    <div class="form-group"><label class="col-sm-3 control-label">Tipo de Gasto</label>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <div class="col-xs-10">
                                    <div class="input-icon right">
                                        <select  style="width: 100%"  name="tipo_mov_id" id="tipo_mov_id"  /*onchange="validarMovimiento_Otro(this)"*/ placeholder="campo requerido"  class="select2 form-control">
                                            {{$tipos_movimientos = \App\TipoMovimiento::all()}}
                                            @foreach($tipos_movimientos as $tipo)
                                                <option value="{{$tipo->id}}">{{--$concepto->id--}}{{$tipo->nombre}}</option>
                                            @endforeach
                                            <option value="0">Otro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Descripcion de el movimiento -->
                    <div class="form-group"><label class="col-sm-3 control-label">Concepto</label>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <div class="col-xs-10">
                                    <div class="input-icon right">
                                        <input id="descripcion" name="descripcion" class="form-control animated shake" placeholder="ingrese el motivo del movimiento" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tipo (Entrada/Salida) -->
                    <div class="form-group"><label class="col-sm-3 control-label">Tipo</label>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <div class="col-xs-10">
                                    <select  style="width: 100%"  name="tipo_movimiento" id="tipo_movimiento" placeholder="campo requerido"  class="select2 form-control">
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
                                <div class="col-xs-10">
                                    <div class="input-icon right">
                                        <input id="monto_mov" name="monto_mov" type="text" placeholder="campo requerido" class="form-control pull-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                    <br>
            </div>
            <br><br><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar Movimiento</button>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        var gastos_marketing = {{$array_grafico_gastos['Marketing']}};
        var gastos_impuestos = {{$array_grafico_gastos['Impuestos']}};
        var gastos_seguros = {{$array_grafico_gastos['Seguro Inmobiliario']}};
        var gastos_mto_y_reparaciones = {{$array_grafico_gastos['Mto y Reparaciones']}};
        var gastos_otros = {{$array_grafico_gastos['Otros']}};
        console.log(gastos_marketing);
        {{--
        var array_gastos = {{ JSON.parse($array_grafico_gastos) }};
        console.log(array_gastos);
        --}}
    </script>
    <script src="{{ asset('js/contabilidad.js') }}"></script>
@endsection

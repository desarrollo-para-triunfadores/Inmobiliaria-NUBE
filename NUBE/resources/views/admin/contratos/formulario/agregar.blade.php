<div class="modal fade" id="modal-crear-servicios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar servicio/s</h4>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label>Servicios:</label>
                    <div class="controls">
                        <select style="width: 100%" id="combo" placeholder="campo requerido"  class="select2 form-control" multiple>
                            <option value=""></option>
                            @foreach($servicios as $servicio)
                            <option value="{{$servicio}}">{{$servicio->nombre}}</option>
                            @endforeach
                        </select>
                    </div>   
                </div>                                                                         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="agregar_servicio()">agregar servicio/s</button>
            </div>
        </div>          
    </div>
</div>
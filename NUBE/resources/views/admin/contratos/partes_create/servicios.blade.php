<legend>
    Servicios incluidos
</legend>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-check">
                <br>
                <label class="form-check-label">
                    <input type="checkbox" name="sujeto_a_gastos_compartidos" class="form-check-input"> <b>Sujeto a gastos compartidos con los demás inquilinos del edificio</b>
                </label>
            </div>
        </div>
    </div>
    <br><hr>
    <div class="row">
        @foreach($servicios as $servicio)
            <div class="col-md-4">
                <div class="form-check">
                    <br>
                    <label class="form-check-label">
                        <input type="checkbox" id="{{$servicio->nombre}}" name="servicios[]" value="{{$servicio->nombre}}" class="form-check-input"> {{$servicio->nombre}} ({{$servicio->descripcion}})
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>
<br>

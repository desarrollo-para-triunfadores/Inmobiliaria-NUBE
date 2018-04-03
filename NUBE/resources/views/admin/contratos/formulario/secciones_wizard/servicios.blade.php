<legend>
    Servicios incluidos
</legend>
<div class="container">
    <div class="row sujeto_a_gastos_compartidos">
        <div class="col-md-12">
            <div class="form-check">
                <br>
                <label class="form-check-label">                  
                    <input type="checkbox" onchange="tildar_gastos_compartidos()" name="sujeto_a_gastos_compartidos" id="sujeto_a_gastos_compartidos" value="1" class="form-check-input"><font size=4><b> Sujeto a gastos compartidos con los demás inquilinos del edificio</b></font>                       
                </label>                
            </div>
            <p class="form-text text-muted"><strong>Información:</strong> indica si el monto de los servicios
                 compartidos que ofrece el complejo o edificio serán compartidos también por el 
                 cliente al liquidar las mensualidades.</p>
        </div>        
    </div>
    <hr class="sujeto_a_gastos_compartidos">
    <div class="row">
        @foreach($servicios as $servicio)
            <div class="col-md-6" id="servicio{{$servicio->nombre}}">              
                <div class="checkbox">                    
                    <label>

                        @if ((isset($contrato)) && ($contrato->posee_servicio($servicio->id)))
                            
                            @if ($servicio->servicio_compartido === 1)
                                <input type="checkbox"  name="servicios[]" value="{{$servicio->id}}" class="gasto_compartido form-check-input" checked><font size=4><b>{{$servicio->nombre}} *</b></font>                                      
                            @else
                                <input type="checkbox"  name="servicios[]" value="{{$servicio->id}}" class="form-check-input" checked><font size=4><b> {{$servicio->nombre}}</b></font>                      
                            @endif 
                            
                            
                        
                        
                        @else
                            @if ($servicio->servicio_compartido === 1)
                                <input type="checkbox"  name="servicios[]" value="{{$servicio->id}}" class="gasto_compartido form-check-input"><font size=4><b>{{$servicio->nombre}} *</b></font>                                      
                            @else
                                <input type="checkbox"  name="servicios[]" value="{{$servicio->id}}" class="form-check-input"><font size=4><b> {{$servicio->nombre}}</b></font>                      
                            @endif  
                        @endif 




                                                                 
                    </label>                   
                </div>
                <p class="form-text text-muted"><strong>descripción:</strong> {{$servicio->descripcion}}</p>
            </div>
        @endforeach       
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">            
                <p class="form-text text-muted"><strong>Información:</strong> (*) indica que se trata de un gasto compartido.</p>
        </div>
    </div>
</div>

@if (count($liquidaciones) > 0)
<div class=" animated fadeIn">             
    @foreach($liquidaciones as $liquidacion)                
        <div class="col-md-12">
            <div class="box box-solid collapsed-box">
                <div class="box-header with-border">            
                    <h3 class="box-title"><b>Periodo:</b> {{$liquidacion->periodo}}<b> - Monto:</b> ${{$liquidacion->comision_a_propietario}}</h3>                                                
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding" style="display: none;">
                <br><br>                                   
                <div class="col-md-6">                                                               
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-calendar" aria-hidden="true"></i></span>            
                        <div class="info-box-content">
                            <span class="info-box-text">Periodo</span>
                            <span class="info-box-number"><b>{{$liquidacion->periodo}}</b></span>
                            <span class="product-description"> 
                                    Periodo al que corresponde la liquidación a cobrar.</b>.
                            </span>
                        </div>
                    </div>    
                </div>                                   
                <div class="col-md-6"> 
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-desktop" aria-hidden="true"></i></span>                    
                        <div class="info-box-content">
                            <span class="info-box-text">Comisión de la empresa</span>
                            <span class="info-box-number">Monto: ${{$liquidacion->comision_a_propietario}}</span>
                            <span class="product-description"> 
                                    Comisión que percibe la inmobiliaria.
                            </span>
                        </div>
                    </div>
                </div>

                @if($liquidacion->obtener_monto_por_repararaciones("propietario") > 0)
                    <div class="col-md-6"> 
                        <div class="info-box">
                            <span class="info-box-icon bg-green" style="background-color:#605ca8;"><i class="fa fa-wrench" style="color:#FFFFFF"></i></span>                                                                        
                            <div class="info-box-content">
                                <span class="info-box-text">Servicio técnico</span>
                                <span class="info-box-number">Monto: ${{$liquidacion->obtener_monto_por_repararaciones("propietario")}}</span>
                                <span class="product-description"> 
                                    Este monto es por trabajos que se realizaron en el inmueble durante el periodo.
                                </span>
                            </div>
                        </div>  
                    </div>                     
                @endif
                                                   
                <div class="col-md-6 pull-right">                               
                    <br>                            
                    <h2 class="page-header pull-right"><b>Total:</b> ${{$liquidacion->calcular_total_a_propietario()}}</h2>                                
                    <br><br><br><br>                            
                    <form action="/admin/cobros/{{$liquidacion->id}}" method="POST" accept-charset="UTF-8">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <input type="hidden" id="total" value="{{$liquidacion->calcular_total_a_propietario()}}">                           
                        <input type="hidden" name="cobro_propietario" value="true">
                        <div class="input-group pull-right input-group-sm col-xs-8">
                            <span class="input-group-addon">$</span>    
                            <input id="abonado" name="abonado" type="number" 
                                step="any" max="999999999" min="{{$liquidacion->calcular_total_a_propietario()}}"
                                placeholder="ingrese aquí el monto que abonará el cliente"
                                class="form-control"
                                onchange="calcular_cambio()" onkeyup="calcular_cambio()" required>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success btn-flat">registrar pago</button>
                            </span>                                
                        </div>                                                         
                    </form>                                  
                    <br><br><strong><p id="leyenda_vuelto" class="pull-right form-text text-muted hide">Vuelto: $</p></strong>
                    <br><br>
                </div>   
            </div>                              
        </div> 
    </div>                            
    @endforeach
</div>
@else
<div class="col-md-12">
    <div class="alert alert-info alert-dismissible animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-exclamation-circle"></i><strong>El cliente no posee deudas</strong></h4>
        Actualmente el cliente se encuentra al día con los pagos por el alquiler.                                                           
    </div>
</div>
@endif


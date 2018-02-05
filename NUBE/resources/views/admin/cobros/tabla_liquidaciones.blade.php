@if (count($liquidaciones) > 0)
<div class=" animated fadeIn">             
    @foreach($liquidaciones as $liquidacion)                
        <div class="col-md-12">
            <div class="box box-solid collapsed-box">
                <div class="box-header with-border">
                    @if ($liquidacion->comprobar_vencimiento())
                        <h3 class="box-title" style="color:red;"><b>Periodo:</b> {{$liquidacion->periodo}}<b> - Monto:</b> ${{$liquidacion->total}}<b> - Fecha Vencimiento:</b> {{$liquidacion->vencimientoformateado}} </h3>
                    @else
                        <h3 class="box-title"><b>Periodo:</b> {{$liquidacion->periodo}}<b> - Monto:</b> ${{$liquidacion->total}}<b> - Fecha Vencimiento:</b> {{$liquidacion->vencimientoformateado}} </h3>
                    @endif                            
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding" style="display: none;">
                    <br><br>                 
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Expensas</h3>                
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                                            
                                </div>
                            </div>
                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    @foreach($liquidacion->conceptos() as $concepto)                                            
                                        <li class="item">
                                                    <div class="product-img">
                                                        <span class="info-box-icon-modificado">                                                                    
                                                            @if ($concepto->serviciocontrato->servicio->servicio_compartido)
                                                                <i class="fa fa-users" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="javascript:void(0)" class="product-title">{{$concepto->serviciocontrato->servicio->nombre}}
                                                            <span class="label label-warning pull-right">${{$concepto->monto}}</span>
                                                        </a>
                                                        <span class="product-description">{{$concepto->serviciocontrato->servicio->descripcion}}</span>
                                                    </div>
                                                </li>
                                    @endforeach                                                            
                                </ul>
                            </div>                                
                        </div>
                    </div>
                    <div class="col-md-6">                                                               
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-building-o" aria-hidden="true"></i></span>            
                            <div class="info-box-content">
                                <span class="info-box-text">Alquiler</span>
                                <span class="info-box-number">Monto: ${{$liquidacion->alquiler}}</span>
                                <span class="product-description"> 
                                        El monto del alquiler corresponde al periodo: <b>{{$liquidacion->periodo}}</b>.
                                </span>
                            </div>
                        </div>                                        
                        <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></span>                        
                                <div class="info-box-content">
                                    <span class="info-box-text">Expensas</span>
                                    <span class="info-box-number">Monto: ${{$liquidacion->calcular_total()}}</span>
                                    <span class="product-description"> 
                                            El monto corresponde a la suma de los conceptos detallados al lado.
                                    </span>
                                </div>                                                                                    
                        </div>
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-desktop" aria-hidden="true"></i></span>                    
                            <div class="info-box-content">
                                <span class="info-box-text">Gastos administrativos</span>
                                <span class="info-box-number">Monto: ${{$liquidacion->gastos_administrativos}}</span>
                                <span class="product-description"> 
                                        Comisión que percibe la inmobiliaria.
                                </span>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="info-box-icon" style="background-color:#605ca8;"><i class="fa fa-money" style="color:#FFFFFF"></i></span>                                                                        
                            <div class="info-box-content">
                                <span class="info-box-text">Saldo a favor</span>
                                <span class="info-box-number">Monto: ${{$saldo_cuenta}}</span>
                                <span class="product-description"> 
                                    Este monto se bonifica en el monto total a pagar.
                                </span>
                            </div>
                        </div> 
                        <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>                                        
                            <div class="info-box-content">
                                <span class="info-box-text">Cargos por mora</span>
                                <span class="info-box-number">Monto: ${{$liquidacion->calcular_mora()}}</span>
                                <span class="product-description"> 
                                    Este monto representa la sumatoria de los recargos diarios por mora.
                                </span>
                            </div>
                        </div>                                   
                        <br>                            
                        <h2 class="page-header pull-right"><b>Subtotal:</b> ${{$liquidacion->subtotal + $liquidacion->calcular_mora()}} - <b>Total:</b> ${{$liquidacion->total + $liquidacion->calcular_mora() - $saldo_cuenta}}</h2>                                
                        <br><br><br><br>                            
                        <form action="/admin/cobros/{{$liquidacion->id}}" method="POST" accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                            <input type="hidden" id="total" value="{{$liquidacion->total + $liquidacion->calcular_mora() - $saldo_cuenta}}">
                            <input type="hidden" id="saldo_periodo" name="saldo_periodo" value="">


                            <div class="input-group pull-right input-group-sm col-xs-8">
                                <span class="input-group-addon">$</span>    
                                <input id="abonado" name="abonado" type="number" step="any" max="999999999" min="{{$liquidacion->total + $liquidacion->calcular_mora() - $saldo_cuenta}}" placeholder="ingrese aquí el monto que abonará el cliente" class="form-control" onchange="calcular_cambio()" onkeyup="calcular_cambio()" required>
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


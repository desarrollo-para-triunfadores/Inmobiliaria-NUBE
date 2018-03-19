@extends('admin.partes.index')

@section('title')
Contrato Detalle
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Contratos
            <small>detalle del registro</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-handshake-o"></i> Contratos</a></li>            
            <li class="active">Contratos</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <a href="/admin/contratos" title="volver a la pantalla anterior" class="btn btn-default btn-sm">
                    <i class="fa fa-arrow-left"></i> volver</a>
            </div>
        </div>              
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <h3 class="box-title"> Detalle del registro</h3>
                    </div>
                    <div class="box-body ">                                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Inquilino:</label>                     
                                    <span class="form-control"><strong>{{$contrato->inquilino->persona->nombrecompleto}}</strong></span>                                                                
                                </div>
                            </div>   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Garante:</label>                                               
                                    <span class="form-control">{{$contrato->garante->persona->nombrecompleto}}</span>                                                                                              
                                </div>
                            </div>                                               
                        </div>                               
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Inmueble:</label>
                                    @if (is_null($contrato->inmueble->edificio_id))
                                        <span class="form-control"><strong>Dirección: {{$contrato->inmueble->direccion}} ({{$contrato->inmueble->localidad->nombre}}, {{$contrato->inmueble->localidad->provincia->nombre}})</strong></span>
                                    @else
                                        <span class="form-control"><strong>Edificio: {{$contrato->inmueble->edificio->nombre}} | Piso:{{$contrato->inmueble->piso}} | Num.Depto.: {{$contrato->inmueble->numDepto}} | Dirección:{{$contrato->inmueble->direccion}} ({{$contrato->inmueble->localidad->nombre}}, {{$contrato->inmueble->localidad->provincia->nombre}})</strong></span>
                                    @endif                                              
                                </div>
                            </div>   
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sujeto a gastos compartidos:</label>  
                                    @if ($contrato->sujeto_a_gastos_compartidos === 1)
                                        <span class="form-control"><strong>No está sujeto</strong></span>
                                    @else
                                        <span class="form-control"><strong>Sí está sujeto</strong></span>
                                    @endif                      
                                </div>
                            </div>                               
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>En vigencia desde:</label>                                               
                                    <span class="form-control">{{$contrato->fechadesdeformateado}}</span>                                                                                              
                                </div>
                            </div>   
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>En vigencia hasta:</label>                                                   
                                    <span class="form-control">{{$contrato->fechahastaformateado}}</span>                                                                                                  
                                </div>
                            </div>
                             <div class="col-md-2">
                                <div class="form-group">
                                    <label>Comisión propietario:</label>               
                                    <span class="form-control">{{$contrato->comision_propietario}}</span>                                                            
                                </div>
                            </div>   
                            <div class="col-md-2">
                                <div class="form-group">
                                        <label>Comisión inquilino:</label>                                             
                                    <span class="form-control">{{$contrato->comision_inquilino}}</span>                                                                                              
                                </div>
                            </div>   
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Tipo de Renta:</label>                                                 
                                    <span class="form-control">{{$contrato->tipo_renta}}</span>                                                                                                  
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Valor para alquiler:</label>         
                                    <span class="form-control">{{$contrato->monto_basico}}</span>                                                            
                                </div>
                            </div>   
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>P. Incremento:</label>                                            
                                    <span class="form-control">{{$contrato->periodos}}</span>                                                                                              
                                </div>
                            </div>   
                            <div class="col-md-2">
                                <div class="form-group">
                                        <label>Tasa de incremento:</label>                                                
                                    <span class="form-control">{{$contrato->incremento}}</span>                                                                                                  
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Montos por periodo</h3>
                    </div>         
                    <div class="box-body">
                        <div style="max-height: 350px; overflow: auto;">
                            <table id="tabla-meses" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Rango de meses</th>
                                        <th>Renta fija</th>
                                        <th>Renta creciente</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contrato->periodos_contrato as $periodo_contrato)                    
                                    <tr>
                                        <td>{{$periodo_contrato->inicio_periodo}} - {{$periodo_contrato->fin_periodo}}</td>                                                                                 
                                        @if ($contrato->tipo_renta === "creciente")
                                        <td>${{$periodo_contrato->monto_fijo}}</td>
                                        <td><b>${{$periodo_contrato->monto_incremental}}</b></td>           
                                        @else
                                        <td><b>${{$periodo_contrato->monto_fijo}}</b></td>
                                        <td>${{$periodo_contrato->monto_incremental}}</td> 
                                        @endif                                                                                                                                                                                                                                                                                          
                                    </tr>        
                                    @endforeach                                                                      
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Rango de meses</th>
                                        <th>Renta fija</th>
                                        <th>Renta creciente</th> 
                                    </tr>
                                </tfoot>
                            </table>
                        </div>             
                    </div> 
                    <div class="box-footer">
                        <p class="pull-left form-text text-muted"><strong>Información:</strong> estos valores indican cuál será el monto básico
                            a pagar en el rango especificado.</p>                                             
                     </div>          
                </div>
            </div>


            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Servicios asociados</h3>
                    </div>                 
                    <div class="box-body">
                        <div style="max-height: 350px; overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>  
                                        @if ($contrato->sujeto_a_gastos_compartidos === 1)
                                        <th>Tipo servicio</th>                                                      
                                        @endif   
                                                              
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contrato->servicios_contrato as $servicio_contrato)                    
                                        <tr>
                                            <td>{{$servicio_contrato->servicio->nombre}}</td>                                            
                                            @if ($contrato->sujeto_a_gastos_compartidos === 1)
                                                @if ($servicio_contrato->servicio->servicio_compartido === 1)
                                                <td>Compartido</td>          
                                                @else
                                                <td>Individual</td>         
                                                @endif                                         
                                            @endif                                                                                                
                                        </tr>        
                                    @endforeach                       
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>  
                                        @if ($contrato->sujeto_a_gastos_compartidos === 1)
                                        <th>Tipo servicio</th>                                                      
                                        @endif                          
                                    </tr>
                                </tfoot>
                            </table>
                        </div>                    
                    </div>    
                    <div class="box-footer">
                        <p class="pull-left form-text text-muted"><strong>Información:</strong> estos son todos los servicios que 
                            fueron incluidos en el contrato.</p>                                             
                    </div>               
                </div>
            </div>
        </div>          
    </section>
</div>

@include('admin.edificios.formulario.confirmar')

@endsection
@section('script') 
    <script src="{{ asset('js/contrato.js') }}"></script>
@endsection

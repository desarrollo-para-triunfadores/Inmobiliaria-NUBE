<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Historial de Propietario</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">

        <table id="example" class="display responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center">FACTURA</th>
                <th class="text-center">Periodo</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($liquidaciones as $liquidacion)
                <tr>                        
                    @if(is_null($liquidacion[0]->fecha_pago_propietario))
                        <td class="text-center text-bold">Pagada ✔️</td>
                    @else
                                <td class="text-center text-bold">No pagada 🛑 </td>
                    @endif
                            <td class="text-center text-bold">{{$liquidacion[0]->periodo}}</td>
                    <td class="text-center" width="100">
                        {{--
                        <button onclick="mostrar_recibo($liquidacion)" title="Ver detalle de recibo" class="btn">
                           Ver
                        </button>
                        <button class="btn-bitbucket" onclick="escargar_recibo({{$liquidacion}})">Descargar
                        </button>
                                --}}
                                <a href="{{ route('contabilidad.show', $propietario->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                        </a>
                                <a href="{{ route('contabilidad.show', $propietario->id) }}" title="Descargar" class="btn btn-social-icon btn-sm btn-success">
                            <i class="fa fa-download"></i>
                        </a>
                                {{--
                                <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                                    <i class="fa fa-list"></i>
                                </a>
                                --}}
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        
        </table>
    </div>
    <!-- /.box-body -->
</div>




<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Mis Inquilinos</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">
        <table id="example" class="display responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">FACTURA</th>
                        <th class="text-center">Periodo</th>
                        <th class="text-center">Inmueble</th>
                        <th class="text-center">Direccion</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>                
                    @foreach($contratos as $contrato)
                        <tr>
                            <h3>{{$contrato->inquilino->persona->nombre}} {{$contrato->inquilino->persona->apellido}} (Gte: {{$contrato->garante->persona->nombre}} {{$contrato->garante->persona->apellido}})</h3>
                            <?php $liquidaciones_del_contrato = \App\LiquidacionMensual::where('contrato_id',$contrato->id)->get() ?>
                            @foreach($liquidaciones_del_contrato as $liquidacion)
                                @if(is_null($liquidacion->pagada))
                                    <td class="text-center text-bold">Pagada ✔️</td>
                                @else
                                    <td class="text-center text-bold">No pagada 🛑 </td>
                                @endif
                                <td class="text-center text-bold">{{$liquidacion->periodo}}</td>
                                <td class="text-center text-bold">{{$liquidacion->contrato->inmueble->edificio->nombre}}</b> | Piso {{$liquidacion->contrato->inmueble->piso}} N° {{$liquidacion->contrato->inmueble->numDepto}}</td>
                                <td class="text-center text-bold">{{$liquidacion->contrato->inmueble->direccion}} ({{$liquidacion->contrato->inmueble->localidad->nombre}})</td>
                                <td class="text-center" width="100">
            
                                    <a href="{{ route('contabilidad.show', $propietario->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                                        <i class="fa fa-list"></i>
                                    </a>
                                    <a href="{{ route('contabilidad.show', $propietario->id) }}" title="Descargar" class="btn btn-social-icon btn-sm btn-success">
                                        <i class="fa fa-download"></i>
                                    </a>                                
                                </td>
                            @endforeach
                        </tr>
                    @endforeach            
            </tbody>
        </table>
    </div>
</div>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Aquí se encuentran los alquileres disponibles para su extracción</h3>
    
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">
        <table id="example" class="display responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center">Inquilino</th>
                <th class="text-center">Periodo</th>
                <th class="text-center">Alquiler</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Inmueble</th>
                <th class="text-center">Direccion</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>                
                    @foreach($contratos as $contrato)
                        <tr>
                            <?php 
                                $liquidaciones_del_contrato = \App\LiquidacionMensual::where('contrato_id',$contrato->id)->get();    
                            ?>

                            <td class="text-center text-bold">{{$contrato->inquilino->persona->nombre}} {{$contrato->inquilino->persona->apellido}}</td>
                            @foreach($liquidaciones_del_contrato as $liquidacion)                                
                                <td class="text-center text-bold">{{$liquidacion->periodo}}</td>
                                <td class="text-center text-bold">$ {{number_format($liquidacion->alquiler , 2)}}</td>
                                @if($liquidacion->fecha_pago_propietario)
                                    <td class="text-center text-bold">Alquiler ya retidado ✔️</td>
                                @else
                                    @if(is_null($liquidacion->abonado))
                                        <td class="text-center text-bold">El inquilino aun no abono alquiler 🛑 </td>
                                    @else
                                        <td class="text-center text-bold">Dinero cobrado al inquilino, disponible para ser retidado 😃</td>
                                    @endif
                                @endif
                                <td class="text-center text-bold">{{$liquidacion->contrato->inmueble->edificio->nombre}}</b> | Piso {{$liquidacion->contrato->inmueble->piso}} N° {{$liquidacion->contrato->inmueble->numDepto}}</td>
                                <td class="text-center text-bold">{{$liquidacion->contrato->inmueble->direccion}} ({{$liquidacion->contrato->inmueble->localidad->nombre}})</td>
                                <td class="text-center" width="100">                                  
                                    <a href="{{ route('contabilidad.show', $propietario->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                                        <i class="fa fa-list"></i>
                                    </a>
                                    <a href="{{ route('contabilidad.show', $propietario->id) }}" title="Descargar" class="btn btn-social-icon btn-sm btn-success">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    
                                </td>
                            @endforeach
                        </tr>
                    @endforeach            
            </tbody>
        </table>
    </div>    
</div>
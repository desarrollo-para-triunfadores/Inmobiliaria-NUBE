<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Historial de Inquilino</h3>

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
                <th class="text-center">Periodo</th>
                <th class="text-center">FACTURA</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($liquidaciones as $liquidacion)
                <tr>             
                    <td class="text-center text-bold">{{$liquidacion->periodo}}</td> 
                    @if($liquidacion->abonado)     
                        <td class="text-center text-bold">Pagada ✔️</td>                 
                    @else
                        @if($liquidacion->vencimiento > \Carbon\Carbon::now())         
                            <td class="text-center text-bold">No pagada ❌</td>     
                        @else
                            <td class="text-center text-bold text-red">VENCIDA ❌</td>  
                        @endif     
                    @endif                    
                            
                    <td class="text-center" width="100">
                        {{--
                        <button onclick="mostrar_recibo($liquidacion)" title="Ver detalle de recibo" class="btn">
                           Ver
                        </button>
                        <button class="btn-bitbucket" onclick="escargar_recibo({{$liquidacion}})">Descargar
                        </button>
                        --}}
                        <a href="{{ route('contabilidad.verBoleta', $liquidacion->id)}}" target="_blank" title="Ver el detalle de esta boleta / Imprimir" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                          
                        </a>
                                <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Descargar" class="btn btn-social-icon btn-sm btn-success">
                            <i class="fa fa-download"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        
        </table>
    </div>
    <!-- /.box-body -->
</div>




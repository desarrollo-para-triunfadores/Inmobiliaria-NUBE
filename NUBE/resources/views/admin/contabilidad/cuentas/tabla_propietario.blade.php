<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Historial de Propietario</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body ">
        <table id="tabla-boletas-propietario" class="dataTable table-bordered display responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center">Factura</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Periodo</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($liquidaciones as $liquidacion)
                <tr>                        
                    @if(is_null($liquidacion[0]->fecha_pago_propietario))
                        <td class="text-center text-bold">No pagada </td>
                    @else
                        <td class="text-center text-bold">Pagada ✔️</td>
                    @endif
                    <td class="text-center text-bold">$ {{number_format($liquidacion[0]->comision_a_propietario,2)}} </td>
                    <td class="text-center text-bold">{{$liquidacion[0]->periodo}}</td>
                    <td class="text-center" width="100">
                        {{--<a href="{{ route('contabilidad.show', $propietario->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>
                        </a>--}}
                        <a href="{{ route('contabilidad.verBoleta', $liquidacion[0]->id)}}" target="_blank" title="Ver el detalle de esta boleta / Imprimir" class="btn btn-social-icon btn-sm btn-info">
                            <i class="fa fa-list"></i>                          
                        </a>
                    </td>
                </tr>
            @endforeach            
            </tbody>        
        </table>
    </div>
    <!-- /.box-body -->
</div>

<h1>Mis Inquilinos:</h1>
@foreach($contratos as $contrato)
    <div class="box box-default">
        <div class="box-header with-border">
            <h2 class="box-title animated flash"><b> {{$contrato->inquilino->persona->nombre}} {{$contrato->inquilino->persona->apellido}}</b>   &nbsp &nbsp🏠 <b>{{$contrato->inmueble->edificio->nombre}} | {{$contrato->inmueble->tipo->nombre}} en Piso {{$contrato->inmueble->piso}} N° {{$contrato->inmueble->numDepto}} 🏠</h2>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
            
            <table id="tabla-inquilinos-propietario" class="dataTable table-bordered table-responsive display responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">Factura</th>
                            <th class="text-center">Periodo</th>
                            <th class="text-center">Inmueble</th>
                            <th class="text-center">Direccion</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                
                <tbody>  
                    <tr>                              
                    @foreach($contrato->liquidaciones as $liquidacion)                    
                        @if($liquidacion->abonado)     
                            <td class="text-center text-bold">Pagada ✔️</td>                 
                        @else
                            @if($liquidacion->vencimiento > \Carbon\Carbon::now())         
                                <td class="text-center text-bold text-purple">No pagada ❌</td>     
                            @else
                                <td class="text-center text-bold text-red">VENCIDA ❌</td>  
                            @endif     
                        @endif 
                        
                        <td class="text-center text-bold">{{$liquidacion->periodo}}</td>
                        <td class="text-center text-bold">{{$liquidacion->contrato->inmueble->edificio->nombre}}</b> | Piso {{$liquidacion->contrato->inmueble->piso}} N° {{$liquidacion->contrato->inmueble->numDepto}}</td>
                        <td class="text-center text-bold">{{$liquidacion->contrato->inmueble->direccion}} ({{$liquidacion->contrato->inmueble->localidad->nombre}})</td>
                        <td class="text-center" width="100">            
                            <a href="{{ route('contabilidad.show', $propietario->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info">
                                <i class="fa fa-list"></i>
                            </a>
                            <a href="{{ route('contabilidad.verBoleta', $liquidacion->id)}}" target="_blank" title="Ver el detalle de esta boleta / Imprimir" class="btn btn-social-icon btn-sm btn-info">
                                <i class="fa fa-list"></i>                          
                            </a>                              
                        </td>
                    </tr>
                    @endforeach                   
                </tbody>
            </table>
            
        </div>
    </div>
@endforeach

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
        <table id="tabla-extracciones-propietario" class="dataTable table-bordered table-responsive display responsive" cellspacing="0" width="100%">
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

@section('script')
    <script>
        alert('se entra a instanciar tablas');
        /************ Tabla para la contabilidad - extracciones para propietario************/
        var tableprop3 = $('#tabla-extracciones-propietario').DataTable({
            "language": tabla_traducida,
        });
        //filtro individuales - instanciación de los filtros
        $('#tabla-extracciones-propietario tfoot th').each(function () {
            var title = $(this).text()
            if (title !== '') {
            if (title !== 'Acciones') { // ignoramos la columna de los botones
                $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
            }
            }
        })
        // filtro individuales - búsqueda
        tableprop3.columns().every(function () {
            var that = this
            $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw()
            }
            })
        })

        //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
        $('#tabla-extracciones-propietario tbody').on('mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
            $(tableprop3.cells().nodes()).removeClass('highlight');
            $(tableprop3.column(colIdx).nodes()).addClass('highlight');
        });

/********************** Tabla para la contabilidad - boletas inquilinos de propietario *******************/
  var tableprop2 = $('#tabla-inquilinos-propietario').DataTable({
    "language": tabla_traducida,
  });
  //filtro individuales - instanciación de los filtros
  $('#tabla-inquilinos-propietario tfoot th').each(function () {
    var title = $(this).text()
    if (title !== '') {
      if (title !== 'Acciones') { // ignoramos la columna de los botones
        $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
      }
    }
  });
  // filtro individuales - búsqueda
  tableprop2.columns().every(function () {
    var that = this
    $('input', this.footer()).on('keyup change', function () {
      if (that.search() !== this.value) {
        that.search(this.value).draw()
      }
    })
  });

  //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
  $('#tabla-inquilinos-propietario tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(tableprop2.cells().nodes()).removeClass('highlight');
    $(tableprop2.column(colIdx).nodes()).addClass('highlight');
  });

  /********************************* Tabla para la contabilidad - boletas propietario ***************************/
    var tableprop1 = $('#tabla-boletas-propietario').DataTable({
        "language": tabla_traducida,
    });
    //filtro individuales - instanciación de los filtros
    $('#tabla-boletas-propietario tfoot th').each(function () {
        var title = $(this).text()
        if (title !== '') {
        if (title !== 'Acciones') { // ignoramos la columna de los botones
            $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
        }
        }
    }) ;
    // filtro individuales - búsqueda
    tableprop1.columns().every(function () {
        var that = this
        $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw()
        }
        })
    });

    //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
    $('#tabla-boletas-propietario tbody').on('mouseenter', 'td', function () {
        var colIdx = table.cell(this).index().column;
        $(tableprop1.cells().nodes()).removeClass('highlight');
        $(tableprop1.column(colIdx).nodes()).addClass('highlight');
    });


    </script>
@endsection
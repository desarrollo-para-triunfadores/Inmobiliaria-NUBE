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
        <table id="tabla_contabilidad_historia_inquilino" class="display responsive" cellspacing="0" width="100%">
            <thead>
            <tr>                
                <th class="text-center">Periodo</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($liquidaciones as $liquidacion)
                <tr>             
                    <td class="text-center text-bold">{{$liquidacion->periodo}}</td> 
                    <td class="text-center text-bold">$ {{$liquidacion->total}}</td> 
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
                        {{--
                        <a href="{{ route('contabilidad.show', $inquilino->id) }}" title="Descargar" class="btn btn-social-icon btn-sm btn-success">
                            <i class="fa fa-download"></i>
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

@section('script')
<script>
/********************************* Tabla para la contabilidad - boletas propietario ***************************/
  var trdi = $('#tabla_resumen_deudas_inquilino').DataTable({
    "language": tabla_traducida,
  });
  //filtro individuales - instanciación de los filtros
  $('#tabla_resumen_deudas_inquilino tfoot th').each(function () {
    var title = $(this).text()
    if (title !== '') {
      if (title !== 'Acciones') { // ignoramos la columna de los botones
        $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
      }
    }
  })  
  // filtro individuales - búsqueda
  trdi.columns().every(function () {
    var that = this
    $('input', this.footer()).on('keyup change', function () {
      if (that.search() !== this.value) {
        that.search(this.value).draw()
      }
    })
  })
    
  //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
  $('#tabla_resumen_deudas_inquilino tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(trdi.cells().nodes()).removeClass('highlight');
    $(trdi.column(colIdx).nodes()).addClass('highlight');
  });

/********************************* Tabla para la contabilidad - boletas propietario ***************************/
  var tchi = $('#tabla_contabilidad_historia_inquilino').DataTable({
    "language": tabla_traducida,
  });
  //filtro individuales - instanciación de los filtros
  $('#tabla_contabilidad_historia_inquilino tfoot th').each(function () {
    var title = $(this).text()
    if (title !== '') {
      if (title !== 'Acciones') { // ignoramos la columna de los botones
        $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
      }
    }
  })  
  // filtro individuales - búsqueda
  tchi.columns().every(function () {
    var that = this
    $('input', this.footer()).on('keyup change', function () {
      if (that.search() !== this.value) {
        that.search(this.value).draw()
      }
    })
  })
    
  //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
  $('#tabla_contabilidad_historia_inquilino tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(tchi.cells().nodes()).removeClass('highlight');
    $(tchi.column(colIdx).nodes()).addClass('highlight');
  });
  /********************************************************************************************************* */
</script>

@endsection

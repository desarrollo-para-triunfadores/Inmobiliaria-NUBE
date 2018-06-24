

var ctx = document.getElementById('grafico_ingresos').getContext("2d")
var ene = $('#ingresos_enero').val();
var feb = $('#ingresos_febrero').val();
var mar = $('#ingresos_marzo').val();
var abr = $('#ingresos_abril').val();
var may = $('#ingresos_mayo').val();
var jun = $('#ingresos_junio').val();
var jul = $('#ingresos_julio').val();
var ago = $('#ingresos_agosto').val();
var sep = $('#ingresos_septiembre').val();
var oct = $('#ingresos_octubre').val();
var nov = $('#ingresos_noviembre').val();
var dic = $('#ingresos_diciembre').val();

var myChart = new Chart(ctx, {
type: 'line',
data: {
    labels: ["ENE", "FEB", "MAR", "ABR", "MAY", "JUN", "JUL", "AGO", "SEP", "OCT", "NOV", "DIC"],
    datasets: [{
        label: "Ingresos Mensuales",
        borderColor: "#80b6f4",
        pointBorderColor: "#80b6f4",
        pointBackgroundColor: "#80b6f4",
        pointHoverBackgroundColor: "#80b6f4",
        pointHoverBorderColor: "#80b6f4",
        pointBorderWidth: 10,
        pointHoverRadius: 10,
        pointHoverBorderWidth: 1,
        pointRadius: 3,
        fill: false,
        borderWidth: 4,
        data: [ene, feb, mar, abr, may, jun, jul, ago, sep, oct, nov, dic]    //Ingresos x Mes
    }]
},
options: {
    legend: {
        position: "bottom"
    },
    scales: {
        yAxes: [{
            ticks: {
                fontColor: "rgba(0,0,0,0.5)",
                fontStyle: "bold",
                beginAtZero: true,
                maxTicksLimit: 5,
                padding: 20
            },
            gridLines: {
                drawTicks: false,
                display: false
            }
}],
        xAxes: [{
            gridLines: {
                zeroLineColor: "transparent"
},
            ticks: {
                padding: 20,
                fontColor: "rgba(0,0,0,0.5)",
                fontStyle: "bold"
            }
        }]
    }
}
});
/******************************************************************************************************************* */

/** En seccion TABLA MOVIMIENTOS en "Contabilidad" General**/
//Datatable | instaciación del plugin
var table_mov = $('#tabla_movimientos').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
});
//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_movimientos tbody').on('mouseenter', 'td', function () {
    var colIdx = table_mov.cell(this).index().column;
    $(table_mov.cells().nodes()).removeClass('highlight');
    $(table_mov.column(colIdx).nodes()).addClass('highlight');
});

instaciar_filtros_movimientos();
function instaciar_filtros_movimientos() {
    //Datatables | filtro individuales - instanciación de los filtros
    $('#tabla_movimientos tfoot th').each(function () {
        var title = $(this).text();
        if (title !== "") {
            if (title !== 'Acciones') { //ignoramos la columna de los botones
                $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />');
            }
        }
    });
// filtro individuales - búsqueda
    table_mov.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
}

//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_movimientos tbody').on('mouseenter', 'td', function () {
    var colIdx = table_mov.cell(this).index().column;
    $(table_mov.cells().nodes()).removeClass('highlight');
    $(table_mov.column(colIdx).nodes()).addClass('highlight');
});
  

  /********************************* Tabla para la contabilidad - GENERAL - CLIENTES ***************************/
  

instanciar_tabla_resumen_x_clientes();
function instanciar_tabla_resumen_x_clientes() {
    var tabla_resumen_x_clientes = $('#tabla_resumen_x_clientes').DataTable({
        "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    });
    //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
    $('#tabla_resumen_x_clientes tbody').on('mouseenter', 'td', function () {
        var colIdx = tabla_resumen_x_clientes.cell(this).index().column;
        $(tabla_resumen_x_clientes.cells().nodes()).removeClass('highlight');
        $(tabla_resumen_x_clientes.column(colIdx).nodes()).addClass('highlight');
    });
    //Datatables | filtro individuales - instanciación de los filtros
    $('#tabla_resumen_x_clientes tfoot th').each(function () {
        var tabla_cli_title = $(this).text();
        if (tabla_cli_title !== "") {
            if (tabla_cli_title !== 'Acciones') { //ignoramos la columna de los botones
                $(this).html('<input nombre="' + tabla_cli_title + '" type="text" placeholder="Buscar ' + tabla_cli_title + '" />');
            }
        }
    });
//Datatables | filtro individuales - búsqueda
    tabla_resumen_x_clientes.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });

    
    //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
    $('#tabla_resumen_x_clientes tbody').on('mouseenter', 'td', function () {
        var colIdx = tabla_resumen_x_clientes.cell(this).index().column;
        $(tabla_resumen_x_clientes.cells().nodes()).removeClass('highlight');
        $(tabla_resumen_x_clientes.column(colIdx).nodes()).addClass('highlight');
    });
}

/************************************************************** */
function validarMovimiento_Otro(valor_select){
    if($('#concepto_mov').val()==0){
        console.log("Se entro en validarMovimiento_Otro = "+valor_select.value);
        $('#descripcion').removeClass('hide');
        //$("#conv_mov").hide();
        //alert('sedeberia mostrar el campo para DESCRIPCION');
    }else{
        //$("#descripcion").hide();
        //alert('sedeberia OCULTAR campo Descripcion');
    }
}
/*****  Mascaras para decimales  ******/
$('#monto_mov').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false});    //monto de alta de movimiento
//$('#monto').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false});
/***************************************************************************************************************** */

function ver_boleta(liquidacion_id){    //Abre boletas anteriores en pestaña nueva    
   $.ajax({
        dataType: 'JSON',
        url: "/admin/contabilidad/verBoleta",
        data: {
            liquidacion_id: liquidacion_id,            
        },       
    });      
}



/***************************************************************************************************************** */


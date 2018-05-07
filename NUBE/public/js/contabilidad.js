//-------------
//- PIE CHART -
/* ESTO ESTA COMENTADO PORQUE GENERABA CONFLICTOS
var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
var pieChart = new Chart(pieChartCanvas);
var PieData = [
    {
        value: 700,
        color: "#f56954",
        highlight: "#f56954",
        label: "Sueldos Personal"
    },
    {
        value: 500,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Limpieza"
    },
    {
        value: 400,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "Mantenimiento"
    },
    {
        value: 600,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Seguros"
    },
    {
        value: 300,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Marketing"
    },
    {
        value: 100,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "Inmpuesto Inmobiliario"
    }
];
var pieOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 2,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
};
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
pieChart.Doughnut(PieData, pieOptions);

*/
/******************************************************************************************************************* */


/** En seccion TABLA MOVIMIENTOS **/
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
//Datatables | filtro individuales - búsqueda
    table_mov.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
}
//Datatables | ocultar/visualizar columnas dinámicamente
/*
$('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    var column = table_mov.column($(this).attr('data-column'));
    column.visible(!column.visible());
    instaciar_filtros_movimientos();
});
*/
//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_movimientos tbody').on('mouseenter', 'td', function () {
    var colIdx = table_mov.cell(this).index().column;
    $(table_mov.cells().nodes()).removeClass('highlight');
    $(table_mov.column(colIdx).nodes()).addClass('highlight');
});
/******************************************************************************************************************* */


//Datatable - instaciación del plugin
/** TABLA CLIENTES **** En seccion TABLA CLIENTES **/
//Datatable | instaciación del plugin
var table_c = $('#tabla_clientes').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
});
//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_clientes tbody').on('mouseenter', 'td', function () {
    var colIdx = table_c.cell(this).index().column;
    $(table_c.cells().nodes()).removeClass('highlight');
    $(table_c.column(colIdx).nodes()).addClass('highlight');
});

instaciar_filtros_clientes();
function instaciar_filtros_clientes() {
    //Datatables | filtro individuales - instanciación de los filtros
    $('#tabla_clientes tfoot th').each(function () {
        var title = $(this).text();
        if (title !== "") {
            if (title !== 'Acciones') { //ignoramos la columna de los botones
                $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />');
            }
        }
    });
//Datatables | filtro individuales - búsqueda
    table_c.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
}

/************************************************************** */
function validarMovimiento_Otro(valor_select){
    if($('#concepto_mov').val()==0){
        console.log("Se entro en validarMovimiento_Otro = "+valor_select.value);
        $('#descripcion').removeClass('hide');
        $("#conv_mov").hide();
        alert('sedeberia mostrar el campo para DESCRIPCION');
    }else{
        $("#descripcion").hide();
        alert('sedeberia OCULTAR campo Descripcion');
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
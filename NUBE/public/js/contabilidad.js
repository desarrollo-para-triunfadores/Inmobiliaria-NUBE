//-------------
//- PIE CHART -
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
/**
 * Created by jpaul on 17/1/2018.
 */


/** En seccion TABLA MOVIMIENTOS **/
//Datatable - instaciación del plugin
var table = $('#example').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
});
//Datatable - instaciación del plugin
//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#example tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
});

instaciar_filtros();
function instaciar_filtros() {
    //Datatables | filtro individuales - instanciación de los filtros
    $('#example tfoot th').each(function () {
        var title = $(this).text();
        if (title !== "") {
            if (title !== 'Acciones') { //ignoramos la columna de los botones
                $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />');
            }
        }
    });
//Datatables | filtro individuales - búsqueda
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
}
//Datatables | ocultar/visualizar columnas dinámicamente
$('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
    instaciar_filtros();
});
//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#example tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
});



/** TABLA CLIENTES **/
/*
var tabla_clientes = $('#tabla_clientes').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
});
//Datatable - instaciación del plugin
//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_clientes tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_clientes.cell(this).index().column;
    $(tabla_clientes.cells().nodes()).removeClass('highlight');
    $(tabla_clientes.column(colIdx).nodes()).addClass('highlight');
});

instaciar_filtros();
function instaciar_filtros() {
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
    tabla_clientes.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
}

//Datatables | ocultar/visualizar columnas dinámicamente
$('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = tabla_clientes.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
    instaciar_filtros();
});

//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_clientes tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_clientes.cell(this).index().column;
    $(tabla_clientes.cells().nodes()).removeClass('highlight');
    $(tabla_clientes.column(colIdx).nodes()).addClass('highlight');
});
/********************************************************************************************** */


$("#costo_id").change(function () {
    if ($('#costo_id').val() === '0') {
        $('#descripcion').show();
    }
    if ($('#costo_id').val() != '0') {
        $("#descripcion").hide();
    }
})
/*
if ($('#costo_id').val(0)) {
    $('#descripcion').removeClass('hide');
} else {
    $('#descripcion').hide();
}
*/

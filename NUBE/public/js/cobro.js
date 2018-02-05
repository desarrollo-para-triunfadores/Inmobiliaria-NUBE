$("#side-liquidaciones-li").addClass("active");
$("#side-liquidaciones-ul").addClass("menu-open");
$("#side-ele-cobros").addClass("active");

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', 'roles/' + id);
    $('#boton-modal-borrar').click();
}

//Datatable - instaciación del plugin
var table = $('#example').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.
});


//Datatables | filtro individuales - instanciación de los filtros
$('#example tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
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

//Datatables | ocultar/visualizar columnas dinámicamente
$('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
});

//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#example tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
});


function calcular_cambio(){
    $("#leyenda_vuelto").addClass("hide");
    if($("#abonado").val() !== ""){
        var saldo_periodo = 0,
            abonado = parseFloat($("#abonado").val()),
            total = parseFloat($("#total").val());
        if(abonado >= total){
            saldo_periodo = abonado - total;
            $("#saldo_periodo").val(saldo_periodo);
            $("#leyenda_vuelto").html("Diferencia: $"+saldo_periodo);
            $("#leyenda_vuelto").removeClass("hide");
        }

    }

    console.log("sali");
}

function traer_resumen(){
    console.log($('#inquilino_id').val());
    $.ajax({
        url: '/admin/cobros',
        data: {
            inquilino: $('#inquilino_id').val()
        },
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#tabla_deudas').html(data)
        }
    })
}
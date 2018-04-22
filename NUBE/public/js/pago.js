$("#side-liquidaciones-li").addClass("active");
$("#side-liquidaciones-ul").addClass("menu-open");
$("#side-ele-pagos").addClass("active");


function confirmar_pago(tipo, id) { 
    console.log(tipo);
    console.log(id);
    bootbox.confirm({
        title: "Confirmaci\u00f3n de pago",
        message: "¿Se encuentra seguro de proseguir?",
        className: 'modal-warning',
        buttons: {
            cancel: {
                className: 'btn btn-outline pull-left',
                label: 'Cancelar'
            },
            confirm: {
                className: 'btn btn-outline pull-right',
                label: 'Confirmar'
            }
        },
        callback: function (result) {
            console.log(result);
            if(result){   
                $.ajax({ // se envía
                    url: '/admin/registrar_pago',
                    data: {
                       id: id,
                       tipo: tipo
                    },
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        window.location.href = '/admin/pagos'
                    }
                })
            }            
        }
    });
}


//Datatable
var table = $('#example').DataTable({
    language: tabla_traducida
});

$('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
});

$('#example tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
});
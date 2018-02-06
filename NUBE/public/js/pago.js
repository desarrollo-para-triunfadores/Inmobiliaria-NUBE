$("#side-liquidaciones-li").addClass("active");
$("#side-liquidaciones-ul").addClass("menu-open");
$("#side-ele-pagos").addClass("active");


function abrir_modal_confirmar(id) {  
    $('#form-update').attr('action', '/admin/pagos/' + id);
    $('#boton-modal-update').click();
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
$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-servicios").addClass("active");


function completar_campos(pais) {
    $('#nombre').val(pais.nombre);
    $('#form-update').attr('action', '/admin/servicios/' + pais.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/servicios/' + id);
    $('#boton-modal-borrar').click();
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
$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-lugares-ul").addClass("menu-open");
$("#side-ele-lugares-li").addClass("active");
$("#side-ele-lugares-localidades").addClass("active");

function completar_campos(localidad) {
    $('#nombre').val(localidad.nombre);
    $('#provincia_id').val(localidad.provincia_id).trigger("change");
    $('#cod_postal').val(localidad.cod_postal);
    $('#form-update').attr('action', '/localidades/' + localidad.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/localidades/' + id);
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
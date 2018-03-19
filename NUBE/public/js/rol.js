$("#side-usuarios-li").addClass("active");
$("#side-usuarios-ul").addClass("menu-open");
$("#side-ele-roles").addClass("active");


$('#input_busqueda').on('keyup', function (evt) { // este evento controla y aplica el filtra todos los permisos de acuerdo a lo que se está escribiendo en el campo
    $(".li_item").addClass("hide"); //escondemos todos los items 
    var valor_a_filtrar = $(this).val(); //valor del campo
    if ($(this).val() !== "") {     // vemos si el campo de búsqueda está vacio o no.   
        $('.li_item').each(function(key, element){  // por cada elemento que está para filtrar vemos que existan coincidencias entre el id de ese elemento y el valor escrito     
            nombre_permiso = element.getAttribute("id"); 
            if (nombre_permiso.indexOf(valor_a_filtrar)  > -1){           
                $("#" + nombre_permiso).removeClass("hide");
            }
        });
    } else {
        $(".li_item").removeClass("hide");
    }
});

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

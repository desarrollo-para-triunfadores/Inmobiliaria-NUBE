$("#side-inmueble-li").addClass("active");
$("#side-inmueble-ul").addClass("menu-open");
$("#side-ele-inquilinos").addClass("active");

function completar_campos(inquilino) { // este método carga los datos de un registro en el formulario de actualización
    $('#apellido').val(inquilino.persona.apellido);
    $('#dni').val(inquilino.persona.dni);
    $('#sexo').val(inquilino.persona.sexo);
    $('#fecha_nac').val("");
    $('.datepicker').bootstrapMaterialDatePicker ('setDate', moment(inquilino.persona.fecha_nac));
    $('#telefono').val(inquilino.persona.telefono);
    $('#telefono_contacto').val(inquilino.persona.telefono_contacto);
    $('#email').val(inquilino.persona.email);
    $('#localidad_id').val(inquilino.persona.localidad_id).trigger("change");
    $('#direccion').val(inquilino.persona.direccion);
    $('#nombre').val(inquilino.persona.nombre);
    $('#pais_id').val(inquilino.persona.pais_id).trigger("change");
    $('#form-update').attr('action', '/admin/inquilinos/' + inquilino.id);
    $('#modal-update').modal();
    $("#modal-update").on('shown.bs.modal', function () {
       
        /**
         * El método "instanciar_croppie_update" se encuentra en el archivo de 
         * javascript: imagen_croppie.js de la carpeta public/js/.
         * La variable url_imagenes_personas se encuentra definida en partes/scripts/
         */
        
        instanciar_croppie_update(url_imagenes_personas + inquilino.persona.foto_perfil);
    });  
}

function abrir_modal_borrar(id) {  // este método carga los datos de un registro en el formulario de confirmación de eliminación
    $('#form-borrar').attr('action', '/admin/inquilinos/' + id);
    $('#boton-modal-borrar').click();
}



//Datatable - instaciación del plugin
var table = $('#example').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    "columns": [//defino propiedades para la columnas, en este caso indico cuales quiero que se inicien ocultas.
        null,                   //0--AyNombre
        {"visible": false},     //1--Sexo
        null,                   //2--Documento
        {"visible": false},     //3--Nacionalidad
        {"visible": false},     //4--Fecha Nacimiento
        null,                   //5--Telefono 2
        {"visible": false},     //6--Telefono 1
        null,                   //7--Email
        null,                   //8--Alquiler (Inmueble que alquila)
        null,                   //9--Localidad
        {"visible": false},     //10--Fecha_Alta
        null                    //11--Acciones
    ]
});



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


//Bootstrap Material Date picker
$('.datepicker').bootstrapMaterialDatePicker ({
    format: 'DD/MM/YYYY',
    lang: 'es',
    weekStart: 1, 			
    switchOnClick : true,
    cancelText: 'cerrar',
    okText: 'ok',
    minDate : moment().add(-100, 'year'),
    maxDate : moment(),
    time: false 
});



function mostrar_panel_persona () {
    if ($('#panel_persona_nueva').is(':hidden')) {
        $('#panel_persona_nueva').show()
        $('#persona_id').removeAttr('required')
        $('#persona_id').attr('disabled', true)
    } else {
        $('#panel_persona_nueva').hide()
        $('#persona_id').attr('required', true)
        $('#persona_id').removeAttr('disabled')
    }
  }


// Enviar datos.
function mandar(tipo_form) { //tipo_form puede ser create o update

    var redireccion = "/admin/inquilinos/";


//// Este método sirve para ver el contenido del formdata
//for (var pair of formData.entries())
//{
// console.log(pair[0]+ ', '+ pair[1]); 
//}
    var form = $("#form-" + tipo_form);
    var url = form.attr("action");
    var token = $("#token-" + tipo_form).val();
    var formData = new FormData(document.getElementById("form-" + tipo_form));

    if ((tipo_form === 'create')&&(imagen_cropie.create !== '')) {
        formData.append('imagen', imagen_cropie.create)
    } else if (imagen_cropie.update !== ''){
        formData.append('imagen', imagen_cropie.update)
    } 

    $.ajax(url, {
        headers: {"X-CSRF-TOKEN": token},
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            window.location.href = redireccion;
        },
        error: function () {
            console.log('Upload error');
        }
    });
   
}
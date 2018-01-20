$("#side-inmueble").addClass("active");
$("#side-inmueble-ul").addClass("menu-open");
$("#side-ele-propietarios").addClass("active");



function completar_campos(propietario) {
    console.log(propietario);
    $('#apellido').val(propietario.persona.apellido);
    $('#dni').val(propietario.persona.dni);
    $('#sexo').val(propietario.persona.sexo);
    $('#fecha_nac').val(propietario.persona.fecha_nac);
    $('#telefono').val(propietario.persona.telefono);
    $('#telefono_contacto').val(propietario.persona.telefono_contacto);
    $('#email').val(propietario.persona.email);
    $('#localidad_id').val(propietario.persona.localidad_id).trigger("change");
    $('#direccion').val(propietario.persona.direccion);
    $('#nombre').val(propietario.persona.nombre);
    $('#pais_id').val(propietario.persona.pais_id).trigger("change");
    $('#form-update').attr('action', '/admin/propietarios/' + propietario.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/propietarios/' + id);
    $('#boton-modal-borrar').click();
}



//Datatable - instaciación del plugin
var table = $('#example').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    "columns": [//defino propiedades para la columnas, en este caso indico cuales quiero que se inicien ocultas.
        null,
        {"visible": false},
        null,
        {"visible": false},
        {"visible": false},
        null,
        {"visible": false},
        null,
        {"visible": false},
        null,
        {"visible": false},
        null
    ]
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


//Date picker
$('.datepicker').datepicker({
    autoclose: true,
    startDate: "-80y",
    endDate: "0y",
    todayHighlight: true,
    orientation: "bottom auto",
    format: "dd/mm/yyyy",
    language: "es"
});


//Croppie.js | create

//se instancia el plugin
var basic_nuevo = $('#main-cropper_nuevo').croppie({
    enableExif: true,
    viewport: {
        width: 275,
        height: 275,
        type: 'circle'
    },
    boundary: {
        width: 275,
        height: 275
    }
});

//carga imagen al plugin
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#main-cropper_nuevo').croppie('bind', {
                url: e.target.result
            });
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//evento sobre el botón subir
$('.actionUpload-nuevo input').on('change', function () {
    $('#main-cropper_nuevo').removeClass('hide');
    if (MediaStream_nuevo !== "") {
        MediaStream_nuevo.stop();
    }
    $("#video_nuevo").addClass("hide");
    $("#capture_nuevo").addClass("hide");
    $("#start_nuevo").removeClass("hide");
    $("#contenido_foto_nuevo").addClass("hide");
    readFile(this);
});



//Croppie.js | update

//se instancia el plugin
var basic_update = $('#main-cropper_update').croppie({
    enableExif: true,
    viewport: {
        width: 275,
        height: 275,
        type: 'circle'
    },
    boundary: {
        width: 275,
        height: 275
    }
});

//carga imagen al plugin
function readFile2(input) {
    if (input.files && input.files[0]) {
        var reader2 = new FileReader();
        reader2.onload = function (e) {
            $('#main-cropper_update').croppie('bind', {
                url: e.target.result
            });
        };
        reader2.readAsDataURL(input.files[0]);
    }
}

//evento sobre el botón subir
$('.actionUpload-update input').on('change', function () {
    $('#main-cropper_update').removeClass('hide');
    if (MediaStream_update !== "") {
        MediaStream_update.stop();
    }
    $("#video_update").addClass("hide");
    $("#capture_update").addClass("hide");
    $("#start_update").removeClass("hide");
    $("#contenido_foto_update").addClass("hide");
    readFile2(this);
});



// Enviar datos.

function mandar(tipo_form) { //tipo_form puede ser create o update

    var redireccion = "/admin/propietarios/";


//// Este método sirve para ver el contenido del formdata
//for (var pair of formData.entries())
//{
// console.log(pair[0]+ ', '+ pair[1]); 
//}

    var form = $("#form-" + tipo_form);
    var url = form.attr("action");
    var token = $("#token-" + tipo_form).val();
    var formData = new FormData(document.getElementById("form-" + tipo_form));


    if (tipo_form === 'create') {
        if (basic_nuevo_cam === "") {
            if ($('#imagen-nuevo').val() === '') {
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
            } else {
                basic_nuevo.croppie('result', 'blob').then(function (html) {
                    formData.append('imagen', html);
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
                });
            }
        } else {
            basic_nuevo_cam.croppie('result', 'blob').then(function (html) {
                formData.append('imagen', html);
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
            });
        }
    } else {
        if (basic_update_cam === "") {
            if ($('#imagen-update').val() === '') {
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
            } else {
                basic_update.croppie('result', 'blob').then(function (html) {
                    formData.append('imagen', html);
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
                });
            }
        } else {
            basic_update_cam.croppie('result', 'blob').then(function (html) {
                formData.append('imagen', html);
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
            });
        }
    }
}
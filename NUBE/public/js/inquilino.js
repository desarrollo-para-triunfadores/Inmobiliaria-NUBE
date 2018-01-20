$("#side-inmueble").addClass("active");
$("#side-inmueble-ul").addClass("menu-open");
$("#side-ele-inquilinos").addClass("active");



function completar_campos(inquilino) {
    console.log(inquilino);
    $('#apellido').val(inquilino.persona.apellido);
    $('#dni').val(inquilino.persona.dni);
    $('#sexo').val(inquilino.persona.sexo);
    $('#fecha_nac').val(inquilino.persona.fecha_nac);
    $('#telefono').val(inquilino.persona.telefono);
    $('#telefono_contacto').val(inquilino.persona.telefono_contacto);
    $('#email').val(inquilino.persona.email);
    $('#localidad_id').val(inquilino.persona.localidad_id).trigger("change");
    $('#direccion').val(inquilino.persona.direccion);
    $('#nombre').val(inquilino.persona.nombre);
    $('#pais_id').val(inquilino.persona.pais_id).trigger("change");
    $('#form-update').attr('action', '/admin/inquilinos/' + inquilino.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
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
$("#side-inmueble").addClass("active");

function completar_campos(edificio) {
    $('#nombre').val(edificio.nombre);
    $('#direccion').val(edificio.direccion);
    $('#fecha_inauguracion').val(edificio.fecha_inauguracion);
    $('#costo_mant_ascensores').val(edificio.costo_mant_ascensores);
    $('#valor_ascensores').val(edificio.valor_ascensores);
    $('#cant_ascensores').val(edificio.cant_ascensores);
    $('#costo_limpieza').val(edificio.costo_limpieza);

    $('#form-update').attr('action', '/admin/edificios/' + edificio.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/edificios/' + id);
    $('#boton-modal-borrar').click();
}


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

//evento sobre el bot�n subir
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

//evento sobre el bot�n subir
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
    var redireccion = "/admin/edificios/";

//// Este m�todo sirve para ver el contenido del formdata
//for (var pair of formData.entries())
//{
// console.log(pair[0]+ ', '+ pair[1]);
//
    var form = $("#form-" + tipo_form);
    var url = form.attr("action");
    var token = $("#token-" + tipo_form).val();
    var formData = new FormData(document.getElementById("form-" + tipo_form));

/*
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
    */
}


// Datatable - instaciación del plugin
var table = $('#example').DataTable({
    'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

})

instaciar_filtros()
function instaciar_filtros () {
    // Datatables | filtro individuales - instanciación de los filtros
    $('#example tfoot th').each(function () {
        var title = $(this).text()
        if (title !== '') {
            if (title !== 'Acciones') { // ignoramos la columna de los botones
                $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
            }
        }
    })

    // Datatables | filtro individuales - búsqueda
    table.columns().every(function () {
        var that = this
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw()
            }
        })
    })
}
/**Mascaras*/
$('#costo_sueldos_personal').maskMoney({prefix:'$', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
$('#costo_limpieza').maskMoney({prefix:'$', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
$('#valor_ascensores').maskMoney({prefix:'$', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
$('#costo_mant_ascensores').maskMoney({prefix:'$', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
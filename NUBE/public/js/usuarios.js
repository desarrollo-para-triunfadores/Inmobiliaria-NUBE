$("#side-usuarios-li").addClass("active");
$("#side-usuarios-ul").addClass("menu-open");
$("#side-ele-usuarios").addClass("active");

$('#select_filtro').on('change', function (evt) {
    $(".li_item").addClass("hide");
    if ($("#select_filtro").val() !== null) {
        $("#select_filtro").val().forEach(function (div) {
            $("#" + div).removeClass("hide");
        });
    } else {
        $(".li_item").removeClass("hide");
    }
});

function completar_campos(usuario) {
    $.ajax({ 
        url: '/admin/roles',
        data: {
            id: usuario.id        
        },
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log();
            $('#rol_usuario').val(data).trigger("change");
        }
    });
    $('#update-name').val(usuario.name);
    $('#update-email').val(usuario.email);    
    $('#form-update').attr('action', '/admin/usuarios/' + usuario.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/usuarios/' + id);
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

var redireccion = "/admin/usuarios/";


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

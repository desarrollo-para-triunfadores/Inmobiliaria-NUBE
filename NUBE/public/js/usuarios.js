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

function completar_campos(usuario, nombre_rol) {
    $('#rol_usuario').val(nombre_rol).trigger("change");
    $('#update-name').val(usuario.name);
    $('#update-email').val(usuario.email);          
    $('#form-update').attr('action', '/admin/usuarios/' + usuario.id);
   
    $('#modal-update').modal();
    $("#modal-update").on('shown.bs.modal', function () {
        /**
         * El método "instanciar_croppie_update" se encuentra en el archivo de 
         * javascript: imagen_croppie.js de la carpeta public/js/.
         * La variable url_imagenes_usuarios se encuentra definida en partes/scripts/
         */
        instanciar_croppie_update(url_imagenes_usuarios + usuario.imagen);
    });    
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/usuarios/' + id);
    $('#modal-borrar').modal();
}


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

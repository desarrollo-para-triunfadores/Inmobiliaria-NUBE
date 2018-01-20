$("#side-inmueble").addClass("active");
$("#side-inmueble-ul").addClass("menu-open");
$("#side-ele-lugares-propiedades").addClass("active");

var etapas_instanciadas = {
    propietario: false,
    ubicacion: false,
    fotografias: false
};

$(document).ready(function () {
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Por favor, rellena este campo.",
        email: "Por favor, escribe una dirección de correo válida",
        url: "Por favor, escribe una URL válida.",
        date: "Por favor, escribe una fecha válida.",
        dateISO: "Por favor, escribe una fecha (ISO) válida.",
        number: "Por favor, escribe un número entero válido.",
        digits: "Por favor, escribe sólo dígitos.",
        creditcard: "Por favor, escribe un número de tarjeta válido.",
        equalTo: "Por favor, escribe el mismo valor de nuevo.",
        accept: "Por favor, escribe un valor con una extensión aceptada.",
        maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
        range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
    });

    var $validator = $("#form-create").validate({
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

//Instancio el Wizard
    $('#rootwizard').bootstrapWizard({
        tabClass: 'nav nav-pills',
        onNext: function (tab, navigation, index) {
            var $valid = $("#form-create").valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            }
            if (formulario_update) {
                switch (index) {
                    case 1:
                        if (!etapas_instanciadas.ubicacion) {
                            etapas_instanciadas.ubicacion = true;
                            instanciar_mapa();
                        }
                        break;
                    case 2:                                                                      
                        if (!etapas_instanciadas.fotografias) {
                            etapas_instanciadas.fotografias = true;
                            
                            console.log();
                            
                            instanciar_cropie(index);
                        }
                        break;
                }
            } else {
                switch (index) {
                    case 1:
                        if (!etapas_instanciadas.propietario) {
                            etapas_instanciadas.propietario = true;
                            instanciar_cropie(index);
                        }
                        break;
                    case 2:
                        if (!etapas_instanciadas.ubicacion) {
                            etapas_instanciadas.ubicacion = true;
                            instanciar_mapa();
                        }
                        break;
                    case 4:
                        if (!etapas_instanciadas.fotografias) {
                            etapas_instanciadas.fotografias = true;
                            instanciar_cropie(index);
                        }
                        break;
                }
            }


        },
        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('#rootwizard .progress-bar').css({width: $percent + '%'});
        },
        onFinish: function () {
            mandar();
        }
    });
});


function mostrar_panel_propitario() {
    if ($('#panel_propietario_nuevo').is(':hidden')) {
        $('#panel_propietario_nuevo').show();
    } else {
        $('#panel_propietario_nuevo').hide();
    }
}

function instanciar_mapa() {
 
    var map = new google.maps.Map(document.getElementById('map'), {//instancio mapa
        zoom: 12,
        center: marcador,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });
    var marker = new google.maps.Marker({//instancio marcador
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: marcador
    });
    marker.addListener('dragend', function () { //este es el evento que detecta las coordenadas al mover el marcador y setea los inputs ocultos en en el form.
        $("#latitud").val(marker.getPosition().lat());
        $("#longitud").val(marker.getPosition().lng());
    });
    marker.addListener('click', toggleBounce);
}


function toggleBounce() { //función para la animación del marcador
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}


//Date picker --instacniición y configuración
$('.datepicker').datepicker({
    autoclose: true,
    startDate: "-80y",
    endDate: "0y",
    todayHighlight: true,
    orientation: "bottom auto",
    format: "dd/mm/yyyy",
    language: "es"
});


//Sección - Caractísticas 

var caracteristicas_seleccionadas = [];
var caracteristicas_id = [];


function agregar_característica() {
    var cambio = false;
    $("#combo option:selected").each(function () {
        var caracteristica = JSON.parse($(this).attr('value'));
        if (!caracteristicas_id.includes(caracteristica.id)) {
            caracteristicas_seleccionadas.push(caracteristica);
            caracteristicas_id.push(caracteristica.id);
            $('#cantidad_caracteristicas').val(caracteristicas_seleccionadas.length);
            cambio = true;
        } else {
            $("#boton-modal-elemento-seleccionado").click();
        }
        $("#combo").val(null).trigger("change");
        $("#boton_cerrar_crear").click();
    });
    if (cambio) {
        $("#tabla_caracteristicas").html("");
        var num_fila = 1;
        caracteristicas_seleccionadas.forEach(function (caracteristica) {
            agregar_a_tabla(caracteristica, num_fila);
            num_fila++;
        });
    }
}


$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    var caracteristica = $($(this).closest('tr')["0"].lastElementChild).find("input")["0"].value;
    var posicion_objeto = 0;
    var i = 0;
    caracteristicas_seleccionadas.forEach(function (elemento) {
        if (elemento.id === parseInt(caracteristica)) {
            posicion_objeto = i;
        }
        i++;
    });
    caracteristicas_id.splice(caracteristicas_id.indexOf(parseInt(caracteristica)), 1);
    caracteristicas_seleccionadas.splice(posicion_objeto, 1);
    $(this).closest('tr').remove();
});


function agregar_a_tabla(caracteristica, num_fila) {
    console.log(caracteristica);
    var tabla = document.getElementById("tabla_caracteristicas");
    var row = tabla.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = caracteristica.nombre;
    cell2.innerHTML = caracteristica.descripcion;
    cell3.innerHTML = '<input type="button" class="borrar" value="Eliminar" />';
    cell4.innerHTML = '<input type="text" name="caracteristica' + num_fila + '" class="hide" value="' + caracteristica.id + '" />';
}



// Enviar datos.

function mandar() {
//tipo_form puede ser create o update

    var redireccion = "/admin/inmuebles/";
    var form = $("#form-create");
    var url = form.attr("action");
    var token = $("#token-create").val();
    var formData = new FormData(document.getElementById("form-create"));

    if (fotos.foto_presentacion_nuevo !== "") {
        formData.append('foto_presentacion_nuevo', fotos.foto_presentacion_nuevo);
    }
    if (fotos.foto_carrusel_1 !== "") {
        formData.append('foto_carrusel_1', fotos.foto_carrusel_1);
    }
    if (fotos.foto_carrusel_2 !== "") {
        formData.append('foto_carrusel_2', fotos.foto_carrusel_2);
    }
    if (fotos.foto_carrusel_3 !== "") {
        formData.append('foto_carrusel_3', fotos.foto_carrusel_3);
    }
    if (fotos.foto_carrusel_4 !== "") {
        formData.append('foto_carrusel_4', fotos.foto_carrusel_4);
    }
    if (fotos.foto_carrusel_5 !== "") {
        formData.append('foto_carrusel_5', fotos.foto_carrusel_5);
    }
    if (fotos.foto_detalle_1 !== "") {
        formData.append('foto_detalle_1', fotos.foto_detalle_1);
    }
    if (fotos.foto_detalle_2 !== "") {
        formData.append('foto_detalle_2', fotos.foto_detalle_2);
    }
    if (fotos.foto_detalle_3 !== "") {
        formData.append('foto_detalle_3', fotos.foto_detalle_3);
    }
    if (fotos.foto_detalle_4 !== "") {
        formData.append('foto_detalle_4', fotos.foto_detalle_4);
    }
    if (fotos.foto_plano_1 !== "") {
        formData.append('foto_plano_1', fotos.foto_plano_1);
    }
    if (fotos.foto_plano_2 !== "") {
        formData.append('foto_plano_2', fotos.foto_plano_2);
    }
    if (fotos.foto_propietario_nuevo !== "") {
        formData.append('imagen', fotos.foto_propietario_nuevo);
    }

//// Este método sirve para ver el contenido del formdata
//for (var pair of formData.entries())
//{
// console.log(pair[0]+ ', '+ pair[1]); 
//}

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






function completar_campos(inmueble) {
    
    console.log("inmueble");
    var contact = JSON.parse(inmueble);
   
//    console.log(dedo2);
    console.log(dedo);
    console.log(contact);

    $('#tipo_id').val(inmueble.tipo_id).trigger("change");
    $('#disponible').val(inmueble.disponible).trigger("change");
    $('#condicion').val(inmueble.condicion).trigger("change");

    $('#fechaHabilitacion').val(inmueble.fechaHabilitacion);
    $('#valorVenta').val(inmueble.valorVenta);
    $('#valorReal').val(inmueble.valorReal);
    $('#valorAlquiler').val(inmueble.valorAlquiler);
    $('#cantidadAmbientes').val(inmueble.cantidadAmbientes);
    $('#cantidadBaños').val(inmueble.cantidadBaños);
    $('#cantidadGarages').val(inmueble.cantidadGarages);
    $('#cantidadDormitorios').val(inmueble.cantidadDormitorios);
    $('#superficie').val(inmueble.superficie);
    $('#descripcion').val(inmueble.descripcion);




}



//
//
//
//
//
//
//
//var caracteristicas_seleccionadas = [];
//
//
//function agregar_característica() {
//    $("#combo option:selected").each(function () {
//        var caracteristica = JSON.parse($(this).attr('value'));
//        if (!caracteristicas_seleccionadas.includes(caracteristica.id)) {
//            agregar_a_tabla(caracteristica);
//        } else {
//            $("#boton-modal-elemento-seleccionado").click();
//        }
//        $("#combo").val(null).trigger("change");
//        $("#boton_cerrar_crear").click();
//    });
//}
//
//$(document).on('click', '.borrar', function (event) {
//    event.preventDefault();
//    var caracteristica = $($(this).closest('tr')["0"].lastElementChild).find("input")["0"].value;
//    caracteristicas_seleccionadas.splice(caracteristicas_seleccionadas.indexOf(caracteristica), 1);
//    $(this).closest('tr').remove();
//});
//
//
//function agregar_a_tabla(caracteristica) {
//    var tabla = document.getElementById("tabla_caracteristicas");
//    var row = tabla.insertRow(0);
//    //var cell0 = row.insertCell(0);
//    var cell1 = row.insertCell(0);
//    var cell2 = row.insertCell(1);
//    var cell3 = row.insertCell(2);
//    var cell4 = row.insertCell(3);
//    //cell0.innerHTML = caracteristica.id;
//    cell1.innerHTML = caracteristica.nombre;
//    cell2.innerHTML = caracteristica.descripcion;
//    cell3.innerHTML = '<input type="button" class="borrar" value="Eliminar" />';
//    cell4.innerHTML = '<input type="text" name="caracteristica' + caracteristica.id + '" class="hide" value="' + caracteristica.id + '" />';
//    caracteristicas_seleccionadas.push(caracteristica.id);
//    $('#caracteristicas').val(caracteristicas_seleccionadas);
//    $('#cantidad_caracteristicas').val(caracteristicas_seleccionadas.length);
//}
//
//function cerrar_modal_amarillo() { //jaja
//    $('#boton-cerrar-elemento-seleccionado').click();
//    $('#boton-modal-crear').click();
//}
//
////$(document).ready(function () {
////    $(".content .clearfix").css("background-color", "#fff");
////});
//
///** Google Map **/
////function initMap() {
////    
////    var resistencia = {
////        lat: -27.450834,
////        lng: -58.986901
////    };
////    var map = new google.maps.Map(document.getElementById('map'), {//instancio mapa
////        zoom: 12,
////        center: resistencia,
////        mapTypeId: google.maps.MapTypeId.TERRAIN
////    });
////    var marker = new google.maps.Marker({//instancio marcador
////        map: map,
////        draggable: true,
////        animation: google.maps.Animation.DROP,
////        position: resistencia
////    });
////    marker.addListener('dragend', function () { //este es el evento que detecta las coordenadas al mover el marcador y setea los inputs ocultos en en el form.
////        $("#latitud").val(marker.getPosition().lat());
////        $("#longitud").val(marker.getPosition().lng());
////        console.log($("#latitud").val());
////        console.log($("#longitud").val());
////    });
////    marker.addListener('click', toggleBounce); //evento de animación de marcador al clickear}
////}

//
///** Mostrar el formulario de 'Carga de Propietario' **/
//function mostrarFormPropietario() {
//    if ($("#add-propietario_chk").is(":checked")) {
//        $('#form-agregarPropietario').removeClass("hide");
//        $('#persona_id').prop('disabled', true);
//    } else {
//        $('#form-agregarPropietario').hide();
//        //document.getElementById('add-propietario_chk').checked = true
//        $('#persona_id').prop('disabled', false);
//    }
//}
//$('#tipoOperacion').on('change', function () {
//    if ($('#tipoOperacion').val() == 'Venta') {
//        $('#valorAlquiler').prop('disabled', true);
//    } else {
//        $('#valorAlquiler').prop('disabled', false);
//    }
//});
//
//
//
///**** Cuando se selecciona un pais, desplegar las provincias que le corresponden ****/
//$('select#pais_select').on('change', function () {
//    $('select#provincia_select').empty();
//    $('select#localidad_select').empty();
//    $.ajax({
//        dataType: 'json',
//        url: "/admin/paises", //ruta que contendra el metodo para obtener lo que necesitamos, dentro del contolador
//        data: {
//            id: $('#pais_select').val()
//        },
//        success: function (data) {
//            console.log(data);
//            for (i = 0; i < data.length; i++) {
//                $('select#provincia_select').append("<option value='" + data[i].id + "'> " + data[i].nombre + "</option>");
//            }
//        }
//    });
//    buscarLocalidades();
//});
//$('select#provincia_select').on('change', function () {
//    $('select#localidad_select').empty();
//    buscarLocalidades();
//});
//
//$('select#localidad_select').on('change', function () {
//    $('select#barrio_id').empty();
//    buscarBarrios();
//});
///**** Cuando se selecciona una provincia, desplegar las localidades que le corresponden ****/
//function buscarLocalidades() {
//    $('select#localidad_select').empty();
//    $.ajax({
//        dataType: 'json',
//        url: "/admin/provincias", //ruta que contendra el metodo para obtener lo que necesitamos, dentro del contolador
//        data: {
//            id: $('#provincia_select').val()
//        },
//        success: function (data) {
//            console.log(data);
//            for (i = 0; i < data.length; i++) {
//                $('select#localidad_select').append("<option value='" + data[i].id + "'> " + data[i].nombre + "</option>");
//            }
//        }
//    });
//    buscarBarrios();
//}
///**** Cuando se selecciona una localidad, desplegar los barrios que le corresponden ****/
//function buscarBarrios() {
//    $('select#barrio_id').empty();
//    $.ajax({
//        dataType: 'json',
//        url: "/admin/localidades", //ruta que contendra el metodo para obtener lo que necesitamos, dentro del contolador
//        data: {
//            id: $('#localidad_select').val()
//        },
//        success: function (data) {
//            console.log(data);
//            for (i = 0; i < data.length; i++) {
//                $('select#barrio_id').append("<option value='" + data[i].id + "'> " + data[i].nombre + "</option>");
//            }
//        }
//    });
//}

/**Funcion para cuando se seleccione el edificio se seteen todos los otros campos**/
$('select#edificio_id').on('change', function () {
    $('direccion').empty();
    $('select#provincia_select').empty();
    $('select#localidad_select').empty();
    $.ajax({
        dataType: 'json',
        url: "/admin/edificios", //ruta que contendra el metodo para obtener lo que necesitamos, dentro del contolador
        data: {
            id: $('#edificio_id').val()
        },
        success: function (data) {
            console.log(data);
            $('direccion').val(edificio.direccion);
        }
    });
});


/*****  Mascaras para decimales  ******/
$('#valorVenta').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
$('#valorAlquiler').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
$('#valorReal').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
/***************************************************************************************************************** */
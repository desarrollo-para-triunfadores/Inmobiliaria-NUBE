$("#side-inmueble-li").addClass("active");
$("#side-inmueble-ul").addClass("menu-open");
$("#side-ele-lugares-propiedades").addClass("active");


var etapas_instanciadas = {
    /*
     * Variables la instanciación de los plugins en los distintas secciones del wizard
     */
    propietario: false,
    ubicacion: false,
    fotografias: false
};

function abrir_modal_borrar(id, disponible_eliminar) {
    /*
     * Si el registro no dispone de ningún contrato activo relacionado se puede eliminar
     */
    if (disponible_eliminar === 1) {
        $('#form-borrar').attr('action', '/localidades/' + id);
        $('#boton-modal-borrar').click();
    } else {
        bootbox.dialog({
            title: '¡Atención!',
            message: 'Este registro no puede ser eliminado ya que tiene un contrato vigente asociado.',
            className: 'modal-warning',
            buttons: {
                cancel: {
                    label: 'cerrar',
                    className: 'btn btn-outline pull-right',
                    callback: function () {
                    }
                }
            }
        });
    }
}


//Datatable - instaciación del plugin
var table = $('#example').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    "columns": [//defino propiedades para la columnas, en este caso indico cuales quiero que se inicien ocultas.
        null, //0--Condición
        {"visible": false}, //1--Tipo
        null, //2--Dirección
        {"visible": false}, //3--Cant.Ambientes
        {"visible": false}, //4--Precio venta
        null, //5--Precio alquiler
        {"visible": false}, //6--F.Habilitación
        null, //7--Contrato de alquiler
        null, //8--Fecha de Registro
        null                    //11--Acciones
    ]
});

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
/************************************************************************************************ */

function bloquear_datos_depto() { 
    /*
     * Este método bloquea los inputs que no corresponden si no se escoge un edificio
     */
    var edificio_id = $('#edificio_id').val();

    if (edificio_id === 'sin_edificio') {
        $("#piso").val("");
        $("#numDepto").val("");
        $("#piso").attr("disabled", true);
        $("#numDepto").attr("disabled", true);
        $("#piso").attr("placeholder", "campo no requerido");
        $("#numDepto").attr("placeholder", "campo no requerido");
    } else {
        $("#piso").attr("disabled", false);
        $("#numDepto").attr("disabled", false);
        $("#piso").attr("placeholder", "campo requerido");
        $("#numDepto").attr("placeholder", "campo requerido");
    }
}


$(document).ready(function () {

    instaciar_filtros();

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
                            instanciar_cropie();
                        }
                        break;
                }
            } else {
                switch (index) {
                    case 1:
                        if (!etapas_instanciadas.propietario) {
                            etapas_instanciadas.propietario = true;
                        }
                        break;
                        $('body').removeClass("sidebar-collapse");
                    case 2:
                        if (!etapas_instanciadas.ubicacion) {
                            etapas_instanciadas.ubicacion = true;
                            instanciar_mapa();
                        }
                        $('body').removeClass("sidebar-collapse");
                        break;
                    case 4:
                        if (!etapas_instanciadas.fotografias) {
                            etapas_instanciadas.fotografias = true;
                            instanciar_cropie();
                            $('body').addClass("sidebar-collapse");
                        }
                        break;
                    default :
                        $('body').removeClass("sidebar-collapse");
                }
            }
        },
        onTabClick: function (tab, navigation, index) {
            return false;
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

function mostrar_panel_persona() {
    if ($('#panel_persona_nueva').is(':hidden')) {
        $('#panel_persona_nueva').show()
        $('#propietario_id').removeAttr('required')
        $('#propietario_id').attr('disabled', true)
    } else {
        $('#panel_persona_nueva').hide()
        $('#propietario_id').attr('required', true)
        $('#propietario_id').removeAttr('disabled')
    }
}

//Date picker --instacniición y configuración

//Bootstrap Material Date picker
$('.datepicker').bootstrapMaterialDatePicker({
    format: 'DD/MM/YYYY',
    lang: 'es',
    weekStart: 1,
    switchOnClick: true,
    cancelText: 'cerrar',
    okText: 'ok',
    time: false
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


function filtrar_select(item) {

    /*
     * Esta función se encarga de setear los select de la sección ubicación
     */

    var options_select_elementos = [];
    switch (item) {


        case "provincia_select":

            /**
             * Se solicitan y se cargan los barrios de la localidad
             */
            $.ajax({
                url: '/admin/obtener_localidades_provincia',
                data: {
                    lista_ids: $("#provincia_select").val()
                },
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    options_select_elementos = [];
                    data.forEach(function (element) {
                        options_select_elementos.push('<option value="' + element.id + '">' + element.nombre + '</option>');
                    });
                    $("#localidad_select").html(options_select_elementos);
                }
            });


            /**
             * Se solicitan y se cargan los barrios de la localidad
             */
            $.ajax({
                url: '/admin/obtener_barrios_localidad',
                data: {
                    lista_ids: $("#localidad_select").val()
                },
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    options_select_elementos = [];
                    data.forEach(function (element) {
                        options_select_elementos.push('<option value="' + element.id + '">' + element.nombre + '</option>');
                    });
                    $("#barrio_id").html(options_select_elementos);
                }
            });
            /**
             * Se solicitan y se cargan los edificios de la localidad
             */
            $.ajax({
                url: '/admin/obtener_edificios_localidad',
                data: {
                    lista_ids: $("#localidad_select").val()
                },
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    options_select_elementos = [];
                    data.forEach(function (element) {
                        options_select_elementos.push('<option value="' + element.id + '">' + element.nombre + '</option>');
                    });
                    $("#edificio_id").html(options_select_elementos);

                }
            });

            break;







        case "localidad_select":
            /**
             * Se solicitan y se cargan los barrios de la localidad
             */
            $.ajax({
                url: '/admin/obtener_barrios_localidad',
                data: {
                    lista_ids: $("#localidad_select").val()
                },
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    options_select_elementos = [];
                    data.forEach(function (element) {
                        options_select_elementos.push('<option value="' + element.id + '">' + element.nombre + '</option>');
                    });
                    $("#barrio_id").html(options_select_elementos);
                }
            });
            /**
             * Se solicitan y se cargan los edificios de la localidad
             */
            $.ajax({
                url: '/admin/obtener_edificios_localidad',
                data: {
                    lista_ids: $("#localidad_select").val()
                },
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    options_select_elementos = [];
                    data.forEach(function (element) {
                        options_select_elementos.push('<option value="' + element.id + '">' + element.nombre + '</option>');
                    });
                    $("#edificio_id").html(options_select_elementos);

                }
            });

            break;
        case "barrio_id":
            /**
             * Se solicitan y se cargan los edificios de la localidad
             */

            if ($("#barrio_id").val() === null) {
                /**
                 * si el select de barrio está vacio se resetea el contenido de los select 
                 * desde el select padre ya que corrige los otros select que hayan sido alterados
                 */
                filtrar_select("localidad_select");
            } else {
                $.ajax({
                    url: '/admin/obtener_edificios_barrios',
                    data: {
                        lista_ids: $("#barrio_id").val()
                    },
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        options_select_elementos = [];
                        data.forEach(function (element) {
                            options_select_elementos.push('<option value="' + element.id + '">' + element.nombre + '</option>');
                        });
                        $("#edificio_id").html(options_select_elementos);

                    }
                });
            }
            break;
        case "edificio_id":
            /**
             * Se solicitan y se cargan los inmuebles de la localidad
             */

            if ($("#edificio_id").val() === null) {
                /**
                 * si el select de edificio está vacio se resetea el contenido de los select 
                 * desde el select padre ya que corrige los otros select que hayan sido alterados
                 */
                filtrar_select("barrio_id");
            }
            if ($("#edificio_id").val() === 'sin_edificio') {
                $("#piso").val('');
                $("#numDepto").val('');
                $("#piso").attr("disabled", true);
                $("#numDepto").attr("disabled", true);
                $("#piso").attr("placeholder", "campo no requerido");
                $("#numDepto").attr("placeholder", "campo no requerido");
            }
            else {
                $("#piso").attr("disabled", false);
                $("#numDepto").attr("disabled", false);
                $("#piso").attr("placeholder", "campo requerido");
                $("#numDepto").attr("placeholder", "campo requerido");
                $.ajax({
                    url: '/admin/obtener_inmuebles_edificio',
                    data: {
                        lista_ids: $("#edificio_id").val()
                    },
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        options_select_elementos = [];
                        data.forEach(function (element) {
                            options_select_elementos.push('<option value="' + element.id + '">Direcci\u00f3n: ' + element.direccion + '. Piso: ' + element.piso + '. Departamento: ' + element.numDepto + '</option>');
                        });
                        $("#inmueble_id").html(options_select_elementos);

                    }
                })
            }
            break;
    }
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
///*****  Mascaras para decimales  ******/
//$('#valorVenta').maskMoney({prefix: '', allowNegative: false, thousands: '.', decimal: ',', affixesStay: false});
//$('#valorAlquiler').maskMoney({prefix: '', allowNegative: false, thousands: '.', decimal: ',', affixesStay: false});
//$('#valorReal').maskMoney({prefix: '', allowNegative: false, thousands: '.', decimal: ',', affixesStay: false});
///***************************************************************************************************************** */
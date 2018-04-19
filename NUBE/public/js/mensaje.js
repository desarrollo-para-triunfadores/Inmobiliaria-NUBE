// variables globales
var id_conversacion_activa = "",
    input = "",
    intervalo;


$('#input_busqueda').on('keyup', function (evt) {
    filtrar_conversaciones();
});

function filtrar_conversaciones() {
    /**
     * Esta función controla y aplica el filtra todos los permisos
     * de acuerdo a lo que se está escribiendo en el campo
     */

    $(".li_item").addClass("hide"); //escondemos todos los items 
    var valor_a_filtrar = $("#input_busqueda").val(); //valor del campo
    if (valor_a_filtrar !== "") { // vemos si el campo de búsqueda está vacio o no.   
        $('.li_item').each(function (key, element) { // por cada elemento que está para filtrar vemos que existan coincidencias entre el id de ese elemento y el valor escrito     
            nombre_elemento = element.getAttribute("nombre").toLowerCase();
            id_elemento = element.getAttribute("id");
            posicion = nombre_elemento.indexOf(valor_a_filtrar.toLowerCase())
            if (posicion > -1) {
                $("#" + id_elemento).removeClass("hide");
            }
        });
    } else {
        $(".li_item").removeClass("hide");
    }
}


function obtener_mensajes(id_conversacion) {
    /**
     * Se solicita una vista con los datos de la conversación indicada al servidor.
     */

    var div = "div_chat";

    if (id_conversacion !== undefined) { //si se pasa un id_conversacion quiere decir que se solo se actualiza la lista de mensajes.
        id_conversacion_activa = id_conversacion; //actualizamos el identificar para la conversación activa.
        div = "seccion_conversacion";       
    }

    if (id_conversacion_activa !== "") {
        $.ajax({
            url: "/admin/obtener_mensajes_conversacion",
            data: {
                conversacion_id: id_conversacion_activa,
                div: div
            },
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $("#" + div).html(data);//seteamos el div con la vista

                /**
                 * Este pedacito de código de acá abajo es un disparador que sirve para 
                 * notificar cuando el usuario dejó de escribir un mensaje.
                 */

                input = document.getElementById("mensaje")
                input.addEventListener("keyup", function () {
                    clearInterval(intervalo);
                    intervalo = setInterval(function () {
                        cambiar_bandera_escritura(false);
                        clearInterval(intervalo);
                    }, 2000);
                }, false);
                

            }
        })
    }
}

function enviar_mensaje() {
    /**
     * Se mandan los datos para que el servidor registre el mensaje.
     */

    $.ajax({
        url: '/admin/enviar_mensaje',
        data: {
            conversacion_id: id_conversacion_activa,
            mensaje: $("#mensaje").val()
        },
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $("#div_chat").html(data);
            $("#mensaje").val("");
            $("#mensaje").focus();
        }
    })
}


$('body').keyup(function (e) {
    /**
     * Este evento se encarga de detectar cuando se presiona la tecla enter y ejecuta la función
     * de enviar el mensaje si el campo de para el mensaje no está vacío.
     */

    if (e.keyCode == 13) {
        if ($("#mensaje").val() !== "") {
            enviar_mensaje()
        }
    }
});


function cambiar_bandera_escritura(bandera) {
    /**
     * Este método se encarga de solicitar al controller que cambie el estado de la bandera de 
     * escritura así el otro actor sabe que le están escribiendo.
     */

    if (id_conversacion_activa !== "") {
        $.ajax({
            url: '/admin/cambiar_bandera_escritura',
            data: {
                bandera: bandera,
                conversacion_id: id_conversacion_activa
            },
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        })
    }
}


function actualizar_cabecera() {
    /**
     * Este método se encarga de solicitar al controller que cambie el estado
     * de la bandera de escritura así el otro actor sabe que le están escribiendo.
     */


    if (id_conversacion_activa !== "") {
        $.ajax({
            url: '/admin/obtener_cabecera',
            data: {
                conversacion_id: id_conversacion_activa
            },
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $("#div_cabecera").html(data);
            }
        })
    }
}


function actualizar_listado_conversaciones() {
    /**
     * Solicita al servidor los datos para actualizar la vista que
     * contiene el listado de conversaciones.
     */

    $.ajax({
        url: '/admin/obtener_listado_conversaciones',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $("#seccion_lista_conversaciones").html(data);
            filtrar_conversaciones();
        }
    })
}

/**
 * Actualizadores
 */

setInterval("actualizar_listado_conversaciones();", 5000);
setInterval("obtener_mensajes();", 5000);
setInterval("actualizar_cabecera();", 2000);
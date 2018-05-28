$('#side-agenda-usuarios-li').addClass('active')
$('#side-agenda-usuarios-ul').addClass('menu-open')
$('#side-ele-agenda-usuarios').addClass('active')


/**
 * La variable global 'bandera_borrado' indica cuando se quiere borrar un evento evitando que se abra el modal de visualización 
 */
var bandera_borrado = false;

function completar_campos(visita) {
    /**
     * Este método se encarga de solicitar al servidor todos los datos asociados a la visita
     * y setearlos y mostrar el modal show.
     */

    if (!bandera_borrado) {
        $.ajax({
            dataType: 'json',
            url: '/admin/obtener_datos_visita', // ruta que contendra el metodo para obtener lo que necesitamos, dentro del contolador
            data: {
                id: visita.id
            },
            success: function (data) {
                var datos = JSON.parse(data)
                $('#form-update').attr('action', '/admin/agenda_usuario/' + datos.visita.id);
                $('#show_asunto').html(datos.visita.title);
                $('#show_horario_inicio').html(datos.inicio);
                $('#show_horario_fin').html(datos.fin);
                $('#show_inmueble').html(datos.inmueble);
                $('#observacion').html(datos.visita.observacion);
                $('#show_tecnico').html(datos.tecnico);
                $('#show_solicitante').html(datos.solicitante);
                $('#show_motivo').html(datos.solicitud.motivo);
                $('#show_estado').html(datos.estado);

                if (bandera_usuario_tecnico) {
                    
                    $('#confirmada').prop("disabled", true);
                            
                    if ((datos.visita.confirmada === 1) && (datos.visita.realizada === null)) {                       
                         $('.btn-actualizar').removeClass("hide");  
                         $('#observacion').prop("disabled", false);
                    } else {
                           $('.btn-actualizar').addClass("hide");
                           $('#observacion').prop("disabled", true);
                    }                    

                } else {

                    $('#confirmada').prop("disabled", false);
                    $('#observacion').prop("disabled", true);

                    if (datos.visita.confirmada !== null) {
                        $('.btn-actualizar').addClass("hide");
                    } else {
                        $('.btn-actualizar').removeClass("hide");
                    }
                }

                $('#modal-show').modal('show')
            }
        })
    }

}

function marcar_rechazo() {
    /**
     * Este método cambia el valor del imput y luego submitea el formulario
     */
    $('#confirmada').val('0');
    $('#boton_submit_update').click();
}

function marcar_realizada(valor) {
    /**
     * Este método cambia el valor del imput y luego submitea el formulario
     */
    $('#realizada').prop("disabled", false);
    $('#realizada').val(valor);
    $('#boton_submit_update').click();
}


function actualizar_evento(event, delta, revertFunc) {
    var fecha = moment(event.start);

    event.backgroundColor = "#DA8F1F";
    event.borderColor = "#DA8F1F";

    if (event.realizada !== true) {
        /*
         * Solo permitimos la actualización del evento si la visita no fue realizada
         */


        bootbox.confirm({//Primero solicitamos confirmación para la acción
            title: '¡Atención!',
            message: 'El evento fue reprogramado para culminar el ' + fecha.format("DD/MM/YYYY") + ' a las ' + fecha.format("h:mm") + '. Si está de acuerdo prosiga con la actualización.',
            className: 'modal-warning',
            buttons: {
                confirm: {
                    label: 'actualizar evento',
                    className: 'btn btn-outline'
                },
                cancel: {
                    label: 'cancelar',
                    className: 'btn btn-outline pull-left'
                }
            },
            callback: function (result) {
                if (result) {

                    /**Enviamos los datos al servidor para que las procese */

                    var inicio = event.start.format(),
                            end = null;

                    if (event.end) {
                        end = event.end.format();
                    }

                    $.ajax({
                        url: '/admin/actualizar_visita',
                        data: {
                            id: event.id,
                            start: inicio,
                            end: end
                        },
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            bootbox.dialog({
                                title: 'Actualización exitosa',
                                message: 'Se ha actualizado los datos de la visita. Ahora debe esperar por la confirmación del cliente.',
                                className: 'modal-info',
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
                    });
                } else {
                    revertFunc();
                }
            }
        });
    } else {
        revertFunc();
    }
}


function instanciar_calendar(eventos) {
    $('#calendar').fullCalendar({
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay, listWeek,listDay'
        },
        buttonText: {
            today: 'hoy'
        },
        views: {
            today: {
                buttonText: 'hoy'
            },
            agendaDay: {
                buttonText: 'dia'
            },
            agendaWeek: {
                buttonText: 'semana'
            },
            month: {
                buttonText: 'mes'
            },
            listDay: {
                buttonText: 'listado del dia'
            },
            listWeek: {
                buttonText: 'listado de la semana'
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start) { //evento de click en un espacio vacío en el calendario
            if (bandera_usuario_tecnico) {
                /**
                 * Evento para registrar un evento
                 */
                date = new Date(start)
                d = date.getDate() + 1
                m = date.getMonth() + 1,
                        y = date.getFullYear()
                $('#start').val(d + '/' + m + '/' + y + ' 00:00')
                $('#modal-crear').modal('show')
            }
        },
        editable: bandera_usuario_tecnico,
        eventLimit: bandera_usuario_tecnico,
        events: eventos,
        droppable: bandera_usuario_tecnico,
        eventClick: function (event, element) {
            completar_campos(event)
        },
        eventResize: function (event, delta, revertFunc) {
            if (bandera_usuario_tecnico) {
                actualizar_evento(event, delta, revertFunc)
            }
        },
        eventDrop: function (event, delta, revertFunc) { // este evento es el que me deja 
            if (bandera_usuario_tecnico) {
                actualizar_evento(event, delta, revertFunc)
            }
        },
        eventRender: function (event, element) {
            if (bandera_usuario_tecnico) {
                element.append("<span class='closeon' data-toggle='tooltip' data-placement='bottom' title='eliminar el evento'><i class='fa fa-times' aria-hidden='true'></i></span>")
                element.find('.closeon').click(function () {
                    bandera_borrado = true;
                    bootbox.confirm({
                        title: '¡Alerta de acción permanente!',
                        message: 'Usted está a punto de proceder con la eliminación permanente del registro seleccionado. Si se encuentra completamente seguro prosiga con la acción.',
                        className: 'modal-danger',
                        backdrop: true,
                        buttons: {
                            confirm: {
                                label: 'eliminar evento',
                                className: 'btn btn-outline'
                            },
                            cancel: {
                                label: 'cancelar',
                                className: 'btn btn-outline pull-left'
                            }
                        },
                        callback: function (result) {
                            bandera_borrado = false;
                            if (result) {
                                $.ajax({
                                    url: '/admin/eliminar_visita',
                                    data: {
                                        id: event.id
                                    },
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#calendar').fullCalendar('removeEvents', event._id)
                                    }
                                })
                            }
                        }
                    })
                })
            }
        }
    })
}

$(document).ready(function () {

    /**
     * Solicitamos al servidor los eventos para el calendario
     */

    $.ajax({
        url: '/admin/obtener_visitas_usuarios',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            instanciar_calendar(JSON.parse(data));
        }
    })

    // Bootstrap Material Date picker
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY HH:mm',
        lang: 'es',
        weekStart: 1,
        switchOnClick: true,
        cancelText: 'cerrar',
        okText: 'ok',
        minDate: moment().add(-100, 'year'),
        maxDate: moment().add(100, 'year')
    });

});
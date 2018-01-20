//variable global:
//console.log(VariableJS);

$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-lugares-ul").addClass("menu-open");
$("#side-ele-lugares-li").addClass("active");
$("#side-ele-lugares-paises").addClass("active");


function formatear_fecha(fecha) {
    date = new Date(fecha);
    d = date.getDate(),
            m = date.getMonth() + 1,
            y = date.getFullYear();
    hora = date.getHours() + 3;

    if (date.getMinutes() === 0) {
        minuto = "00";
    } else {
        minuto = date.getMinutes();
    }

    fecha_formateada = d + "/" + m + "/" + y + " " + hora + ":" + minuto;
    return fecha_formateada;
}

/******** Recupera la el detalle de un evento para una visita seleccionada ********/
function completar_campos(visita) {
    $.ajax({
        dataType: 'json',
        url: "/admin/agenda", //ruta que contendra el metodo para obtener lo que necesitamos, dentro del contolador
        data: {
            traer_visita: true,
            id: visita.id
        },
        success: function (data) {
            var datos = JSON.parse(data);
            console.log(datos);
            $('#visita_id').html(datos.visita.id); //para campo invisible del 'show' que guarda el id
            $('#show-visita_id').val(datos.visita.id);
            $('#show-asunto').html(datos.visita.titulo);
            if (datos.inicio === datos.fin) {
                $('#show-inicio').html(formatear_fecha(datos.visita.inicio));
            } else {
                $('#show-inicio').html(formatear_fecha(datos.visita.inicio) + " - " + formatear_fecha(datos.visita.fin));
            }
            $('#show-inmueble').html(datos.inmueble.direccion+ " ("+datos.inmueble.localidad.nombre+")");
            $('#show-interezado').html(datos.oportunidad.nombre_interesado);

            if (datos.oportunidad.email) {
                $('#show-email').html(datos.oportunidad.email);
            } else {
                $('#show-email').html("No fue registrado");
            }
            if (datos.oportunidad.telefono) {
                $('#show-telefono').html(datos.oportunidad.telefono);
            } else {
                $('#show-telefono').html("No fue registrado");
            }

            if(datos.visita.asistio == 1){
                $('#formulario-asistio').hide();        //se oculta el switch de asistio o no
                $('#btn-actualizar').hide();            //se oculta el boton de actualizar ☻
            }
            $('#show-mensaje').html('"'+datos.oportunidad.mensaje+'"');
            $('#modal-show').modal('show');
        }
    });

}
/****************************************************************************** */


/************ Actualizar visita (visitado / no visitado) ***********************/
function actualizarAsistencia(id){
    //alert($('input:checkbox[id=show-asistio]:checked').val());
    var asistio;
    if ($('input:checkbox[id=show-asistio]:checked').val()) {
        asistio = 1;
    }
    else{
        asistio = 0;
    }
    $.ajax({
        dataType: 'json', url: "/admin/actualizar_visita",
        data: {
            editar_visita_desde_show: true,
            visita_id: id,
            asistio: asistio,
        },
        success: function (data) {
            console.log(data);
            window.location.reload();
        }
    });
}
/***--------------------------------------------------------------------*********/

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/agenda/' + id);
    $('#boton-modal-borrar').click();
}
var con = console.log("dedo");
var con2 = "console.log(dedo2)";
var date = new Date();
var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
hora = date.getHours();
minuto = date.getMinutes();
var fecha_formateada;

function actualizar_evento(event, delta, revertFunc) {
    date = new Date(event.end);
    d = date.getDate(),
            m = date.getMonth() + 1,
            y = date.getFullYear();
    hora = date.getHours() + 3;

    if (date.getMinutes() === 0) {
        minuto = "00";
    } else {
        minuto = date.getMinutes();
    }

    fecha_formateada = d + "/" + m + "/" + y;
    hora_formateada = hora + ":" + minuto;
    bootbox.confirm({
        title: "¡Atención!",
        message: "El evento fue reprogramado para culminar el " + fecha_formateada + " a las " + hora_formateada + ". Si está de acuerdo prosiga con la actualización.",
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
                $.ajax({
                    url: "/admin/actualizar_visita",
                    data: {
                        id: event.id,
                        inicio: event.start.format(),
                        fin: event.end.format()
                    },
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    }
                });
            } else {
                revertFunc();
            }
        }
    });
}






$(document).ready(function () {


    /************************************************************************************************************** */
    /* initialize the calendar
     -----------------------------------------------------------------*/
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
            today: {buttonText: 'hoy'},
            agendaDay: {buttonText: 'dia'},
            agendaWeek: {buttonText: 'semana'},
            month: {buttonText: 'mes'},
            listDay: {buttonText: 'listado del dia'},
            listWeek: {buttonText: 'listado de la semana'}
        },
        selectable: true,
        selectHelper: true,
        //745213270288-ghc3q1o9tluopveuqk12um7o0rqgfen1.apps.googleusercontent.com
        select: function (start) {
            date = new Date(start);
            d = date.getDate() + 1;
            m = date.getMonth() + 1,
                    y = date.getFullYear();
            $('#create-inicio').val(d + "/" + m + "/" + y + " 00:00");
            $('#modal-crear').modal('show');

        },
        editable: true,
        eventLimit: true,
        //googleCalendarApiKey: 'AIzaSyCgtNNT3a8lvHSn0wTQ1NsB-StLbByvLRA',
        events: {url: "cargaEventos"},
        /*events: {
         googleCalendarId: '745213270288-ghc3q1o9tluopveuqk12um7o0rqgfen1.apps.googleusercontent.com',
         className: 'gcal-event'
         },*/

        droppable: true, // this allows things to be dropped onto the calendar !!!
        eventClick: function (event, element) {
            completar_campos(event);
        },
        eventResize: function (event, delta, revertFunc) {
            actualizar_evento(event, delta, revertFunc);
        },
        eventDrop: function (event, delta, revertFunc) { //este evento es el que me deja 
            actualizar_evento(event, delta, revertFunc);
        },
        eventRender: function (event, element) {
            element.append("<span class='closeon'>X</span>");
            element.find(".closeon").click(function () {
                bootbox.confirm({
                    title: "¡Alerta de acción permanente!",
                    message: "Usted está a punto de proceder con la eliminación permanente del registro seleccionado. Si se encuentra completamente seguro prosiga con la acción.",
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
                        if (result) {

                            $.ajax({
                                url: "/admin/eliminar_visita",
                                data: {
                                    id: event.id
                                },
                                type: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    $('#calendar').fullCalendar('removeEvents', event._id);
                                    console.log(data);
                                }
                            });
                        }
                    }
                });
            });
        },
        drop: function (date, allDay) { // esta funcion se llama cuando algo es dropeado
            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");
            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
//            if ($('#drop-remove').is(':checked')) {
//                // if so, remove the element from the "Draggable Events" list
//                $(this).remove();
//            }
        }
    });
    /* ADDING EVENTS */
    var currColor = "blue"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
        e.preventDefault();
        //Save color
        currColor = $(this).css("color");
        //Add color effect to button
        $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
        e.preventDefault();
        //Get value and make sure it is not null
        var val = $("#new-event").val();
        if (val.length == 0) {
            return;
        }

        //Create events
        var event = $("<div />");
        event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
        event.html(val);
        $('#external-events').prepend(event);
        //Add draggable funtionality
        ini_events(event);
        //Remove event from text input
        $("#new-event").val("");
    });

    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY HH:mm'
    });

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, singleDatePicker: true, timePickerIncrement: 1, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
    function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });


    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });


});


/**Sugerir nombre de Asunto al seleccionar Oportunidad **/
$('select#oportunidad_id').on('change',function () {
    //$('#titulo').empty();
    $.ajax({
        dataType: 'json',
        url: "/admin/oportunidades", //ruta que contendra el metodo para obtener lo que necesitamos, dentro del contolador
        data: {
            traer_data_oportunidad: true,
            oportunidad_id: $('select#oportunidad_id').val(),
        },
        success: function (data) {
            var oportunidad = JSON.parse(data);
            console.log(oportunidad);
            $('#titulo').val("Visita de oportunidad de "+ oportunidad.nombre_interesado);
        }
    });

});
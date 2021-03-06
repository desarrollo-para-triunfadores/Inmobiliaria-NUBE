$("#side-liquidaciones-li").addClass("active");
$("#side-liquidaciones-ul").addClass("menu-open");
$("#side-ele-generar-liquidacion").addClass("active");



var table = $('#example').DataTable({
    'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.
});

table.on('draw', function () { // con esto reinstanciamos el plugin
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY',
        lang: 'es',
        weekStart: 1,
        switchOnClick: true,
        cancelText: 'cerrar',
        okText: 'ok',
        minDate: moment().add(-100, 'year'),
        maxDate: moment().add(100, 'year'),
        time: false
    });
});

/*
 * Instanciamos el plugin del calendario
 */

$('.datepicker').bootstrapMaterialDatePicker({
    format: 'DD/MM/YYYY',
    lang: 'es',
    weekStart: 1,
    switchOnClick: true,
    cancelText: 'cerrar',
    okText: 'ok',
    minDate: moment().add(-100, 'year'),
    maxDate: moment().add(100, 'year'),
    time: false
});




var lineas = []

function carga_lineas(id, vencimiento) {
    // este proceso se encarga de registrar y actualizar cada vez que el usuario escribe un dato nuevo en la tabla de carga de impuestos
    if (lineas[id] === undefined) {
        lineas[id] = {
            id_liquidacion: id,
            vencimiento: vencimiento
        }
    } else {
        lineas[id]['vencimiento'] = vencimiento
    }
    console.log(lineas);
}

function enviar() {
    if (lineas.length > 0) {
        /**
         * Avisamos del procesamiento
         */
        var dialog = bootbox.dialog({
            message: '<p class="text-center"><b>Procesando la liquidaci\u00f3n. Espere por favor...</b></p>',
            closeButton: false
        });

        var conceptos = []
        lineas.forEach(function (valor) { // se convierte el array en una coleccion de objetos
            conceptos.push(valor)
        })
        $.ajax({// se envía
            url: '/admin/liquidaciones/create',
            data: {
                lista_conceptos: conceptos
            },
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                dialog.modal('hide');// escondemos el mensaje de procesamiento

                bootbox.dialog({
                    title: 'Registración exitosa',
                    message: 'Se ha registrado con éxito las liquidaciones pendientes.',
                    className: 'modal-success',
                    buttons: {
                        cancel: {
                            label: 'cerrar',
                            className: 'btn btn-outline pull-right',
                            callback: function () {
                                window.location.href = '/admin/liquidaciones'
                            }
                        }
                    }
                });
            }
        })
    } else {
        bootbox.dialog({
            title: 'Atención',
            message: 'No ha cargado fecha de vencimiento a ninguna liquidación.',
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
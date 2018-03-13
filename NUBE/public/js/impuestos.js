var table = $('#example').DataTable({
    'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.
})

var lineas = []
var fecha_desde, fecha_hasta, periodo_actual

function filtrar_contratos () {
    lineas = []
    $.ajax({
        url: '/admin/conceptosliquidaciones',
        data: {
            accion: pantalla,
            servicios: $('#servicios_ids').val(),
            lodalidades: $('#localidades_ids').val(),
            desde: $('#fecha_desde').val(),
            hasta: $('#fecha_hasta').val(),
            estado: $('#estado').val(),
            barrios: $('#barrios_ids').val(),
            edificios: $('#edificios_ids').val(),
            inmuebles: $('#inmueble_id').val()
        },
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#tabla_impuestos').html(data)
            instanciar_elementos() // se instancian nuevamente la tabla y las máscaras para las fechas
        }
    })
}

function instanciar_elementos () {
    var table = $('#example').DataTable({
        'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.
    })

    //Bootstrap Material Date picker
    $('.mascara_vencimiento').bootstrapMaterialDatePicker ({
        format: 'DD/MM/YYYY',
        lang: 'es',
        weekStart: 1, 			
        switchOnClick : true,
        cancelText: 'cerrar',
        okText: 'ok',
        minDate : moment().add(-100, 'year'),
        maxDate : moment().add(100, 'year'),
        time: false 
    });

    // Datemask2 mm/dd/yyyy
    $('.mascara_periodo').inputmask('mm/yyyy', {
        'placeholder': 'mm/yyyy'
    })
}

function cargar_monto_sugerido(id, monto){//este método se usa en los casos en que el concepto es un concepto compartido está sugerido a modo de placerholder entonces al dar un click en ese campor el mismo se complete con el monto sugerido
    if(($('#monto' + id).val() === '')){
        $('#monto' + id).val(monto);
        carga_lineas(id);
    }       
}

function carga_lineas (id) { // este proceso se encarga de registrar y actualizar cada vez que el usuario escribe un dato nuevo en la tabla de carga de impuestos

    monto = parseFloat($('#monto' + id).val())
    periodo = $('#periodo' + id).val()
    venc1 = $('#venc1' + id).val()
    venc2 = $('#venc2' + id).val()
    estado_abono = $('#estado' + id).val()

    if ($('#monto' + id).val() !== '') {
        if ( (id, monto)) {
            lineas[id] = {
                serviciocontrato_id: id,
                periodo: periodo,
                monto: monto,
                primer_vencimiento: venc1,
                segundo_vencimiento: venc2,
                servicio_abonado: estado_abono
            }
        }
    }else{
        lineas.splice(id, 1);
    }
    console.log(lineas);
}

function enviar () {
    if(lineas.length>0){
        var conceptos = []
        lineas.forEach(function (valor) { // se convierte el array en una coleccion de objetos
            conceptos.push(valor)
        })

        $.ajax({ // se envía
            url: '/admin/conceptosliquidaciones/create',
            data: {
                lista_conceptos: conceptos
            },
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
               bootbox.dialog({
                    title: 'Registración exitosa',
                    message: 'Se ha registrado con éxito los impuestos y servicios ingresados.',
                    className: 'modal-success',
                    buttons: {
                        cancel: {
                            label: 'cerrar',
                            className: 'btn btn-outline pull-right',
                            callback: function () {
                                window.location.href = '/admin/conceptosliquidaciones'
                            }
                        }
                    }
                })
            }
        })
    }else{
        bootbox.dialog({
            title: 'Atención',
            message: 'No ha cargado monto para ninguno de los conceptos.',
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

// Date picker --instaciación y configuración

// Date picker para la fecha de finalización
$('.datepicker_hasta').datepicker({
    autoclose: true,
    startView: 2,
    todayHighlight: true,
    orientation: 'bottom auto',
    format: 'dd/mm/yyyy',
    language: 'es'
})

// Date picker para la fecha de inicio de contrato
$('.datepicker_desde').datepicker({
    autoclose: true,
    startView: 1,
    todayHighlight: true,
    orientation: 'bottom auto',
    format: 'dd/mm/yyyy',
    language: 'es'
})

$('#fecha_desde').change(function () { // control de verificacion de fechas
    var fecha_formateada = new Date($('#fecha_desde').val().split('/').reverse().join('-'))
    fecha_desde = moment(fecha_formateada)
    if (fecha_hasta !== '') {
        if (fecha_desde > fecha_hasta) {
            fecha_hasta = ''
            msg_informar_fechas() // mensaje de exepcion
            $('#fecha_hasta').val('')
            $('#fecha_hasta').focus()
        }
    }
})

$('#fecha_hasta').change(function () { // control de verificacion de fechas
    var fecha_formateada = new Date($('#fecha_hasta').val().split('/').reverse().join('-'))
    fecha_hasta = moment(fecha_formateada)

    if (fecha_desde !== '') {
        if (fecha_desde > fecha_hasta) {
            fecha_desde = ''
            msg_informar_fechas() // mensaje de exepcion
            $('#fecha_desde').val('')
            $('#fecha_desde').focus()
        }
    }
})

function msg_informar_fechas () {
    bootbox.dialog({
        title: '¡Atención!',
        message: 'La fecha de inicio de contrato debe ser menor a la fecha de finalización del mismo.',
        className: 'modal-warning',
        buttons: {
            cancel: {
                label: 'volver',
                className: 'btn btn-outline pull-right'
            }
        }
    })
}

function control_monto (id, valor_dato) {
    var valor_valido = false
    valor = parseFloat(valor_dato)
    if (valor > 0) {
        valor_valido = true
    } else {
        bootbox.dialog({
            title: '¡Atención!',
            message: 'El monto no puede ser menor a 1 (uno).',
            className: 'modal-warning',
            buttons: {
                cancel: {
                    label: 'volver',
                    className: 'btn btn-outline pull-right'
                }
            }
        })
        $('#monto' + id).val('')
        lineas.splice(lineas.indexOf(lineas[id]), 1)
    }
    return valor_valido
}
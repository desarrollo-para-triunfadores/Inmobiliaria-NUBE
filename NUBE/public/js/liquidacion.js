$("#side-liquidaciones-li").addClass("active");
$("#side-liquidaciones-ul").addClass("menu-open");
$("#side-ele-generar-liquidacion").addClass("active");


var table = $('#example').DataTable({
    'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.
})

// Datemask dd/mm/yyyy
$('.mascara_vencimiento').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
})


var lineas = []

function carga_lineas (liquidacion, vencimiento) {
    // este proceso se encarga de registrar y actualizar cada vez que el usuario escribe un dato nuevo en la tabla de carga de impuestos
    if (lineas[liquidacion.id_liquidacion] === undefined) {
        lineas[liquidacion.id_liquidacion] = {
            gastos_administrativos: liquidacion.gastos_administrativos,
            periodo: liquidacion.periodo,
            conceptos: JSON.parse(liquidacion.conceptos),
            id_liquidacion: liquidacion.id_liquidacion,
            expensas: liquidacion.expensas,
            monto_expensas: liquidacion.monto_expensas,
            monto_alquiler: liquidacion.monto_alquiler,
            total: liquidacion.total,
            subtotal: liquidacion.subtotal,
            vencimiento: vencimiento
        }
    }else {
        lineas[liquidacion.id_liquidacion]['vencimiento'] = vencimiento
    }
}

function enviar () {
    //Aca voy a meter un validador de fecha de vencimiento (vencimiento no nulo y mayor que periodo de emision)

    //
    var conceptos = []
    lineas.forEach(function (valor) { // se convierte el array en una coleccion de objetos
        conceptos.push(valor)
    })
    $.ajax({ // se envía
        url: '/admin/liquidaciones/create',
        data: {
            lista_conceptos: conceptos
        },
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            bootbox.dialog({
                title: 'Registración exitosa',
                message: 'Se ha registrado con éxito las liquidaciones pendientes.',
                className: 'modal-success',
                buttons: {
                    cancel: {
                        label: 'cerrar',
                        className: 'btn btn-outline pull-right',
                        callback: function () {
                            window.location.href = '/admin/liquidaciones/create'
                        }
                    }
                }
            });
        }
    })
}
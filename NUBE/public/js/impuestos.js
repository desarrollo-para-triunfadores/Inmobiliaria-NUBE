var lineas = [],
    fecha_desde, fecha_hasta

/**
 * En la variable lineas se van guardando los servicios que se cargan como pagados. 
 * Acordarse que en ella solo se guardan las que se les carga un monto válido.
 */

function instanciar_elementos() {

    var table = $('#example').DataTable({
        'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.
    })

    //Bootstrap Material Date picker
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

}

function cargar_monto_sugerido(id, monto) {

    /**
     * Este método se usa en los casos en que el concepto es un concepto compartido y en el contrato se 
     * especifica que se está sujeto a gastos compartidosestá sugerido a modo de placerholder entonces
     * al dar un click en ese campor el mismo se complete con el monto sugerido
     */

    //
    if (($('#monto' + id).val() === '')) {
        $('#monto' + id).val(monto);
        carga_lineas(id);
    }
}

function filtrar_contratos() {
    /**
     * Este método solicita al controller que se envíe todos los "servicios de contratos"
     * coicidentes con los parámetros indicados y que estén disponibles para cargar como pagados.
     */

    lineas = []
    $.ajax({
        url: '/admin/obtener_conceptos',
        data: {
            accion: pantalla,
            servicios: $('#servicio_id').val(),
            lodalidades: $('#localidad_id').val(),
            desde: $('#fecha_desde').val(),
            hasta: $('#fecha_hasta').val(),
            barrios: $('#barrio_id').val(),
            edificios: $('#edificio_id').val(),
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

function filtrar_select(item) {
    var options_select_elementos = [];
    switch (item) {
        case "localidad_id":
            /**
             * Se solicitan y se cargan los barrios de la localidad
             */
            $.ajax({ 
                url: '/admin/obtener_barrios_localidad',
                data: {
                    lista_ids: $("#localidad_id").val()
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
            })
            /**
             * Se solicitan y se cargan los edificios de la localidad
             */
            $.ajax({ 
                url: '/admin/obtener_edificios_localidad',
                data: {
                    lista_ids: $("#localidad_id").val()
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
            })
            /**
             * Se solicitan y se cargan los inmuebles de la localidad
             */
            $.ajax({ 
                url: '/admin/obtener_inmuebles_localidad',
                data: {
                    lista_ids: $("#localidad_id").val()
                },
                type: 'GET',
                dataType: 'json',
                success: function (data) {                    
                    options_select_elementos = [];
                    data.forEach(function (element) {
                        options_select_elementos.push('<option value="' + element.id + '">Direcci\u00f3n: ' + element.direccion + '. Piso: '+element.piso+'. Departamento: '+element.numDepto+'</option>');
                    });   
                    $("#inmueble_id").html(options_select_elementos);        
                             
                }
            })           
            break;
        case "barrio_id":
            /**
             * Se solicitan y se cargan los edificios de la localidad
             */

            if($("#barrio_id").val()===null){
                /**
                 * si el select de barrio está vacio se resetea el contenido de los select 
                 * desde el select padre ya que corrige los otros select que hayan sido alterados
                 */
                filtrar_select("localidad_id");
            }else{
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
                })
                /**
                 * Se solicitan y se cargan los inmuebles de la localidad
                 */
                $.ajax({ 
                    url: '/admin/obtener_inmuebles_barrios',
                    data: {
                        lista_ids: $("#barrio_id").val()
                    },
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        options_select_elementos = [];
                        data.forEach(function (element) {
                            options_select_elementos.push('<option value="' + element.id + '">Direcci\u00f3n: ' + element.direccion + '. Piso: '+element.piso+'. Departamento: '+element.numDepto+'</option>');
                        });   
                        $("#inmueble_id").html(options_select_elementos);        
                                 
                    }
                })     
            }     
            break;
        case "edificio_id":
            /**
             * Se solicitan y se cargan los inmuebles de la localidad
             */

            if($("#edificio_id").val()===null){
                /**
                 * si el select de edificio está vacio se resetea el contenido de los select 
                 * desde el select padre ya que corrige los otros select que hayan sido alterados
                 */
                filtrar_select("barrio_id");
            }else{
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
                            options_select_elementos.push('<option value="' + element.id + '">Direcci\u00f3n: ' + element.direccion + '. Piso: '+element.piso+'. Departamento: '+element.numDepto+'</option>');
                        });   
                        $("#inmueble_id").html(options_select_elementos);        
                                
                    }
                }) 
            } 
            break;       
    }
}




function carga_lineas(id) {

    /**
     * Este proceso se encarga de registrar y actualizar cada vez que el usuario escribe un dato nuevo 
     * en la tabla de carga de impuestos. Solo se registran y mantienen los servicios que cuenten con un monto válido cargado
     */

    monto = parseFloat($('#monto' + id).val())
    periodo = $('#periodo' + id).val()
    venc1 = $('#venc1' + id).val()
    venc2 = $('#venc2' + id).val()
    estado_abono = $('#estado' + id).val()

    if ($('#monto' + id).val() !== '') {
        if ((id, monto)) {
            lineas[id] = {
                serviciocontrato_id: id,
                periodo: periodo,
                monto: monto,
                primer_vencimiento: venc1,
                segundo_vencimiento: venc2,
                servicio_abonado: estado_abono
            }
        }
    } else {
        lineas.splice(id, 1);
    }
}

function enviar() { //se envían los datos al controller para que lo registre

    if (lineas.length > 0) { // si la lista está vacía se informa al usuario al respecto
        var conceptos = []
        
        lineas.forEach(function (valor) { // se convierte el array en una coleccion de objetos
            conceptos.push(valor)
        })

        $.ajax({ // se envía
            url: '/admin/registrar_conceptos',
            data: {
                lista_conceptos: conceptos
            },
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                window.location.href = '/admin/conceptosliquidaciones'
            }
        })
    } else {
        bootbox.dialog({
            title: 'Atención',
            message: 'No ha cargado monto para ninguno de los conceptos.',
            className: 'modal-warning',
            buttons: {
                cancel: {
                    label: 'cerrar',
                    className: 'btn btn-outline pull-right',
                    callback: function () {}
                }
            }
        });
    }
}


/**
 * Inicio de métodos y eventos sobre las fechas
 */

$('.datepicker').bootstrapMaterialDatePicker({
    format: 'DD/MM/YYYY',
    lang: 'es',
    weekStart: 1,
    switchOnClick: true,
    cancelText: 'cerrar',
    okText: 'ok',
    minDate: moment().add(-100, 'year'),
    time: false
});


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

function msg_informar_fechas() {
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
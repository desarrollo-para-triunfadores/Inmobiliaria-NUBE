var table = $('#example').DataTable({
  'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.
})

var conceptos = [],
  contrato = '',
  total = '',
  subtotal = '',
  alquiler = '',
  valor_servicios = '',
  valor_expensas = '',
  mes_alquiler = ''

var datos_calculo_renta = {
  tipo_renta: '',
  fecha_desde: '',
  fecha_hasta: '',
  valor_alquiler: '',
  meses_de_alquiler: '',
  periodo_incremento: '',
  tasa: '',
  meses: []
}

function filtrar_contratos () {
  console.log('ENTRE')
  $.ajax({
    url: '/admin/liquidaciones',
    data: {
      lodalidades: $('#localidades_ids').val(),
      desde: $('#fecha_desde').val(),
      hasta: $('#fecha_hasta').val(),
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

// Datemask dd/mm/yyyy
$('.mascara_vencimiento').inputmask('dd/mm/yyyy', {
  'placeholder': 'dd/mm/yyyy'
})

function instanciar_elementos () {
  var table = $('#example').DataTable({
    'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.
  })
  // Datemask dd/mm/yyyy
  $('.mascara_vencimiento').inputmask('dd/mm/yyyy', {
    'placeholder': 'dd/mm/yyyy'
  })
  // Datemask2 mm/dd/yyyy
  $('.mascara_periodo').inputmask('mm/yyyy', {
    'placeholder': 'mm/yyyy'
  })
}

function agregar_conceptos (id, monto) { // este proceso se encarga de registrar y actualizar cada vez que el usuario escribe un dato nuevo en la tabla de carga de impuestos
  if (conceptos.includes(id)) {
    conceptos.push(id)
  // subtotal
  //  total
  } else {
    conceptos.splice(conceptos.indexOf(id), 1)
  }
}

function buscar_conceptos () {
  contrato = JSON.parse($('#contrato_id').val()) // convertimos el objeto json del select a objeto javascript
  datos_calculo_renta.tipo_renta = contrato.tipo_renta
  datos_calculo_renta.valor_alquiler = parseFloat(contrato.monto_basico)
  datos_calculo_renta.periodo_incremento = contrato.periodos
  datos_calculo_renta.tasa = contrato.incremento
  $.ajax({ // se envía
    url: '/admin/liquidaciones/create',
    data: {
      id_contrato: contrato.id
    },
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      $('#tabla_impuestos').html(data)
      instanciar_elementos()
      $('#vigencia_desde').html(contrato.fecha_desde)
      var fecha_formateada = new Date(contrato.fecha_desde.split('/').reverse().join('-'))
      datos_calculo_renta.fecha_desde = moment(fecha_formateada)
      $('#vigencia_hasta').html(contrato.fecha_hasta)
      var fecha_formateada = new Date(contrato.fecha_hasta.split('/').reverse().join('-'))
      datos_calculo_renta.fecha_hasta = moment(fecha_formateada)
      calcular_meses_renta()
    }
  })
}

function calcular_meses_renta () {
  var ahora = moment()
  datos_calculo_renta.meses_de_alquiler = datos_calculo_renta.fecha_hasta.diff(datos_calculo_renta.fecha_desde, 'month')
  mes_alquiler = ahora.diff(datos_calculo_renta.fecha_desde, 'month') + 1
  $('#mes_alquiler').html(mes_alquiler + '/' + datos_calculo_renta.meses_de_alquiler)
  calcular_renta()
}

function calcular_renta () {
  datos_calculo_renta.meses = []
  var cantidad_incrementos = parseInt(datos_calculo_renta.meses_de_alquiler / datos_calculo_renta.periodo_incremento),
    resto = datos_calculo_renta.meses_de_alquiler % datos_calculo_renta.periodo_incremento,
    valor_tasa = 0,
    valor_actualizado = datos_calculo_renta.valor_alquiler,
    num_mes = 1,
    sumatoria = 0

  for (var n = 1; n <= cantidad_incrementos; n++) {
    datos_calculo_renta.valor_alquiler = valor_actualizado
    if (n > 1) {
      valor_tasa = (datos_calculo_renta.valor_alquiler * datos_calculo_renta.tasa) / 100
    }

    for (var i = 0; i < datos_calculo_renta.periodo_incremento; i++) {
      var mes = {
        numero: num_mes++,
        tasa_fija: 0,
        tasa_creciente: datos_calculo_renta.valor_alquiler + valor_tasa
      }
      valor_actualizado = mes.tasa_creciente
      datos_calculo_renta.meses.push(mes)
      sumatoria = sumatoria + valor_actualizado
    }
  }

  if (resto > 0) {
    nuevo_indice = datos_calculo_renta.meses_de_alquiler - (datos_calculo_renta.periodo_incremento * cantidad_incrementos)
    datos_calculo_renta.valor_alquiler = valor_actualizado
    valor_tasa = (datos_calculo_renta.valor_alquiler * datos_calculo_renta.tasa) / 100
    for (var i = 0; i < nuevo_indice; i++) {
      var mes = {
        numero: num_mes++,
        tasa_fija: 0,
        tasa_creciente: datos_calculo_renta.valor_alquiler + valor_tasa
      }
      valor_actualizado = mes.tasa_creciente
      datos_calculo_renta.meses.push(mes)
      sumatoria = sumatoria + valor_actualizado
    }
  }
  var tasa_fija = parseFloat(sumatoria) / datos_calculo_renta.meses_de_alquiler

  datos_calculo_renta.meses.forEach(function (item) {
    item.tasa_fija = tasa_fija.toFixed(2)
    item.tasa_creciente = parseFloat(item.tasa_creciente).toFixed(2)
  })

  if (datos_calculo_renta.tipo_renta === 'fija') {
    alquiler = datos_calculo_renta.meses[mes_alquiler].tasa_fija
  } else {
    alquiler = datos_calculo_renta.meses[mes_alquiler].tasa_creciente
  }

  $('#valor_cuota').html(alquiler)
  // //ACAC TENGO QUE VER EL TEMA DE CAPTURAR EL TOTAL Y COLOCAR
  valor_servicios = $('#valor_servicios').attr('valor')()
  valor_expensas = $('#valor_expensas').attr('valor')

  total = alquiler + valor_servicios + valor_expensas
  subtotal = alquiler + valor_servicios + valor_expensas

  $('#valor_cuota').html(alquiler)
  $('#subtotal').html(subtotal)
  $('#total').html(total)
}

function enviar () {
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
              //mandar_datos_para_boleta(conceptos)

              window.location.href = '/admin/liquidaciones/create'
            }
          }
        }
      });

    
    }
  })
}

function mandar_datos_para_boleta (conceptos) {
  /*
    ESTE SE UN EJEMPLO DE LA ESTRUCTURA DEL OBJETO:
      conceptos = [
        { conceptos: [{'concepto': 'gas', 'monto': '100'}, {'concepto': 'luz', 'monto': '250'}],
          id_liquidacion: '1',
          monto_alquiler: '5000',
          total: '6500',
          subtotal: '6500',
          vencimiento: '15/11/2017'
      },
        { conceptos: [{'concepto': 'gas', 'monto': '150'}, {'concepto': 'luz', 'monto': '200'}],
          id_liquidacion: '2',
          monto_alquiler: '2000',
          total: '3500',
          subtotal: '3500',
          vencimiento: '15/11/2017'
      }
    
    ]
  */

  $.ajax({ // se envía
    url: '/admin/-----/------', // ACÁ METÉ LA URL PARA EL MÉTODO DEL CONTROLLER DONDE HAGA EL ENVÍO
    data: {
      lista_conceptos: conceptos
    },
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      bootbox.dialog({
        title: 'Registración exitosa',
        message: 'El registro de las liquidaciones fue realizado exitosamente.',
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

// Date picker
$('.datepicker').datepicker({
  autoclose: true,
  startDate: '-80y',
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

var lineas = []

function carga_lineas (id_liquidacion, expensas, monto_expensas, monto_alquiler, total, subtotal, vencimiento, conceptos) {
  // este proceso se encarga de registrar y actualizar cada vez que el usuario escribe un dato nuevo en la tabla de carga de impuestos
  if (lineas[id_liquidacion] === undefined) {
    lineas[id_liquidacion] = {
      conceptos: conceptos,
      id_liquidacion: id_liquidacion,
      expensas: expensas,
      monto_expensas: monto_expensas,
      monto_alquiler: monto_alquiler,
      total: total,
      subtotal: subtotal,
      vencimiento: vencimiento
    }
  }else {
    lineas[id_liquidacion]['vencimiento'] = vencimiento
  }
}

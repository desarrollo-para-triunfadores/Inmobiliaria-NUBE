$('#side-contratos').addClass('active')
$('#side-contratos-ul').addClass('menu-open')
$('#side-ele-contratos').addClass('active')

/***************** Edit Contrato *************/
function completar_campos(contrato) {
    $('#nombre').val(contrato.nombre);
    $('#direccion').val(contrato.direccion);


    $('#form-update').attr('action', '/admin/contratos/' + contrato.id);
    $('#boton-modal-update').click();
}
/************** Fin Edit Contrato ***********/



var datos_calculo_renta = {
  fecha_desde: '',
  fecha_hasta: '',
  valor_alquiler: '',
  valor_inmuelble: '',
  meses_de_alquiler: '',
  periodo_incremento: '',
  tasa: '',
  meses: []
}

var periodos_pagos = []

var etapas_instanciadas = {
  inquilino: false,
  garante: false
}

var fotos = {
  garante_nuevo: '',
  inquilino_nuevo: ''
}

// Datatable - instaciación del plugin
var table = $('#example').DataTable({
  'language': tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

})

instaciar_filtros()
function instaciar_filtros () {
  // Datatables | filtro individuales - instanciación de los filtros
  $('#example tfoot th').each(function () {
    var title = $(this).text()
    if (title !== '') {
      if (title !== 'Acciones') { // ignoramos la columna de los botones
        $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
      }
    }
  })

  // Datatables | filtro individuales - búsqueda
  table.columns().every(function () {
    var that = this
    $('input', this.footer()).on('keyup change', function () {
      if (that.search() !== this.value) {
        that.search(this.value).draw()
      }
    })
  })
}

$(document).ready(function () {
  jQuery.extend(jQuery.validator.messages, {
    required: 'Este campo es obligatorio.',
    remote: 'Por favor, rellena este campo.',
    email: 'Por favor, escribe una dirección de correo válida',
    url: 'Por favor, escribe una URL válida.',
    date: 'Por favor, escribe una fecha válida.',
    dateISO: 'Por favor, escribe una fecha (ISO) válida.',
    number: 'Por favor, escribe un número entero válido.',
    digits: 'Por favor, escribe sólo dígitos.',
    creditcard: 'Por favor, escribe un número de tarjeta válido.',
    equalTo: 'Por favor, escribe el mismo valor de nuevo.',
    accept: 'Por favor, escribe un valor con una extensión aceptada.',
    maxlength: jQuery.validator.format('Por favor, no escribas más de {0} caracteres.'),
    minlength: jQuery.validator.format('Por favor, no escribas menos de {0} caracteres.'),
    rangelength: jQuery.validator.format('Por favor, escribe un valor entre {0} y {1} caracteres.'),
    range: jQuery.validator.format('Por favor, escribe un valor entre {0} y {1}.'),
    max: jQuery.validator.format('Por favor, escribe un valor menor o igual a {0}.'),
    min: jQuery.validator.format('Por favor, escribe un valor mayor o igual a {0}.')
  })

  var $validator = $('#form-create').validate({
    highlight: function (element) {
      $(element).closest('.form-group').addClass('has-error')
    },
    unhighlight: function (element) {
      $(element).closest('.form-group').removeClass('has-error')
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
      if (element.parent('.input-group').length) {
        error.insertAfter(element.parent())
      } else {
        error.insertAfter(element)
      }
    }
  })

  // Instancio el Wizard
  $('#rootwizard').bootstrapWizard({
    tabClass: 'nav nav-pills',
    onNext: function (tab, navigation, index) {
      var $valid = $('#form-create').valid()
      if (!$valid) {
        $validator.focusInvalid()
        return false
      }

      switch (index) {
        case 1:
          if (!etapas_instanciadas.inquilino) {
            etapas_instanciadas.inquilino = true
            instanciar_cropie(index)
          }
          break
        case 2:
          if (!etapas_instanciadas.garante) {
            etapas_instanciadas.garante = true
            instanciar_cropie(index)
          }
          break
      }
    },
    onTabClick: function (tab, navigation, index) {
      return false
    },
    onTabShow: function (tab, navigation, index) {
      var $total = navigation.find('li').length
      var $current = index + 1
      var $percent = ($current / $total) * 100
      $('#rootwizard .progress-bar').css({width: $percent + '%'})
    },
    onFinish: function () {
      mandar()
    }
  })
})

function mostrar_panel_inquilino () {
  if ($('#panel_inquilino_nuevo').is(':hidden')) {
    $('#panel_inquilino_nuevo').show()
    $('#inquilino_id').removeAttr('required')
    $('#inquilino_id').attr('disabled', true)
  } else {
    $('#panel_inquilino_nuevo').hide()
    $('#inquilino_id').attr('required', true)
    $('#inquilino_id').removeAttr('disabled')
  }
}

function mostrar_panel_garante () {
  if ($('#panel_garante_nuevo').is(':hidden')) {
    $('#panel_garante_nuevo').show()
    $('#garante_id').removeAttr('required')
    $('#garante_id').attr('disabled', true)
  } else {
    $('#panel_garante_nuevo').hide()
    $('#garante_id').attr('required', true)
    $('#garante_id').removeAttr('disabled')
  }
}

// Date picker --instaciación y configuración

// Date picker para la fecha de inicio de contrato
$('.datepicker_desde').datepicker({
  autoclose: true,
  startView: 1,
  startDate: '-1d',
  todayHighlight: true,
  orientation: 'bottom auto',
  format: 'dd/mm/yyyy',
  language: 'es'
})
// Date picker para la fecha de finalización
$('.datepicker_hasta').datepicker({
  autoclose: true,
  startView: 2,
  startDate: '0d',
  todayHighlight: true,
  orientation: 'bottom auto',
  format: 'dd/mm/yyyy',
  language: 'es'
})

// Date picker con configuración para las fechas de nacimiento
$('.datepicker').datepicker({
  autoclose: true,
  startDate: '-80y',
  endDate: '0y',
  todayHighlight: true,
  orientation: 'bottom auto',
  format: 'dd/mm/yyyy',
  language: 'es'
})

function instanciar_cropie (index) {
  switch (index) {
    case 1:
      var basic_nuevo = $('#main-cropper-imagen-nuevo').croppie({
        enableExif: true,
        viewport: {width: 275, height: 275, type: 'circle'},
        boundary: {width: 275, height: 275},
        update: function (data) {
          basic_nuevo.croppie('result', 'blob').then(function (html) {
            fotos.inquilino_nuevo = html
          })
        }
      })
      break
    case 2:
      var garante_basic_nuevo = $('#main-cropper-imagen-nuevo-garante').croppie({
        enableExif: true,
        viewport: {width: 275, height: 275, type: 'circle'},
        boundary: {width: 275, height: 275},
        update: function (data) {
          garante_basic_nuevo.croppie('result', 'blob').then(function (html) {
            fotos.garante_nuevo = html
          })
        }
      })
  }
}

// Enviar datos.
function mandar () {
  var form = $('#form-create')
  var url = form.attr('action')
  var token = $('#token-create').val()
  var formData = new FormData(document.getElementById('form-create'))
  if (fotos.inquilino_nuevo !== '') {
    formData.append('imagen', fotos.inquilino_nuevo)
  }
  if (fotos.garante_nuevo !== '') {
    formData.append('imagen2', fotos.garante_nuevo)
  }
  formData.append('periodos_pagos', JSON.stringify(periodos_pagos))
  // // Este método sirve para ver el contenido del formdata
  // for (var pair of formData.entries())
  // {
  // console.log(pair[0]+ ', '+ pair[1]); 
  // }
  $.ajax(url, {
    headers: {'X-CSRF-TOKEN': token},
    method: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (data) {
      bootbox.dialog({
        title: 'Registración exitosa',
        message: 'El contrato se ha registrado de manera exitosa.',
        className: 'modal-success',
        buttons: {
          cancel: {
            label: 'cerrar',
            className: 'btn btn-outline pull-right',
            callback: function () {
              window.location.href = '/admin/contratos/'
            }
          }
        }
      })
    },
    error: function () {
      console.log('Upload error')
    }
  })
}

$('#inmueble_id').change(function () {
  var elemento = JSON.parse($('option:selected', this).attr('objeto'))
  $('#valor_alquiler').val(elemento.valorAlquiler)
  datos_calculo_renta.valor_alquiler = elemento.valorAlquiler
  datos_calculo_renta.valor_inmuelble = elemento.valorReal
  calcular_tasa_gastos_admin()
  calcular_renta()
})

$('#fecha_desde').change(function () {
  var fecha_formateada = new Date($('#fecha_desde').val().split('/').reverse().join('-'))
  datos_calculo_renta.fecha_desde = moment(fecha_formateada)
  if (datos_calculo_renta.fecha_hasta !== '') {
    if (datos_calculo_renta.fecha_desde > datos_calculo_renta.fecha_hasta) {
      datos_calculo_renta.fecha_hasta = ''
      $('#fecha_hasta').val('')
      $('#fecha_hasta').focus()
      msg_informar_fechas()
    }
  }
  calcular_meses_renta()
})

$('#fecha_hasta').change(function () {
  var fecha_formateada = new Date($('#fecha_hasta').val().split('/').reverse().join('-'))
  datos_calculo_renta.fecha_hasta = moment(fecha_formateada)

  if (datos_calculo_renta.fecha_desde !== '') {
    if (datos_calculo_renta.fecha_desde > datos_calculo_renta.fecha_hasta) {
      datos_calculo_renta.fecha_desde = ''
      $('#fecha_desde').val('')
      $('#fecha_desde').focus()
      msg_informar_fechas()
    }
  }

  calcular_meses_renta()
})

$('#incremento').change(function () {
  datos_calculo_renta.tasa = parseFloat($('#incremento').val())
  calcular_renta()
})

$('#periodos').change(function () {
  datos_calculo_renta.periodo_incremento = parseInt($('#periodos').val())
  calcular_renta()
})

$('#tasa_gastos_admin').change(function () {
  calcular_tasa_gastos_admin()
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

function calcular_meses_renta () {
  if (datos_calculo_renta.fecha_hasta !== '' && datos_calculo_renta.fecha_desde !== '') {
    datos_calculo_renta.meses_de_alquiler = datos_calculo_renta.fecha_hasta.diff(datos_calculo_renta.fecha_desde, 'month')

    if (datos_calculo_renta.meses_de_alquiler < 1) {
      datos_calculo_renta.meses_de_alquiler++
      $('#info_cantidad_meses').html('La vigencia mínima de un contrato es de <b>' + datos_calculo_renta.meses_de_alquiler + ' mes</b> por ello se computa como tal.')
    } else if (datos_calculo_renta.meses_de_alquiler === 1) {
      $('#info_cantidad_meses').html('La vigencia del contrato es de <b>' + datos_calculo_renta.meses_de_alquiler + ' mes</b>.')
    } else {
      $('#info_cantidad_meses').html('La vigencia del contrato es de <b>' + datos_calculo_renta.meses_de_alquiler + ' meses</b>.')
    }
    $('#periodos').attr('max', datos_calculo_renta.meses_de_alquiler)
    calcular_renta()
  }
}

function calcular_tasa_gastos_admin () {
  var valor = (datos_calculo_renta.valor_inmuelble * $('#tasa_gastos_admin').val()) / 100
  $('#gastos_administrativos').val(valor)
}

function calcular_renta () {
  datos_calculo_renta.meses = []
  if (datos_calculo_renta.fecha_hasta !== '' &&
    datos_calculo_renta.fecha_desde !== '' &&
    datos_calculo_renta.periodo_incremento !== '' &&
    datos_calculo_renta.tasa !== '' &&
    datos_calculo_renta.monto_basico !== ''
  ) {
    var cantidad_incrementos = parseInt(datos_calculo_renta.meses_de_alquiler / datos_calculo_renta.periodo_incremento),
      resto = datos_calculo_renta.meses_de_alquiler % datos_calculo_renta.periodo_incremento,
      valor_tasa = 0,
      valor_actualizado = parseFloat($('#monto_basico').val()),
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
    $('.fila').remove()

    var valor_creciente = 0

    datos_calculo_renta.meses.forEach(function (item) {
      item.tasa_fija = tasa_fija.toFixed(2)
      item.tasa_creciente = parseFloat(item.tasa_creciente).toFixed(2)

      if (valor_creciente !== item.tasa_creciente) {
        valor_creciente = item.tasa_creciente
        periodos_pagos.push({
          inicio_periodo: item.numero,
          fin_periodo: item.numero + datos_calculo_renta.periodo_incremento - 1,
          monto_fijo: item.tasa_fija,
          monto_incremental: item.tasa_creciente
        })
      }
      console.log(periodos_pagos)
      $('#tabla-meses > tbody').append('<tr class="fila"><td>' + item.numero + '</td><td>$' + item.tasa_fija + '</td><td>$' + item.tasa_creciente + '</td></tr>')
    })

    $('#info_valor_total').html('El valor total del alquiler asciende a <b>$' + parseFloat(sumatoria).toFixed(2) + '</b>')
  }
}

// Sección - Caractísticas 

var servicios_seleccionados = []
var servicios_id = []

function agregar_servicio () {
  var cambio = false
  $('#combo option:selected').each(function () {
    var servicio = JSON.parse($(this).attr('value'))
    if (!servicios_id.includes(servicio.id)) {
      servicios_seleccionados.push(servicio)
      servicios_id.push(servicio.id)
      $('#cantidad_servicios').val(servicios_seleccionados.length)
      cambio = true
    } else {
      $('#boton-modal-elemento-seleccionado').click()
    }
    $('#combo').val(null).trigger('change')
    $('#boton_cerrar_crear').click()
  })
  if (cambio) {
    $('#tabla_servicios').html('')
    var num_fila = 1
    servicios_seleccionados.forEach(function (servicio) {
      agregar_a_tabla(servicio, num_fila)
      num_fila++
    })
    $('#combo').val(null).trigger('change')
  }
}

$(document).on('click', '.borrar', function (event) {
  event.preventDefault()
  var servicio = $($(this).closest('tr')['0'].lastElementChild).find('input')['0'].value
  var posicion_objeto = 0
  var i = 0
  servicios_seleccionados.forEach(function (elemento) {
    if (elemento.id === parseInt(servicio)) {
      posicion_objeto = i
    }
    i++
  })
  servicios_id.splice(servicios_id.indexOf(parseInt(servicio)), 1)
  servicios_seleccionados.splice(posicion_objeto, 1)
  $(this).closest('tr').remove()
})

function agregar_a_tabla (servicio, num_fila) {
  var tabla = document.getElementById('tabla_servicios')
  var row = tabla.insertRow(0)
  var cell1 = row.insertCell(0)
  var cell2 = row.insertCell(1)
  var cell3 = row.insertCell(2)
  var cell4 = row.insertCell(3)
  cell1.innerHTML = servicio.nombre
  cell2.innerHTML = servicio.descripcion
  cell3.innerHTML = '<input type="button" class="borrar" value="Eliminar" />'
  cell4.innerHTML = '<input type="text" name="servicio' + num_fila + '" class="hide" value="' + servicio.id + '" />'
}

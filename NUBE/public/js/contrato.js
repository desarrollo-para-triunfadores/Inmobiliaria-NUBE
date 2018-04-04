$('#side-contratos-li').addClass('active')
$('#side-contratos-ul').addClass('menu-open')
$('#side-ele-contratos').addClass('active')
 
function abrir_modal_borrar(id) {
  $('#form-borrar').attr('action', '/admin/edificios/' + id);
  $('#boton-modal-borrar').click();
}

var datos_calculo_renta = {
  fecha_desde: '',
  fecha_hasta: '',
  valor_alquiler: '',
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

var monto_basico_sugerido = 0;

//Datatable - instaciación del plugin
var table = $('#example').DataTable({
  "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
  "columns": [//defino propiedades para la columnas, en este caso indico cuales quiero que se inicien ocultas.      
    null,//Inmueble      
    {"visible": false}, //Edificio      
    null,//Vigente
    null,//Desde    
    null,//Hasta
    null,//Inquilino    
    {"visible": false},//Garante
    {"visible": false},//Fecha alta
    null//Acciones
  ]
});

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


$(document).ready(function () {
  jQuery.extend(jQuery.validator.messages, msj_validacion_jquery)

  var $validator = $('#form').validate({
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
      var $valid = $('#form').valid()
      if (!$valid) {
        $validator.focusInvalid()
        return false
      }

      switch (index) {
        case 1:
          if (!etapas_instanciadas.inquilino) {
            etapas_instanciadas.inquilino = true;
            instanciar_croppie_inquilino();
          }
          break
        case 2:
          if (!etapas_instanciadas.garante) {
            etapas_instanciadas.garante = true;
            instanciar_croppie_garante();
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

function mostrar_panel_inquilino () { //Esconde o muestra el formulario para poder ingresar los datos para el alta de un inquilino
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

function mostrar_panel_garante () { //Esconde o muestra el formulario para poder ingresar los datos para el alta de un garante
  console.log("dede");
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
//Bootstrap Material Date picker
$('.datepicker_desde').bootstrapMaterialDatePicker ({
  format: 'DD/MM/YYYY',
  lang: 'es',
  weekStart: 1, 			
  switchOnClick : true,
  cancelText: 'cerrar',
  okText: 'ok',
  minDate : moment().add(-100, 'year'),
  time: false 
});

// Date picker para la fecha de finalización
$('.datepicker_hasta').bootstrapMaterialDatePicker ({
  format: 'DD/MM/YYYY',
  lang: 'es',
  weekStart: 1, 			
  switchOnClick : true,
  cancelText: 'cerrar',
  okText: 'ok',
  minDate : moment().add(-100, 'year'),
  time: false 
});

// Date picker con configuración para las fechas de nacimiento
$('.datepicker').bootstrapMaterialDatePicker ({
  format: 'DD/MM/YYYY',
  lang: 'es',
  weekStart: 1, 			
  switchOnClick : true,
  cancelText: 'cerrar',
  okText: 'ok',
  minDate : moment().add(-100, 'year'),
  maxDate : moment(),
  time: false 
});


// Enviar datos.
function mandar () {
  var form = $('#form')
  var url = form.attr('action')
  var token = $('#token').val()
  var formData = new FormData(document.getElementById('form'))
  if (imagen_cropie.inquilino !== '') {
    formData.append('imagen', imagen_cropie.inquilino)
  }
  if (imagen_cropie.garante !== '') {
    formData.append('imagen2', imagen_cropie.garante)
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
      window.location.href = '/admin/contratos/'
    },
    error: function () {
      console.log('Upload error')
    }
  })
}

$('#inmueble_id').change(function () {
  var elemento = JSON.parse($('option:selected', this).attr('objeto'))
  if(elemento.edificio_id !== ""){
    var administrado_por_sistema = JSON.parse($('option:selected', this).attr('edificio-sistema'))
    if(administrado_por_sistema === 1){
      $(".sujeto_a_gastos_compartidos").removeClass("hide") 
      $("#sujeto_a_gastos_compartidos").prop("checked", true);
    }else{
      $(".sujeto_a_gastos_compartidos").addClass("hide")
      $("#sujeto_a_gastos_compartidos").prop("checked", false);
    }
    tildar_gastos_compartidos();
  }

  monto_basico_sugerido = elemento.valorAlquiler;
  $('#monto_basico').attr( "placeholder", monto_basico_sugerido);
  datos_calculo_renta.valor_alquiler = elemento.valorAlquiler
  calcular_renta()
})

function cargar_monto_sugerido(){//este método se usa en los casos en que el concepto es un concepto compartido está sugerido a modo de placerholder entonces al dar un click en ese campor el mismo se complete con el monto sugerido
  if(($('#monto_basico').val() === '')){
      $('#monto_basico').val(monto_basico_sugerido);
  }       
}

function tildar_gastos_compartidos() {//este método se encarga de tildar o destildar todos los servicios que estén marcados con la clase "gastos compartidos"
  if( $('#sujeto_a_gastos_compartidos').prop('checked') ) {
    $(".gasto_compartido").prop("checked", true);  
  }else{
    $(".gasto_compartido").prop("checked", false);  
  }
}


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



function calcular_renta () {
  datos_calculo_renta.meses = [] //en esta variable quedará almacenada la información de montos para cada mes de alquiler del contrato
  periodos_pagos = [] //en esta variable quedará almacenada la información de los periodos de incremento que compongan al contrato 
  /**   
   * Primero verificamos que todos los datos necesarios estén disponibles.
   */
  if (datos_calculo_renta.fecha_hasta !== '' &&
    datos_calculo_renta.fecha_desde !== '' &&
    datos_calculo_renta.periodo_incremento !== '' &&
    datos_calculo_renta.tasa !== '' &&
    datos_calculo_renta.monto_basico !== ''
  ) {

    var cantidad_incrementos = parseInt(datos_calculo_renta.meses_de_alquiler / datos_calculo_renta.periodo_incremento), //indica la cantidad de veces que el valor del alquiler zufrirá de un incremento en su monto
      resto = datos_calculo_renta.meses_de_alquiler % datos_calculo_renta.periodo_incremento, //indica la cantidad de meses que quedan por fuera los intervalos completos de incremento. Ejemplo: 27 meses de duración de contrato / 12 meses (periodo incremento)  = 2 periodos completos (cantidad de incrementos) + 3 meses (contenido de seta variable).
      valor_tasa = 0, // en ella se guarda constantemente el incremento que debe sumarse al monto básico en cada periodo nuevo
      valor_actualizado = parseFloat($('#monto_basico').val()), //variable que se usa para guardar temporalmente el valor del alquiler
      num_mes = 1, //contador para los meses del alquiler
      sumatoria = 0 //esta variable guarda el valor total del monto de alquiler para todo el tiempo que dure el contrato, se utiliza pra determinar el valor del monto fijo del alquiler

    for (var n = 1; n <= cantidad_incrementos; n++) { // este bucle itera sobre la cantidad de incrementos que haya    
      datos_calculo_renta.valor_alquiler = valor_actualizado 
     
      if (n > 1) {//después de que se crean los montos para el primer periodo (para el primer periodo la tasa debe ser 0) se calcula cuanto es el aumento que debe incorporarse
        valor_tasa = (datos_calculo_renta.valor_alquiler * datos_calculo_renta.tasa) / 100
      }

      for (var i = 0; i < datos_calculo_renta.periodo_incremento; i++) { //este bucle itera sobre la cantidad de meses que componen a un periodo de incremento completo
        var mes = {
          numero: num_mes++,
          tasa_fija: 0,//la tasa fija se calcula y se setea al final del método porque en esta instancia aún no conocemos el monto total por alquiler para toda la vigencia del contrato
          tasa_creciente: datos_calculo_renta.valor_alquiler + valor_tasa
        }
        valor_actualizado = mes.tasa_creciente //guardamos temporalmente el valor actual del alquiler a medida que se calculan los valores para cada mes
        datos_calculo_renta.meses.push(mes)
        sumatoria = sumatoria + valor_actualizado
      }

    }

    /**
     * Ahora incorporamos al arreglo de meses calculados los meses que no integran periodos completos 
     */
    if (resto > 0) { 
      nuevo_indice = datos_calculo_renta.meses_de_alquiler - (datos_calculo_renta.periodo_incremento * cantidad_incrementos) //determinamos en que mes debemos arrancar nuevamente el cálculo

      datos_calculo_renta.valor_alquiler = valor_actualizado
      valor_tasa = (datos_calculo_renta.valor_alquiler * datos_calculo_renta.tasa) / 100

      for (var i = 0; i < nuevo_indice; i++) {
        var mes = {
          numero: num_mes++,
          tasa_fija: 0, //la tasa fija se calcula y se setea al final del método porque en esta instancia aún no conocemos el monto total por alquiler para toda la vigencia del contrato
          tasa_creciente: datos_calculo_renta.valor_alquiler + valor_tasa
        }
        valor_actualizado = mes.tasa_creciente //seteamos el valor actual del alquiler a medida que se calculan los valores para cada mes
        datos_calculo_renta.meses.push(mes)
        sumatoria = sumatoria + valor_actualizado
      }
    }

    var tasa_fija = parseFloat(sumatoria) / datos_calculo_renta.meses_de_alquiler //este es el monto que debe pagar cada mes si el alquiler 
    $('.fila').remove()//limpiamos la tabla de la vista

    var valor_creciente = 0

    /**
     * En esta instancia ya determinamos los montos para todos 
     * los meses de alquiler. Solo nos resta setear el monto fijo para 
     * todos los meses y determinar los montos, mes de inicio y finalización 
     * de los periodos de incrementos. Esta es la información que se guarda en la BD
     */   
   
     datos_calculo_renta.meses.forEach(function (item) { //por cada mes que disponemos en el arreglo vamos operando
    
      item.tasa_fija = tasa_fija.toFixed(2)//seteamos el valor a dos decimales
      item.tasa_creciente = parseFloat(item.tasa_creciente).toFixed(2) //convertimos a decimal y seteamos a dos decimales para poder operar

      if (valor_creciente !== item.tasa_creciente) {//Cada vez que el valor creciente no coicida con el valor para la tasa creciente del mes quiere decir que entramos a un periodo nuevo y aca que registramos 
        valor_creciente = item.tasa_creciente //actualizamos el valor creciente
        periodos_pagos.push({
          inicio_periodo: item.numero,
          fin_periodo: item.numero + datos_calculo_renta.periodo_incremento - 1,
          monto_fijo: item.tasa_fija,
          monto_incremental: item.tasa_creciente
        })        
      }
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



/*****  Mascaras para decimales  ******/
$('#comision_inquilino').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:'.', affixesStay: false});    //-- Lo ideal seria meter ',' como separador de decimales, pero al grabar rompe la consula :(
$('#comision_propietario').maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:'.', affixesStay: false});
$('#monto_basico').maskMoney({prefix:'$ ', allowNegative: false, thousands:'', decimal:'.', affixesStay: false});
$('#incremento').maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:'.', affixesStay: false});   
/***************************************************************************************************************** */
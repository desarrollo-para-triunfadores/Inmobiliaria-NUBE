$("#side-inmueble-li").addClass("active");
$("#side-inmueble-ul").addClass("menu-open");
$("#side-ele-edificios").addClass("active");

var etapas_instanciadas = {
  datos_basicos: false,
  ubicacion: false
}, foto_edificio = "";

//function desabilitar_input(estado, clase): esta función habilita o deshabilita los imputs de acuerdo al valor de los check tildados
function desabilitar_input(check, clase){
  if(clase==="ascensor"){
    $('.'+clase).addClass("hide"); 
    if($('#'+check).prop('checked')) {
      $('.'+clase).removeClass("hide");
    }
  }else{
    $('.'+clase).attr("disabled", true);
    if($('#'+check).prop('checked')) {
      $('.'+clase).removeAttr("disabled");      
    }
  }
}


//Bootstrap Material Date picker
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

//Datatable - instaciación del plugin
var table = $('#example').DataTable({
  "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
  "columns": [//defino propiedades para la columnas, en este caso indico cuales quiero que se inicien ocultas.
      null, //Nombre
      {"visible": false},//Localidad
      null,//Barrio
      {"visible": false},//Dirección
      null,//Administrado por sistema
      null,//Cant.Departamentos
      {"visible": false},//Seguro
      {"visible": false},//Limpieza
      {"visible": false},//Cochera
      {"visible": false},//Fecha habilitación
      null//Acciones
  ]
});


instaciar_filtros();

function instaciar_filtros() {
    //Datatables | filtro individuales - instanciación de los filtros
    $('#example tfoot th').each(function () {
        var title = $(this).text();
        if (title !== "") {
            if (title !== 'Acciones') { //ignoramos la columna de los botones
                $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />');
            }
        }
    });

//Datatables | filtro individuales - búsqueda 
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
}

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

  instanciar_cropie()

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
              if (!etapas_instanciadas.ubicacion) {
                etapas_instanciadas.ubicacion = true;
                instanciar_mapa();
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

function instanciar_mapa() {
 var marcador = {lat: -27.451082, lng: -58.986562};
 $("#latitud").val("-27.451082");
 $("#longitud").val("-58.986562");
    var map = new google.maps.Map(document.getElementById('map'), {//instancio mapa
        zoom: 12,
        center: marcador,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });
    var marker = new google.maps.Marker({//instancio marcador
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: marcador
    });
    marker.addListener('dragend', function () { //este es el evento que detecta las coordenadas al mover el marcador y setea los inputs ocultos en en el form.
        $("#latitud").val(marker.getPosition().lat());
        $("#longitud").val(marker.getPosition().lng());
    });
    marker.addListener('click', toggleBounce);
}


function toggleBounce() { //función para la animación del marcador
  if (marker.getAnimation() !== null) {
      marker.setAnimation(null);
  } else {
      marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}


function instanciar_cropie () {
    
//Croppie.js | create


  //se instancia el plugin
  var basic_nuevo = $('#main-cropper_nuevo').croppie({
    enableExif: true,
    viewport: {width: 275, height: 275, type: 'circle'},
    boundary: {width: 275, height: 275},
    update: function (data) {
      basic_nuevo.croppie('result', 'blob').then(function (html) {
        foto_edificio = html
      })
    }
  })

  //carga imagen al plugin
  function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#main-cropper_nuevo').croppie('bind', {
                url: e.target.result
            });
        };
        reader.readAsDataURL(input.files[0]);
    }
  }

  //evento sobre el botón subir
  $('.actionUpload-nuevo input').on('change', function () {
    $('#main-cropper_nuevo').removeClass('hide');
    readFile(this);
  });

}
  
  // Enviar datos.
  function mandar () {
    var form = $('#form-create')
    var url = form.attr('action')
    var token = $('#token-create').val()
    var formData = new FormData(document.getElementById('form-create'))
    if (foto_edificio !== '') {
      formData.append('imagen', foto_edificio)
    }  
    // // Este método sirve para ver el contenido del formdata
  /* for (var pair of formData.entries())
     {
     console.log(pair[0]+ ', '+ pair[1]); 
     }*/
    $.ajax(url, {
      headers: {'X-CSRF-TOKEN': token},
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        console.log(data);
        bootbox.dialog({
          title: 'Registración exitosa',
          message: 'El edificio se ha registrado de manera exitosa.',
          className: 'modal-success',
          buttons: {
            cancel: {
              label: 'cerrar',
              className: 'btn btn-outline pull-right',
              callback: function () {
                window.location.href = '/admin/edificio/'
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
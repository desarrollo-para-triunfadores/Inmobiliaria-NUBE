$("#side-inmueble-li").addClass("active");
$("#side-inmueble-ul").addClass("menu-open");
$("#side-ele-edificios").addClass("active");

var etapas_instanciadas = {
  datos_basicos: false,
  ubicacion: false
}, foto_edificio = "";

function abrir_modal_borrar(id) {
  $('#form-borrar').attr('action', '/admin/edificios/' + id);
  $('#boton-modal-borrar').click();
}

//function desabilitar_input(clase): esta función habilita o deshabilita los imputs de acuerdo al valor de los check tildados
function desabilitar_input(clase){
  if(clase==="posee_ascensores"){
    $('.'+clase).addClass("hide"); 
    if($('#'+clase).prop('checked')) {
      $('.'+clase).removeClass("hide");
    }
  }else{
    $('.'+clase).attr("disabled", true);
    if($('#'+clase).prop('checked')) {
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
      {"visible": false},//Barrio
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

 $("#latitud").val(marcador.lat);
 $("#longitud").val(marcador.lng);

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


function cargar_barrios(){
  var combo = document.getElementById("localidad_id");
  barrios = JSON.parse(combo.options[combo.selectedIndex].getAttribute("barrios"));
  var options_select_barrios = [];
  barrios.forEach(function(element) {
    options_select_barrios.push('<option value="'+element.id+'">'+element.nombre+'</option>');    
  });
  $("#barrio_id").html(options_select_barrios);
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
    var form = $('#form')
    var url = form.attr('action')
    var token = $('#token').val()
    var formData = new FormData(document.getElementById('form'))
    if (foto_edificio !== '') {
      formData.append('imagen', foto_edificio)
    }  
    // // Este buvle sirve para ver el contenido del formdata
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
                window.location.href = '/admin/edificios'
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
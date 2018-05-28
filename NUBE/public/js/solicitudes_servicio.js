/** Completar formulario con datos actuales al seleccionar 'editar oportunidad' **/
function completar_campos(oportunidad) {
    $('#estado_id').val(oportunidad.estado_id).trigger("change");
    $('#nombre_interesado').val(oportunidad.nombre_interesado);
    $('#inmueble').val(oportunidad.inmueble.direccion +" ("+oportunidad.inmueble.localidad.nombre+")");
    $('#telefono').val(oportunidad.telefono);
    $('#email').val(oportunidad.email);
    /** Obtener cantidad de visitas */
    $.ajax({
        url: "/admin/oportunidades",
        data: {
            traer_data_oportunidad: true,
            oportunidad_id: oportunidad.id,
        },
        dataType: 'json',
        success: function (data_cruda) {
            var respuesta = JSON.parse(data_cruda);
            $('#visitas').val(respuesta.cantidad_visitas);
        }
    });
    /** Rellenamos tabla de historia de la oportunidad seleccionada **/
    $.ajax({
        url: "/admin/oportunidades",
        data: {
            traer_data_historias: true,
            oportunidad_id: oportunidad.id,
        },
        dataType: 'json',
        success: function (data_cruda) {
            var respuesta = JSON.parse(data_cruda);
            var datas = data_cruda;
            console.log(datas);
            tabla_historias_oportunidad = $('#historial_oportunidad').DataTable({
                "language": tabla_traducida,
            });
            tabla_historias_oportunidad.clear().draw(); //impiamos la tabla
            tabla_historias_oportunidad.destroy();
            for(var i=0 ; i < respuesta.length ; i++){
                tabla_historias_oportunidad.row.add([
                    //this.cells[1].style.textAlign = 'center',
                    "<td class='text-center'>"+respuesta[i].titulo+"</td>",
                    "<td class='text-center'>"+respuesta[i].detalle+"</td>",
                    "<td class='text-center'>"+respuesta[i].fecha+"</td>",
                ]).draw();
            }
        }
    });
    /** /--Rellenamos tabla de historia de la oportunidad seleccionada **/

    $('#form-update').attr('action', '/admin/oportunidades/' + oportunidad.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/oportunidades/' + id);
    $('#boton-modal-borrar').click();
}

//Datatable - instaciación del plugin
var table = $('#tabla-solicitante').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    /*
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
    */
  });
  
  // Datatables | filtro individuales - instanciación de los filtros
  $('#tabla-solicitante tfoot th').each(function () {
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
  $('#tabla-solicitante tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
  });

  /********************************* Tabla para la bolsa de trabajo ***************************/
  var table = $('#tabla-bolsa').DataTable({
    "language": tabla_traducida,
  });
  //filtro individuales - instanciación de los filtros
  $('#tabla-bolsa tfoot th').each(function () {
    var title = $(this).text()
    if (title !== '') {
      if (title !== 'Acciones') { // ignoramos la columna de los botones
        $(this).html('<input nombre="' + title + '" type="text" placeholder="Buscar ' + title + '" />')
      }
    }
  })  
  // filtro individuales - búsqueda
  table.columns().every(function () {
    var that = this
    $('input', this.footer()).on('keyup change', function () {
      if (that.search() !== this.value) {
        that.search(this.value).draw()
      }
    })
  })
    
  //Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
  $('#tabla-bolsa tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
  });
  /************************************************************************************** */

  

function reservar_servicio(ss_id){  //ss_id (Solicitud Servicio)
    bootbox.confirm({
        message: "<h3>Estás a punto de indicar que vas a atender esta solicitud, se te pondrá en contacto con el solicitante para programar la visita. </h3>",
        buttons: {
            confirm: {
                label: 'Si, hagamoslo',
                className: 'btn-success'
            },
            cancel: {
                label: 'No, dejaré la solicitud para que otro la atienda',
                className: 'btn-danger'
            }
        },
        callback: function (result) {            
            if(result == true){
                console.log('Se va a mandar solicitud ajax: ' + result);
                $.ajax({
                    url: "/admin/tecnico_reserva",
                    data: {
                        ss_id: ss_id,
                    },
                    dataType: 'JSON',
                    success: function (data_cruda) {
                         swal({
                            title: 'Te has asignado esta tarea 👍',
                            text: ' ahora podrás coordinar una visita con el solicitante',
                            type: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: 'grey',
                            cancelButtonText: 'Mejor después',
                            confirmButtonText: 'Bien. Llevame al chat para comenzar a organizar visita'
                          }).then((result) => {
                            if (result.value) { //si presiono "confirmar": redireccionar a la mensajeria
                                window.location.href = '/admin/mensajes'
                            }
                          })
                    },
                });
            }           
        }
    });
}

function completar_campos(ss) { // Solicitud Sercicio
    $('#rubro_id').val(ss.rubro_id);
    $('#tecnico_id').val(ss.tecnico_id);
    /*
    $('#sexo').val(inquilino.persona.sexo);
    $('#fecha_nac').val("");
    $('.datepicker').bootstrapMaterialDatePicker ('setDate', moment(inquilino.persona.fecha_nac));
    $('#telefono').val(inquilino.persona.telefono);
    $('#telefono_contacto').val(inquilino.persona.telefono_contacto);
    $('#email').val(inquilino.persona.email);
    $('#localidad_id').val(inquilino.persona.localidad_id).trigger("change");
    $('#direccion').val(inquilino.persona.direccion);
    $('#nombre').val(inquilino.persona.nombre);
    $('#pais_id').val(inquilino.persona.pais_id).trigger("change");
    $('#form-update').attr('action', '/admin/inquilinos/' + inquilino.id);
    $('#modal-editar-ss').modal();
    $("#modal-editar-ss").on('shown.bs.modal', function () {
        */
    $('#modal-editar-ss').modal();
      
}

function marcar_concluida(ss){
    bootbox.prompt({
        title: "Ingrese el monto total de su mano de obra."+"<h2>Si has finalizado con los trabajos, ingresa el monto debajo y confirma la operacion.</h2>",
        message: "<h2>Si has finalizado con los trabajos, ingresa el monto debajo y confirma la operacion.</h2>",
        inputType: 'number',
        buttons: {
            confirm: {
                label: 'Si, he terminado',
                className: 'btn-success'
            },
            cancel: {
                label: 'Cancelar',
                className: 'btn-danger'
            }
        },
        callback: function (result) {            
            if(result > 0 ){ //si el monto es valido → grabar como monto total de solicitud y cambiar estado de solicitud
                console.log('Se va a mandar solicitud ajax: ' + result);
                $.ajax({
                    url: "/admin/marcar_ss_concluida",
                    data: {
                        ss_id: ss.id,
                        monto_total_solicitud: result,
                    },
                    dataType: 'JSON',
                    success: function (respuesta) {
                         swal({
                            title: '¡Gracias!',
                            text: 'te notificaremos una vez el solicitante abone su liquidacion...y podras tener tu dinero disponible! 💵 ',
                            type: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: 'grey',
                            cancelButtonText: 'Cerrar',
                            confirmButtonText: 'Entendido'
                          }).then((result) => {
                            if (result.value) { //si presiono "confirmar": redireccionar a la mensajeria
                                window.location.href = '/admin/solicitudes_servicio'
                            }
                          })
                    },
                });
            }    
            else{
                swal({
                    title: 'Monto Invalido',
                    text: 'Carga el monto final que debes cobrar por tu servicio ',
                    type: 'error',                   
                    confirmButtonColor: '#3085d6',                                     
                    confirmButtonText: 'Entendido'
                  })
            }       
        }
    });
}

function calificar(ss){
    //alert('se va a calificar');
    bootbox.prompt({
        title: "<h2>¿Que le parecio el servicio ofrecido por el técnico?</h2>",
        inputType: 'select',
        inputOptions: [
            {
                text: 'Seleccione...',
                value: '',
            },
            {
                text: 'Muy malo ⭐️ ',
                value: '1',
            },
            {
                text: 'Malo ⭐️⭐️ ',
                value: '2',
            },
            {
                text: 'Bueno ⭐️⭐️⭐️ ',
                value: '3',
            },
            {
                text: 'Muy Bueno ⭐️⭐️⭐️⭐️ ',
                value: '4',
            },
            {
                text: 'Excelente 🌟🌟🌟🌟🌟',
                value: '5',
            }
        ],
        callback: function (result) {
            console.log(result);
            $.ajax({
                url: "/admin/calificar",
                data: {
                    ss_id: ss.id,
                    calificacion: result,
                },
                dataType: 'JSON',
                success: function (respuesta) {
                     swal({
                        title: '<h1>¡Gracias!</h1>',
                        text: 'Puntuar las atenciones de los tecnicos nos ayuda a brindarte un mejor servicio 👍',
                        type: 'success',                        
                        confirmButtonColor: '#3085d6',                    
                        confirmButtonText: 'Cerrar'
                      }).then((result) => {
                        if (result.value) { //si presiono "confirmar": redireccionar a la mensajeria
                            window.location.href = '/admin/solicitudes_servicio'
                        }
                      })
                },
            });
        }
    });    
}

/** Estrellas para select de calificacion SS, con click */
$(function() {
    $('#rating').barrating({
      theme: 'fontawesome-stars'
    });
 });


 function addClassByClick(button){
    $('#btn-concluir').addClass("animated shake");
}
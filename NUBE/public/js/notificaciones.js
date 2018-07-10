var notificaciones_a_borrar = [], pantalla_notificaciones = false

$('ul.pagination').hide()
$(function () {
  $('.infinite-scroll').jscroll({
    autoTrigger: true,
    loadingHtml: '<img class="center-block" src="..//images/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
    padding: 0,
    nextSelector: '.pagination li.active + li a',
    contentSelector: 'div.infinite-scroll',
    callback: function () {
      $('ul.pagination').remove()
    }
  })
})

function confirmar_visita (id, confirmacion , seccion) {
  $.ajax({ // se envía
    url: '/admin/confirmar_visita',
    type: 'GET',
    data: {
      seccion: seccion,
      confirmacion: confirmacion,
      id: id
    },
    dataType: 'json',
    success: function (data) {
      if ((seccion === 'navtop') && (!pantalla_notificaciones)) {
        $('#nav_notificaciones').html(data)
      }else {
        location.reload(true)
      }
    }
  })
}

function cambiar_estado () {

  /**
   * Este método se encarga de cambiar el estado de las notificaciones de no leidas a leidas
   */

  $.ajax({ // se envía
    url: '/admin/notificaciones/create',
    type: 'GET',
    dataType: 'json'   
  })
}

function borrar (tipo) {
  if ((notificaciones_a_borrar.length > 0) || (tipo === 'todo')) {
    $.ajax({ // se envía
      url: '/admin/ocultar_notificaciones',
      data: {
        tipo: tipo,
        lista: notificaciones_a_borrar
      },
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        bootbox.dialog({
          title: 'Eliminación exitosa',
          message: 'Se han eliminado todas las notificaciones indicadas.',
          className: 'modal-success',
          buttons: {
            cancel: {
              label: 'cerrar',
              className: 'btn btn-outline pull-right',
              callback: function () {
                window.location.href = '/admin/notificaciones'
              }
            }
          }
        })
      }
    })
  }
}

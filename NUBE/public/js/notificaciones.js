
var notificaciones_a_borrar = []

$('ul.pagination').hide();
$(function() {
    $('.infinite-scroll').jscroll({
        autoTrigger: true,
        loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.infinite-scroll',
        callback: function() {
            $('ul.pagination').remove();
        }
    });
});

function cambiar_estado (tipo) {
    $.ajax({ // se envía
        url: '/admin/notificaciones/create',
        data: {
            tipo: tipo
        },
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
        }
    })
}

function borrar(tipo){
    console.log(tipo);
    if((notificaciones_a_borrar.length > 0)||(tipo === "todo")){
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
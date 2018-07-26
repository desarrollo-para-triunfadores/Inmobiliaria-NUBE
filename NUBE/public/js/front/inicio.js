/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 *  Portada
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 */

$(document).ready(function () {
    /*Redefinimos el tamaño de la portada basado en el tamaño de la pantalla*/
    resize_portada();    
});

/*Evento asociado al cambio de resulción de la ventana del navegador*/
$(window).resize(function () {
    resize_portada();
});

/*Esta función redefina la resolución de la portada*/
function resize_portada() {
    var height = $(window).height();
    var alto = height - 131;
    $('#parallax-portada').height(alto);
}

/*Este evento anima el botón de play al pasar el mouse*/
$(".img_scroll").hover(function () {
    $(this).toggleClass("animated infinite bounce");
});

/*Este evento anima el botón de scroll al pasar el mouse*/
$(".img_play").hover(function () {
    $(this).toggleClass("animated infinite pulse");
});



/*MagnificPopup*/
$('.image-link').magnificPopup({
    items: {
        src: 'https://www.youtube.com/watch?v=jYWlrkuqpYc'
    },
    type: 'iframe',
    iframe: {
        markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>',
        patterns: {
            youtube: {
                index: 'youtube.com/',
                id: 'v=',
                src: 'https://www.youtube.com/embed/%id%?autoplay=1'
            }
        },
        srcAction: 'iframe_src',
    }
});


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

/* * * * * * * * * * * * * * *  Efectos de secciones de DESCRIPCION (Home) * * * * * * * * * * * * * */

$('.img-parallax').each(function () {
    var img = $(this);
    var imgParent = $(this).parent();
    function parallaxImg() {
        var speed = img.data('speed');
        var imgY = imgParent.offset().top;
        var winY = $(this).scrollTop();
        var winH = $(this).height();
        var parentH = imgParent.innerHeight();
        // The next pixel to show on screen
        var winBottom = winY + winH;
        // If block is shown on screen
        if (winBottom > imgY && winY < imgY + parentH) {
            // Number of pixels shown after block appear
            var imgBottom = ((winBottom - imgY) * speed);
            // Max number of pixels until block disappear
            var imgTop = winH + parentH;
            // Porcentage between start showing until disappearing
            var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
        }
        img.css({
            top: imgPercent + '%',
            transform: 'translate(-50%, -' + imgPercent + '%)'
        });
    }
    $(document).on({
        scroll: function () {
            parallaxImg();
        }, ready: function () {
            parallaxImg();
        }
    });
});


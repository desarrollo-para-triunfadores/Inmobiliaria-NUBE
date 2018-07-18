/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
        /*Redefinimos el tamaño de la portada basado en el tamaño de la pantalla*/
        resize_portada();
        /*Obtenemos en que posición comienza el div de navegación*/
        var altura = $('.navigation').offset().top;
        /*Eventos asociados al scroll*/
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > altura) {
                $('.navigation').addClass('menu-fixed');
                $('.secondary-navigation').addClass('hide');
                $('.navbar').css('padding', '10px 0');
                $('#img-logo').attr('width', '160');
                $('.navigation').addClass('fadeInDown animated');
            } else {
                $('.navigation').removeClass('menu-fixed');
                $('.secondary-navigation').removeClass('hide');
                $('.navbar').css('padding', '30px 0');
                $('#img-logo').attr('width', '220');
                $('.navigation').removeClass('fadeInDown animated');
            }
        });
    });

    /*Evento asociado al cambio de resulción de la ventana del navegador*/
    $(window).resize(function () {
        resize_portada();
    });

    /*Esta función redefina la resolución de la portada*/
    function resize_portada() {
        var height = $(window).height();
        var alto = height - 151;
        $('#parallax-portada').height(alto);
    }

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

    /*Este evento anima el botón de play al pasar el mouse*/
    $(".img_scroll").hover(function () {
        $(this).toggleClass("animated infinite bounce");
    });

    /*Este evento anima el botón de scroll al pasar el mouse*/
    $(".img_play").hover(function () {
        $(this).toggleClass("animated infinite pulse");
    });
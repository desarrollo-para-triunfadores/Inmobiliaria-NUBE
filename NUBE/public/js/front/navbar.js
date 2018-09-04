/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*Obtenemos en que posición comienza el div de navegación*/
var altura = $('.navigation').offset().top;

$(document).ready(function () {
    cambiar_navbar();
    /*Eventos asociados al scroll*/
    $(window).on('scroll', function () {
        cambiar_navbar();
    });
});

function cambiar_navbar() {
    if ($(window).scrollTop() > altura) {
        var ancho = $(window).width();
        if (ancho < 800) {
            $('.secondary-navigation').addClass('hide');
            $('.navbar').css('padding', '10px 0');
            $('#img-logo').attr('width', '160');
            determinar_sentido_scroll();
        } else {
            $('.navigation').addClass('menu-fixed');
            $('.secondary-navigation').addClass('hide');
            $('.navbar').css('padding', '10px 0');
            $('#img-logo').attr('width', '160');
            $('.navigation').addClass('fadeInDown animated');
        }
    } else {
        $('.navigation').removeClass('menu-fixed');
        $('.secondary-navigation').removeClass('hide');
        $('.navbar').css('padding', '20px 0');
        $('#img-logo').attr('width', '220');
        $('.navigation').removeClass('fadeInDown animated');
    }
}

function determinar_sentido_scroll() {
    var obj = $(document);          //objeto sobre el que quiero detectar scroll
    var obj_top = obj.scrollTop()   //scroll vertical inicial del objeto
    obj.scroll(function () {
        var obj_act_top = $(this).scrollTop();  //obtener scroll top instantaneo
        if (obj_act_top > obj_top) {
            //scroll hacia abajo
            $('.navigation').removeClass('menu-fixed');
            $('.navigation').removeClass('fadeInDown animated');
        } else {
            //scroll hacia arriba
            $('.navigation').addClass('menu-fixed');
            $('.navigation').addClass('fadeInDown animated');
        }
        obj_top = obj_act_top;//almacenar scroll top anterior
    });
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
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
            $('.navbar').css('padding', '20px 0');
            $('#img-logo').attr('width', '220');
            $('.navigation').removeClass('fadeInDown animated');
        }
    });
});

